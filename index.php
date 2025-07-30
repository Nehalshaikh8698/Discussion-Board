<!DOCTYPE html>
<html lang="en">

<head>
   <title>Discuss Project</title>
   <?php include('./client/commonFile.php') ?>
</head>

<body>
   <?php
   session_start();
   include('./client/header.php');

   if (isset($_GET['signup']) && (!isset($_SESSION['user']) || !$_SESSION['user']['username'])) {
      include('./client/signup.php');

   } else if (isset($_GET['login']) && (!isset($_SESSION['user']) || !$_SESSION['user']['username'])) {
      include('./client/login.php');

   } else if (isset($_GET['ask'])) {
      include('./client/ask.php');

   } else if (isset($_GET['q-id'])) {
      $qid = $_GET['q-id'];
      include('./client/question-details.php');

   } else if (isset($_GET['c-id'])) {
      $cid = $_GET['c-id'];
      include('./client/questions.php');

   } else if (isset($_GET['u-id'])) {
      $uid = $_GET['u-id'];
      include('./client/questions.php');

   } else if (isset($_GET['latest'])) {
      include('./client/questions.php');

   } else if (isset($_GET['search'])) {
      $search = $_GET['search'];
      include('./client/questions.php');

   } else {
      // default home: show all asked questions
      include('./client/questions.php');
   }
   ?>
</body>

</html>
