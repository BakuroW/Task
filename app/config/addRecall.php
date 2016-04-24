<?php
require("constants.php");

/*** mysql hostname ***/
$hostname = DB_SERVER;

/*** mysql username ***/
$username = DB_USER;

/*** mysql password ***/
$password = DB_PASS;

$dbname = DB_NAME;


try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    if($_POST['name']&$_POST['email']&$_POST['title']&$_POST['recall']) {

        $name   = $_POST['name'];
        $email  = $_POST['email'];
        $title  = $_POST['title'];
        $recall = $_POST['recall'];
        $filename   =  $_POST['filename'];

        /*** set all errors to execptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO recalldata (date_time, name, email, title, recall, filename)
            VALUES (NOW(), :name, :email, :title, :recall, :filename)";
        /*** prepare the statement ***/

        $stmt = $dbh->prepare($sql);

        /*** bind the params ***/
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':recall', $recall, PDO::PARAM_STR);

        $stmt->bindParam(':filename', $filename, PDO::PARAM_STR);

        /*** run the sql statement ***/
        if ($stmt->execute()) {
            populate_shoutbox();
        }
    }
}
catch(PDOException $e) {
    echo $e->getMessage();
}

if($_POST['refresh']) {
    populate_shoutbox();
}


function populate_shoutbox() {
    global $dbh;
    $sql = "select * from recalldata order by date_time desc limit 10";

    foreach ($dbh->query($sql) as $row) {
        echo '<div id="userPost" class="list-group-item show">';
        echo '<span id="date" class="col-md-12">'.date("d.m.Y H:i", strtotime($row['date_time'])).'</span><br>';
        echo '<h4>'.$row['name'].'</h4><br>';
        echo '<strong>'.$row['title'].'</strong><br>';
        echo '<hr>';
        echo '<span class="">'.$row['recall'].'</span><br>';


        echo '</div>';
    }
//glyphicon glyphicon-user <span class="glyphicon glyphicon-user-align-left" aria-hidden="true"></span>
}