<?php
require_once 'templates/header.php';
require_once 'controller/ProductController.php';
?>
<?php
if (!Middleware::isAdmin()) {
  header('Location: login.php');
  exit;
} 
?>
<?php
$errors = [];

if (isset($_POST['update'])) {
  $productctr = new ProductController();
  $result = $productctr->store($_POST);
  if ($result === true) {
    header('Location: admin_products.php');
    exit;
  } else {
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
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" autofocus>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
  </div>

  <!-- <div class="mb-3">
    <label for="description" class="form-label">Image</label>
    <form action="upload.php" method="POST" enctype="multipart/form-data" class="p-4 border rounded">
      <div class="mb-3">
        <label for="image" class="form-label">Upload Product Image</label>
        <input type="file" name="image" class="form-control" id="image" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Upload Image</button>
    </form>
  </div> -->

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($_POST['price'] ?? ''); ?>" step="0.01">
  </div>

  <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo htmlspecialchars($_POST['stock'] ?? ''); ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="update">Update product</button>

  <div class="pt-4">
    <a href="admin_products.php">Back to products list</a>
  </div>

</form>

<?php require_once 'templates/footer.php' ?>