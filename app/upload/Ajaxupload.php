<?php
$valid_extensions = array('jpg', 'png', 'gif'); // valid extensions
$path = 'image/'; // upload directory

if(isset($_FILES['image']))
{

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    $path = $path.strtolower($final_image);

    // save
    if(in_array($ext, $valid_extensions)) {
        move_uploaded_file($tmp, $path);
        echo $path;
    }else {
        echo 'Invalid file';
    }

}else{

    echo "no file";

}