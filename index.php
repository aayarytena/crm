<?php
  session_start();
  if (isset($_SESSION['ROLE'])) {
    header("Location: links/index.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin · CRM</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="includes/inc.php" method="POST">
      <img class="mb-4" src="media/img/icon.png" alt="" width="72" height="72">

        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <?php
          if (isset($_GET['err'])) {
            echo '<div class="alert alert-danger" role="alert">
                    Usename or Password is incorrect! Try again.
                  </div>';
          }
        ?>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
</body>
</html>
