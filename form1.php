<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index_style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="signUp">
    <form class="sign" method="POST" action="signUp.php">
        <div class="head"><h1>signUp Page</h1></div>
        <div class="middle">
        <input type="text" name="fname" placeholder="firstName">
        <input type="text" name="lname" placeholder="lastName">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
    </div>
<div class="bottom"><button type="submit" name="signupSubmit" >signUp</button></div>

    </form>
    </div>
</body>
</html>
