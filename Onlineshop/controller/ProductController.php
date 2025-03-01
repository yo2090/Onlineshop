<?php
require_once 'model/ProductModel.php';


class ProductController
{

    private array $errors = [];

    public function index() {
        $productModel = new ProductModel();
        $products = $productModel->index();
        return $products;
    }

    public function admin_index() {
        $productModel = new ProductModel();
        $products = $productModel->admin_index();
        return $products;
    }

    public function store($request){
        $name = $request['name'];
        $description = $request['description'];
        $price = $request['price'];
        $stock = $request['stock'];

        if (empty($name)) {
            $this->errors[] = "Name is required";
        }

        if (empty($description)) {
            $this->errors[] = "Description is required";
        }

        if (empty($price)) {
            $this->errors[] = "Price is required";
        } else if ($price <= 0) {
            $this->errors[] = "Price must be greater than 0";
        }

        if (empty($stock)) {
            $this->errors[] = "Stock is required";
        } else if ($stock < 0) {
            $this->errors[] = "Stock cannot be less than 0";
        }

        if (empty($this->errors)) {
            $ProductModel = new ProductModel();
            $ProductModel->store($name, $description, $price, $stock);
            return true;
        } else {
            return $this->errors;
        }
    }

    public function destroy ($id) {
        $destroy = new ProductModel();
        $destroy->destroy($id);
    }

    public function show($id) {
        $productmodel = new ProductModel();
        $show = $productmodel->show($id);
        return $show;
    }

    // public function update() {
    //     $update = new ProductModel();
    //     $update = $update->update($name, $description, $price, $stock);
    // }
}
