<?php
require_once 'controller/AuthController.php';
require_once 'core/middleware.php';
?>
<?php
if (isset($_POST['logout'])) {
  $logout = new AuthController();
  $logout->logout();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <nav class="px-5 navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container-fluid">
      <div class="container d-flex">
        <a class="navbar-brand" href="index.php">CRUD shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>

            <li class="nav-item px-3">
              <a class="nav-link active" href="#">Orders</a>
            </li>

            <li class="nav-item px-3">
              <a class="nav-link active" href="#">Account</a>
            </li>

            <?php if(Middleware::isAdmin()): ?>
            <li class="nav-item px-3">
              <a class="nav-link active" href="admin.php">Admin</a>
            </li>
            <?php endif; ?>

            <li class="nav-item px-3">
              <a class="nav-link active" href="#">Cart</a>
            </li>
          </ul>
        </div>
        <div class="d-flex">
          <?php if (Middleware::isGuest()): ?>
            <a class="active btn btn-warning mx-1" href="login.php">Login</a>
            <a class="active btn btn-warning mx-1" href="register.php">Register</a>
          <?php endif; ?>

          <?php if (Middleware::isUser()):?>
            <form action="" method="POST">
              <button class="active btn btn-warning mx-1" name="logout">Logout</button>
            </form>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </nav>
  <div class="container p-5">