<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CAPTCHA TEST</title>
  
</head>
<body>
<form method="post" action="test2.php">
<input type="text" id="login" name="login" placeholder="Login"><br>
<input type="password" id="password" name="password" placeholder="Password"><br>
<button type="submit">Submit</button>
<div>
    <?php
        require_once 'securimage.php';
        echo Securimage::getCaptchaHtml();
    ?>
</div>
</form>
</body>
</html>