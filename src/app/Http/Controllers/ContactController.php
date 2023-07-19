<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{  
    public function index()
  {
    return view('index');
  }

    public function confirm(Request $request)
  {
    $contact = $request->all();
      return view('confirm', compact('contact'));
  }

    public function thanks(Request $request)
  {
    $contact = $request->all();
    Contact::create($contact);
    return view('thanks');
  }

    public function show()
  {
    return view('search');
  }  
    public function search(Request $request)
  {
          $query = Contact::query();

          $name = $request->input('name');
          $gender = $request->input('gender');
          $email = $request->input('email');
          $start_date=$request->input('created_at');
          $end_date=$request->input('updated_at');
          

      //名前
      if ($name){
            $query->where('fullname', 'like', '%' . $name . '%');
      }

      //性別
      if ($gender === '1' || $gender === '2') {
          $query->where('gender', $gender);
      }

      //登録日
      if ($start_date && $end_date) {
              // 日付範囲を指定する場合は、データベースに保存されている日付の形式に合わせてください
              // 例: 'Y-m-d'は「年-月-日」形式です
              $query->whereBetween('created_at', [$start_date, $end_date]);
          }

      // メールアドレスが指定されている場合は検索条件を追加
          if ($email) {
              $query->where('email', 'like', '%' . $email . '%')->get();
          }

      // ページネーションを行い、1ページにつき10件ずつのレコードを表示します。
      $datas = $query->paginate(10);


    // 現在のページ番号と1ページに表示する件数から、表示すべき範囲を計算します
      $currentPage = $datas->currentPage();
      $perPage = $datas->perPage();
      $total = $datas->total();
      $from = ($currentPage - 1) * $perPage + 1;
      $to = min($currentPage * $perPage, $total);

      //'search'ビューにページネートされたデータと表示範囲の情報を返します
      return view('search', [
          'datas' => $datas,
          'from' => $from,
          'to' => $to,
          'total' => $total,
      ]);
  }

      public function destroy($id)
    {
        $data = Contact::find($id);

        if (!$data) {
            return redirect()->back()->with('error', '指定されたユーザが見つかりませんでした。');
        }

        // Contactsテーブルからレコードを削除
        $data->delete();

        return redirect()->back()->with('success', 'ユーザが削除されました。');
    }
}
