<?php
require_once 'templates/header.php';
require_once 'controller/ProductController.php';
require_once 'core/middleware.php';
?>
<?php
if (!Middleware::isAdmin()) {
  header('Location: login.php');
  exit;
}
?>
<?php
if (isset($_POST['delete'])) {
  $productcontroller = new ProductController();
  $destroy = $productcontroller->destroy($_POST['id']);
}

$productcontroller = new ProductController();
$products = $productcontroller->admin_index();

?>

<!-- <div class="container">
  <a href="admin_create_product.php" class="btn btn-warning mb-4">Add a product</a>
  <div class="row">
    <?php foreach ($products as $product): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 d-flex flex-column" style="height: 350px;">
          <img src="<?php echo !empty($product['image']) ? $product['image'] : 'image/default.webp'; ?>" class="card-img-top img-fluid"
            style="object-fit: cover; height: 250px; width: 100%;" alt="Product Image.">
          <div class="card-body">
            <h5 class="card-title"><?php echo $product['name']; ?></h5>
            <p class="card-text text-truncate" style="max-height: 60px; overflow: hidden;"><?php echo $product['description']; ?></p>
            <h6><?php echo 'Price: ' . '€' . $product['price']; ?></h6>
            <h6><?php echo 'Quantity: ' . $product['stock'] . ' pieces'; ?></h6>

            <div class="mt-4 flex d-flex">
              <a href="admin_show_product.php?id=<?php echo $product['id']; ?>" class="btn btn-warning mx-1">View</a>
              <a href="admin_edit_products.php?id=<?php echo $product['id']; ?>" class="btn btn-warning mx-1">Edit</a>
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <button class="btn btn-danger mx-1" name="delete">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div> -->
<a href="admin_create_product.php" class="btn btn-warning mb-4">Add a product</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach ($products as $product): ?>
    <tbody>
      <tr>
        <th scope="row"><?php echo $product['id']; ?></th>
        <td><img src="<?php echo !empty($product['image']) ? $product['image'] : 'image/default.webp'; ?>" class="card-img-thumbnail img-fluid"
            style="object-fit: cover; height: 100px; width: 100%;" alt="Product Image."></td>
        <td><?php echo htmlspecialchars($product['name']); ?></td>
        <td style="max-width: 250px; height: 100px;"><?php echo htmlspecialchars($product['description']); ?></td>
        <td><?php echo htmlspecialchars($product['price']); ?></td>
        <td><?php echo htmlspecialchars($product['stock']); ?></td>
        <td><?php echo htmlspecialchars($product['active'])? '<span>Active</span>' : '<span>Not Active</span>' ; ?></td>
        <td>
          <div class="mt-4 flex d-flex">
            <a href="admin_show_product.php?id=<?php echo $product['id']; ?>" class="btn btn-warning mx-1">View</a>
            <a href="admin_edit_products.php?id=<?php echo $product['id']; ?>" class="btn btn-warning mx-1">Edit</a>
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
              <button class="btn btn-danger mx-1" name="delete">Delete</button>
            </form>
          </div>
        </td>

      </tr>
    </tbody>
  <?php endforeach; ?>
</table>

<?php require_once 'templates/footer.php' ?>