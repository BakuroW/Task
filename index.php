<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Scalar test</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="application/ecmascript" src="/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="/css/style.css" rel="stylesheet">
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script src='http://www.google.com/recaptcha/api/js/recaptcha_ajax.js'></script>
</head>
<body>


<div class="container">
    <div class="workspace">
        <h1>Страница отзывов</h1>

        <div class="post">

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <form method="post" id="modalForm" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h2 class="modal-title" id="myModalLabel">Добавить отзыв</h2>
                            </div>

                            <div class="modal-body">

                                <div class="form-group">

                                    <label>Введите полное имя:</label>
                                    <input id="name" name="name" type="text" placeholder="Введите ваше имя"
                                           class="form-control input-md">
                                    <label>Введите Email:</label>
                                    <input id="email" name="email" type="text" placeholder="Введите ваш Email"
                                           class="form-control input-md">
                                    <label>Введите заголовок:</label>
                                    <input id="title" name="title" type="text" placeholder="Введите заголовок"
                                           class="form-control input-md">
                                    <label>Введите текст отзыва:</label>
                                    <textarea rows="10" cols="45" id="recall" name="recall" placeholder="Введите текст отзыва" class="form-control input-md"></textarea>
                                </div>
                                <div class="alert alert-info"><p>Здесь вы можете загрузить файл форматов gif,jpg,png.</p></div>

                                <input id="uploadImage" type="file" name="image">
                                <div id="captcha"></div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                <button type="submit" id="submit" class="btn btn-success">Отправить отзыв</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="list-group col-md-6 col-md-offset-3" id="form">

            <button type="button" id="addRecall" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Оставить отзыв
            </button>

            <div id="check" class="alert alert-info" role="alert">
                <p><i class="fa fa-info-circle"></i> Ваш отзыв был добавлен!</p>
            </div>

            <div id="showRecall"></div>

        </div>

    </div>
</div>


    <script type="text/javascript" src="/js/db/sendRecall.js"></script>

</body>
</html>