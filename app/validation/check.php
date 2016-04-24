<?php
if($_GET['type'] == "check_name"){
    if(isset($_POST['name'])) { check_name($_POST['name']); }
}

mb_regex_encoding('UTF-8');

function check_name($name) {
    $username = trim($name);
    if(!preg_match('^[а-яА-ЯёЁa-zA-Z0-9]+$', $username)) {

        $error = '"Введен недопустимый символ. Разрешены только английские буквы и цифры"';

    }else{
        $error = false;
    }
    echo $error;
}

if($_GET['type'] == "check_email"){
    if(isset($_POST['email'])) { check_email($_POST['email']); }
}

function check_email($email) {
    $userEmail = trim($email);
    if(!preg_match('^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$', $userEmail)) {

        $error = '"Введите email в виде: example@mail.ru. Запрещен ввод спец символов(помимо @)"';

    }else{
        $error = false;
    }
    echo $error;
}

if($_GET['type'] == "check_title"){
    if(isset($_POST['title'])) { check_title($_POST['title']); }
}


function check_title($title) {
    $userTitle = trim($title);
    if(!preg_match('^[а-яА-ЯёЁa-zA-Z0-9]+$', $userTitle)) {

        $error = '"Введите коректный заголовок. Запрещен ввод спец символов"';

    }else{
        $error = false;
    }
    echo $error;
}

if($_GET['type'] == "check_recall"){
    if(isset($_POST['recall'])) { check_recall($_POST['recall']); }
}


function check_recall($recall) {
    $userRecall = trim($recall);
    if(!preg_match('^[а-яА-ЯёЁa-zA-Z0-9]+$', $userRecall)) {

        $error = '"Введите коректный отзыв. Запрещен ввод спец символов"';

    }else{
        $error = false;
    }
    echo $error;
}