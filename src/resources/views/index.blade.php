<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>お問い合わせ</h2>
            </div>
            <form class="form" action="/confirm" method="post" onsubmit="return false;">
                @csrf
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">お名前</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <div class="name">
                                    <div class="name1">
                                        <input type="text" name="sei" value="{{ old('sei') }}" />
                                        <div class="example">例）山田</div>
                                    </div>
                                    <div class="name2">
                                        <input type="text" name="mei" value="{{ old('mei') }}" />
                                        <div class="example">例）太郎</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form__error">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">性別</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group-content">
                            <label class="contact-sex">
                                <input type="radio" name="gender" value="1"/>
                                <span class="contact-sex-txt">男</span>
                            </label>
                            <label class="contact-sex">
                                <input type="radio" name="gender" value="2"/>
                                <span class="contact-sex-txt">女</span>
                            </label>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">メールアドレス</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="email" name="email" value="{{ old('email') }}" />
                            </div>
                            <!-- <div class="form__error">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div> -->
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">郵便番号</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="postcode" value="{{ old('postcode') }}" oninput="convertText()" onKeyUp="AjaxZip3.zip2addr(this, '', 'address','address')" />
                            </div>
                            <!-- <div class="form__error">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div> -->
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">住所</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="address" value="{{ old('address') }}" />
                            </div>
                            <!-- <div class="form__error">
                                @error('tel')
                                {{ $message }}
                                @enderror
                            </div> -->
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">建物名</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="building_name" value="{{ old('building_name') }}"/>
                            </div>
                            <!-- <div class="form__error">
                                @error('tel')
                                {{ $message }}
                                @enderror
                            </div> -->
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">ご意見</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--textarea">
                                <textarea name="opinion">{{ old('opinion') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="button" onclick="validateForm()">確認</button>
                    </div>
            </form>
        </div>
    </main>

  　<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script>
      window.addEventListener("DOMContentLoaded", function() {
        var inputText = document.getElementsByName("postcode")[0].value;
        var outputText = "";
        for (var i = 0; i < inputText.length; i++) {
          var c = inputText.charCodeAt(i);
          if (c == 0x3000) {
            c = 0x0020;
          } else if (c >= 0xFF01 && c <= 0xFF5E) {
            c -= 0xFEE0;
          }
          outputText += String.fromCharCode(c);
        }
        document.getElementsByName("postcode")[0].value = outputText;
      });

      function convertText() {
        var inputText = document.getElementsByName("postcode")[0].value;
        var outputText = "";
        for (var i = 0; i < inputText.length; i++) {
          var c = inputText.charCodeAt(i);
          if (c == 0x3000) {
            c = 0x0020;
          } else if (c >= 0xFF01 && c <= 0xFF5E) {
            c -= 0xFEE0;
          }
          outputText += String.fromCharCode(c);
        }
        document.getElementsByName("postcode")[0].value = outputText;
      }
    </script>
    <script>
        function validateForm() {
        // 送信する場合は以下のようにする
        document.querySelector('form').submit();
        }
    </script>
</body>

</html>