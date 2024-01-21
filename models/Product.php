<?php
class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $query = 'SELECT * from product order by product_id desc';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getProductById($productId) { 
        $query = 'select * from product
                where product_id = '. $productId;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function addProduct($productData) {
        // Implement logic to add a new product to the database
        $name = $productData['name'];
        $price = $productData['price'];
        $cost_price = $productData['cost_price'];
        $description = $productData['description'];
        $stock_quantity = $productData['stock_quantity'];
        $query = "insert into product (name,price,cost_price,description,stock_quantity) values (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $res = $stmt->execute([$name,$price,$cost_price,$description,$stock_quantity]);
        if ($res){
            $data = ['restoid'=>$restoid,'name'=>$name, 'price'=> $price,'cost_price' => $cost_price,'description' => $description, 'stock_quantity' => $stock_quantity];
            return $data;
        } else {
            return (['error'=>$stmt->errorCode()]);
        }
        // (INSERT INTO Product (name, description, price, cost_price, stock_quantity) VALUES ...)
        // Return true on success, false on failure
    }

    public function updateProduct($productId, $productData) {
        $name = $productData['name'];
        $price = $productData['price'];
        $cost_price = $productData['cost_price'];
        $description = $productData['description'];
        $stock_quantity = $productData['stock_quantity'];
        // $query = "UPDATE product SET name =". $name .", description = ".$description. ", price = ".$price.", cost_price = ".$cost_price.", stock_quantity = ". $stock_quantity ." WHERE `product`.`product_id` =".$productId. "";
        $query = "UPDATE product SET name =?, description =?, price =?, cost_price = ?, stock_quantity = ? WHERE `product`.`product_id` =".$productId. "";
        // $query = "update into product (name,price,cost_price,description,stock_quantity) values (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $res = $stmt->execute([$name,$description,$price,$cost_price,$stock_quantity]);
        if ($res){
            $data = ['product_id'=>$productId,'name'=>$name, 'price'=> $price,'cost_price' => $cost_price,'description' => $description, 'stock_quantity' => $stock_quantity];
            return $data;
        } else {
            return (['error'=>$stmt->errorCode()]);
        }
    }

    public function deleteProduct($productId) {
        $query = "delete from product where product_id = ?";
        $stmt = $this->db->prepare($query);
        $res = $stmt->execute([$productId]);
        if ($res){
            $data = ['id'=>$productId];
            return $data;
        } else {
            return (['error'=>$stmt->errorCode()]);
        }
    }
}

?>
