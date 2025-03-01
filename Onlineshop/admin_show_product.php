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
// if (isset($_POST['delete'])) {
//     $productcontroller = new ProductController();
//     $destroy = $productcontroller->destroy($_POST['id']);

//     if ($destroy) {
//         header('Location: admin_products.php');
//         exit;
//     } else {
//         echo "<script>alert('Error: Product cannot be deleted!')</script>";
//     }
// }
?>
<?php
$id = $_GET['id'];
$show = new ProductController();
$product = $show->show($id);
?>

<div class="col-md-4 mb-4">
    <div class="mb-4 flex d-flex">
        <a href="admin_products.php" class="btn btn-warning mx-1">Bact to products</a>
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
            <a href="admin_edit_products.php?id=<?php echo $product['id']; ?>" class="btn btn-warning mx-1">Edit</a>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                <!-- <button type=submit class="btn btn-danger mx-1" name="delete">Delete</button> -->
            </form>
        </div>
    </div>
</div>

<?php require_once 'templates/footer.php' ?>