<?php
require_once('recaptchalib.php');


$privatekey = "6Ld0MR4TAAAAAHUcfYxSR-n6Hwd-qFp4SxkFDrzi";

// reCaptcha looks for the POST to confirm
$resp = recaptcha_check_answer ($privatekey,
    $_SERVER["REMOTE_ADDR"],
    $_POST["recaptcha_challenge_field"],
    $_POST["recaptcha_response_field"]);

// If the entered code is correct it returns true (or false)
if ($resp->is_valid) {
    echo "true";
} else {
    echo "false";
}