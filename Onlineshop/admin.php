<?php
require_once 'templates/header.php';
require_once 'core/middleware.php';
?>
<?php
if (!Middleware::isAdmin()) {
    header('Location: login.php');
    exit;
} 
?>


<a href="analytics.php" class="btn btn-primary p-5 mx-2" name="cart">Analytics</a>
<a href="users.php" class="btn btn-secondary p-5 mx-2" name="cart">Users</a>
<a href="orders.php" class="btn btn-warning p-5 mx-2" name="cart">Orders</a>
<a href="admin_products.php" class="btn btn-success p-5 mx-2" name="cart">Products</a>



<?php require_once 'templates/footer.php' ?>