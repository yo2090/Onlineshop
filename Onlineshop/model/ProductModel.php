<?php require_once 'db/DB.php'; 

Class ProductModel extends DB {
    private PDO $conn;

    public function  __construct()
    {
        $this->conn = $this->connect();
    }

    public function store ($name, $description, $price, $stock): void {
        $sql = "INSERT INTO products (name, description, price, stock) Values (:name, :description, :price, :stock);";

        $ps = $this->conn->prepare($sql);
        $ps->bindParam(':name', $name);
        $ps->bindParam(':description', $description);
        $ps->bindParam(':price', $price);
        $ps->bindParam(':stock', $stock);
        $ps->execute();
        // return $this->conn->lastInsertId();
    }

    public function index (): array | bool {
        $sql = "SELECT * FROM products WHERE active = 1";
        $ps = $this->conn->prepare($sql);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    public function admin_index (): array | bool {
        $sql = "SELECT * FROM products";
        $ps = $this->conn->prepare($sql);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    public function destroy ($id): void {
        $sql = "DELETE FROM products WHERE id = :id";
        $ps = $this->conn->prepare($sql);
        $ps->bindParam(':id', $id);
        $ps->execute();
    }

    public function show($id) {
        if (!is_numeric($id)) {
            die("Error: Invalid product ID.");
        }

        $sql = "SELECT * FROM products WHERE id = :id AND active = 1";
        $ps = $this->conn->prepare($sql);
        $ps->bindParam(':id', $id);
        $ps->execute();
        $product = $ps->fetch(PDO::FETCH_ASSOC);
        return $product;
        
    }

    public function update($name, $description, $price, $stock) {
        $sql = "UPDATE products SET name = ':name', description = ':description', image = ':image', price = ':price', stock = ':stock' WHERE id = ':id';";
        $ps = $this->conn->prepare($sql);
        $ps->bindParam(':name', $name);
        $ps->bindParam(':description', $description);
        $ps->bindParam(':price', $price);
        $ps->bindParam(':stock', $stock);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }
}

// $showproducts = new ProductModel();
// $products = $showproducts->show();
// print_r($products);