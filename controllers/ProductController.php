<?php

class ProductController {
    private $productModel;
    private $db;

    public function __construct($db) {
        $this->productModel = new ProductModel($db);
        $this->db = $db;
    }

    public function getAllProducts() {
        $products = $this->productModel->getAllProducts();
        header("Access-Control-Allow-Origin: *"); // Allow requests from any origin

        // Other CORS headers
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type");
        echo json_encode($products);
    }

    public function getProductById($productId) {
        $product = $this->productModel->getProductById($productId);
        // Implement logic to render the view with product data
        
        echo json_encode($product);
    }

    public function addProduct($productData) {
        $result = $this->productModel->addProduct($productData);
        echo json_encode($result);
        // Implement logic to handle the result (e.g., redirect, show success/error message)
    }

    public function updateProduct($productId, $productData) {
        $result = $this->productModel->updateProduct($productId, $productData);
        // Implement logic to handle the result (e.g., redirect, show success/error message)
        echo json_encode($result);
    }

    public function deleteProduct($productId) {
        $result = $this->productModel->deleteProduct($productId);
        echo json_encode($result);
        // Implement logic to handle the result (e.g., redirect, show success/error message)
    }
}

?>
