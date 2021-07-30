<?php
require_once 'securimage.php';

// Code Validation

$image = new Securimage();
if ($image->check($_POST['captcha_code']) == true) {
  echo "Correct!";
} else {
  echo "Sorry, wrong code.";
}
?>