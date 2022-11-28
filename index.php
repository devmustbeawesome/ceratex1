<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $_SERVER['DOCUMENT_ROOT '] ?>/index.css" type="text/css" />
</head>

<body>
    <form class="user-form" action="add_user" method="post">
        <div class="input-text-wrapper">
            <label for="user-name">Имя</label>
            <input type="text" name="name" id="user-name">
        </div>
        <div class="input-text-wrapper">
            <label for="user-surname">Фамилия</label>
            <input type="text" name="surname" id="user-surname">
        </div>
        <div class="input-text-wrapper">
            <label for="user-age">Возраст</label>
            <input type="number" name="age" id="user-age">
        </div>
        <div class="form-footer">
            <input type="submit" value="Сохранить">
            <span class="result"></span>
        </div>
    </form>
    <div class="unload-block">
        <button class="unload">Выгрузить</button>
        <span class="result"></span>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="<?= $_SERVER['DOCUMENT_ROOT '] ?>/index.js"></script>

</html>