<?php
require_once 'templates/header.php';
require_once 'controller/ProductController.php';
?>

<?php
// if (!isset($_GET['id']) || empty($_GET['id'])) {
//     die("Error: No product ID provided.");
// }

$id = $_GET['id'];
$show = new ProductController();
$product = $show->show($id);


?>

<div class="col-md-4 mb-4">
    <div class="mb-4 flex d-flex">
        <a href="index.php" class="btn btn-warning mx-1">Bact to products</a>
    </div>
    <div class="card h-100 d-flex flex-column" style="height: 350px;">
        <img src="<?php echo !empty($product['image']) ? $product['image'] : 'image/default.webp'; ?>" class="card-img-top img-fluid"
            style="object-fit: cover; height: 250px; width: 100%;" alt="Product Image.">
        <div class="card-body">
            <h5 class="card-title"><?php echo isset($product['name']) ? $product['name'] : 'No name available'; ?></h5>
            <p class="card-text" style="max-height: 120px; overflow-y: auto;"><?php echo isset($product['description']) ? $product['description'] : 'No description'; ?></p>
            <h6><?php echo isset($product['price']) ? 'Price: €' . $product['price'] : 'Price: Not Available'; ?></h6>
            <h6><?php echo isset($product['stock']) ? 'Quantity: ' . $product['stock'] . ' pieces' : 'Quantity: Not Available'; ?></h6>
        </div>
        <div class="card-body flex d-flex">
            <button type="submit" class="btn btn-success " name="cart">Add to cart</button>
        </div>
    </div>
</div>

<?php require_once 'templates/footer.php' ?>