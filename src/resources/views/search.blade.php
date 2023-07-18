<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link href="/css/search.css" rel="stylesheet">
</head>

<body>
    <form>
        <div class="container"> 
            <div class="row">
                <div class="col-3">
                    <label for="name" class="control-label">お名前</label>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="sex" class="control-label">性別</label>
                </div>
                <div class="col-9">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="sex1" value="option1">
                        <label class="form-check-label" for="sex1">全て</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="sex2" value="option2">
                        <label class="form-check-label" for="sex2">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="sex3" value="option3">
                        <label class="form-check-label" for="sex3">女性</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="from" class="control-label">登録日</label>
                </div>
                <div class="col-9">
                    <div class="row form-group form-inline input-group-sm">
                        <input type="date" class="form-control col-5" id="from" name="from">
                        <label class="control-label col-1">～</label>
                        <input type="date" class="form-control col-6" id="to" name="to">
                        <!-- <div class="col-md-3"></div> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="mail" class="control-label">メールアドレス</label>
                </div>
                <div class="col-9">
                    <div class="form-group form-inline">
                        <input type="mail" class="form-control" id="mail" name="mail">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-sm btn-outline-secondary" type="submit">検索</button>
                <br>
                <input type="reset" class="no-border" value="リセット">
            </div>          
        </div>
    </form>

    <div class="container">
        <div id="search-list">
            <div class="search-control">
                <div class="search-count">
                    全35件中　11-20件
                </div>
                <div class="search-paging">
                    <a href="#"><</a>
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>           
                    <a href="#">4</a>
                    <a href="#">></a>
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
                            <td>1</td>
                            <td>山田太郎</td>
                            <td>男性</td>
                            <td>test@example.com</td>
                            <td>いつもお世話になっております。先日XXXXXXXXXXXXXXXXXXXXXXXXXXXX</td>
                            <td><a href="#" class="btn btn-dark">削除</a></td>
                        </tr>
                    </tbody>           
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
