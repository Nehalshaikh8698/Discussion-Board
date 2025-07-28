<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="./public/images/logo.png" alt="" srcset="">
    </a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="./">Home</a>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['username']) { ?>
          <a class="nav-link" href="./server/requests.php?logout=true">Logout</a>
        <?php } ?>

        <?php if (!isset($_SESSION['user']) || !$_SESSION['user']['username']) { ?>
          <a class="nav-link" href="?login=true">Login</a>
          <a class="nav-link" href="?signup=true">SignUp</a>
        <?php } ?>

        <a class="nav-link" href="#">Category</a>
        <a class="nav-link" href="#">Latest Questions</a>
      </div>
    </div>
  </div>
</nav>
