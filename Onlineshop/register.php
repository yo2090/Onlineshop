<?php require_once 'templates/header.php'; ?>
<?php require_once 'controller/AuthController.php'; ?>
<?php
  $errors = [];

  if (isset($_POST['register'])) {
    $auth = new AuthController();
    $result = $auth->register($_POST);
    if ($result === true) {
      header('Location: login.php');
      exit;
    }else {
      $errors = $result;
    }
  }
?>
<?php foreach ($errors as $error): ?>
  <div class="alert alert-danger" role="alert">
      <?php echo $error; ?>
  </div>
<?php endforeach; ?>

<form action="" method="POST">
  <div class="mb-3 col-sm-5">
    <label for="fname" class="form-label">First name:</label>
    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>" autofocus>
  </div>

  <div class="mb-3 col-sm-5">
    <label for="lname" class="form-label">Last name:</label>
    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>">
  </div>

  <div class="mb-3 col-sm-5">
    <label for="phone" class="form-label">Phone:</label>
    <input type="text" class="form-control" id="lname" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
  </div>

  <div class="mb-3 col-sm-5">
    <label for="email" class="form-label">Email address:</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
  </div>
  
  <div class="mb-3 col-sm-5">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <button type="submit" class="btn btn-warning" name="register">Register</button>
</form>

<?php require_once 'templates/footer.php' ?>