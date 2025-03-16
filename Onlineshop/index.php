<?php
require_once 'templates/header.php';
require_once 'controller/ProductController.php';
?>

<?php

$productcontroller = new ProductController();
$products = $productcontroller->index();

?>

<div class="container">
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
            <h6><?php echo htmlspecialchars($product['stock']) > 0 ? '<span style="color: green ">In stock</span>' : '<span style="color: red ">Out of stock</span>'; ?></h6>
          </div>
          <div class="card-body flex d-flex">
            <select name="" id="">
              <?php for ($i = 1; $i <= 30; $i++): ?>
                <option value=""><?php echo $i; ?></option>
              <?php endfor; ?>
            </select>
            <a href="show_product.php?id=<?php echo $product['id']; ?>" class="btn btn-warning mx-1">View</a>
            <!-- <div class="card-body"> -->
            <button type="submit" class="btn btn-success " name="cart">Add to cart</button>
            <!-- </div> -->
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<?php require_once 'templates/footer.php' ?>