<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>内容確認</h2>
            </div>
            <form class="form" action="/thanks" method="post" name="myForm" onsubmit="return false;">
                @csrf
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">お名前</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                {{ $contact['sei'] }}　{{ $contact['mei'] }}
                                <input type="hidden" name="fullname" value="{{$contact['sei'].' '.$contact['mei']}}">
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">性別</span>
                        </div>
                        <div class="form__group-content">
                                {{ $contact['gender'] }}
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">メールアドレス</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                {{ $contact['email'] }}
                                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">郵便番号</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                {{ $contact['postcode'] }}
                                <input type="hidden" name="postcode" value="{{ $contact['postcode'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">住所</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                {{ $contact['address'] }}
                                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">建物名</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                {{ $contact['building_name'] }}
                                <input type="hidden" name="building_name" value="{{ $contact['building_name'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">ご意見</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--textarea">
                                {{ $contact['opinion'] }}
                                <input type="hidden" name="opinion" value="{{ $contact['opinion'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <div>
                            <button class="form__button-submit1" type="button" onclick="validateForm()">確認</button>
                        </div>
                        <div>
                            <button onclick="history.back()">修正</button>
                        </div>
                    </div>
            </form>
        </div>
    </main>


    <script>
        function validateForm() {
        // 送信する場合は以下のようにする
        document.querySelector('form').submit();
        }
    </script>
</body>


</html>