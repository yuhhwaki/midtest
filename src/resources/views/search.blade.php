<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
</head>

<body>
    <form action="/search" method="get">
                <div class="container mt-4"> 
                    <div class="row">
                        <div class="col-6 align-items-center">
                            <div class="row">
                                <div class="col-2"> 
                                    <label for="name" class="control-label">お名前</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 align-items-center">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <label for="gender" class="control-label">性別</label>
                                </div>
                                <div class="col-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="option1">
                                        <label class="form-check-label" for="gender1">全て</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="option2">
                                        <label class="form-check-label" for="gender2">男性</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender3" value="option3">
                                        <label class="form-check-label" for="gender3">女性</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-1">
                            <label for="from" class="control-label">登録日</label>
                        </div>
                        <div class="col-11">
                            <div class="row">
                                <div class="col-5">
                                    <input type="date" class="form-control" id="from" name="from">
                                </div>
                                <div class="col-auto">
                                    <label class="control-label">～</label>
                                </div>
                                <div class="col-5">
                                    <input type="date" class="form-control" id="to" name="to">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-1">
                            <label for="email" class="control-label">メールアドレス</label>
                        </div>
                        <div class="col-5">
                            <div class="form-group form-inline">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-sm btn-dark text-white" type="submit">検索</button>
                        <br>
                        <!-- <a href="#">リセット</a> -->
                        <input type="reset" class="no-border" value="リセット">
                    </div>          
                </div>
    </form>

    <div class="container">
        <div id="search-list">
        @if (!empty($datas))
            <div class="search-control">
                <div class="search-count">
                    全{{ $total }}件中　{{ $from }}-{{ $to }}件
                </div>
                <!-- <div class="search-paging">
                    {{ $datas->links() }}
                </div> -->
                <div class="search-paging">
                    <ul class="pagination">
                        <li class="page-item{{ $datas->currentPage() === 1 ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $datas->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        @for ($page = 1; $page <= $datas->lastPage(); $page++)
                            <li class="page-item{{ $datas->currentPage() === $page ? ' active' : '' }}">
                                <a class="page-link{{ $datas->currentPage() === $page ? ' active-page-link' : '' }}" href="{{ $datas->url($page) }}">{{ $page }}</a>
                            </li>
                        @endfor
                        <li class="page-item{{ $datas->currentPage() === $datas->lastPage() ? ' disabled' : '' }}">
                            <a class="page-link" href="{{ $datas->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="search-result">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>ご意見</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
							@foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->opinion }}</td>
                                <td>
                                    <form action="/contacts/{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark">削除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tr>
                    </tbody>           
                </table>
            </div>
        @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>

