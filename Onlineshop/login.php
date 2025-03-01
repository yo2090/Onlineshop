<?php require_once 'templates/header.php' ?>
<?php require_once 'controller/AuthController.php'; ?>

<?php
  $errors = [];

  if (isset($_POST['login'])) {
    $auth = new AuthController();
    $result = $auth->login($_POST);
    if ($result === true) {
      header('Location: index.php');
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
    <div class="mb-3">
        <label for="email" class="form-label">Email address:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" autofocus>
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>

<?php require_once 'templates/footer.php' ?>