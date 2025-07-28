<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicuss Project</title>
    <?php include('./client/commonFile.php') ?>
</head>
<body>
       <?php 
       if (session_status() === PHP_SESSION_NONE) {
           session_start();
       }

       include('./client/header.php');

       if (
           isset($_GET['signup']) && 
           (!isset($_SESSION['user']) || !$_SESSION['user']['username'])
       ) {
           include('./client/signUp.php');
       } else if (
           isset($_GET['login']) && 
           (!isset($_SESSION['user']) || !$_SESSION['user']['username'])
       ) {
           include('./client/login.php');
       } else {
           // Other content here if needed
       }
       ?>
</body>
</html>
