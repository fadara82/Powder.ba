<?php

header("Access-Control-Allow-Origin: *");

require_once __DIR__ . "/BaseDao.php";


class ProductsDao extends BaseDao{

public function __construct(){
    parent::__construct("products");
}

public function add_products($product) {
        print_r($product);

        $sql = "INSERT INTO products (productImg, productName, flavour, price, description,category) 
                VALUES (:productImg, :productName, :flavour, :price, :description,:category)";

        try {
            $statement = $this->connection->prepare($sql);

    $statement->bindValue(':productImg', $product['image']);      
    $statement->bindValue(':productName', $product['productName']);        
    $statement->bindValue(':flavour', $product['flavour']);                
    $statement->bindValue(':price', $product['price']); 
    $statement->bindValue(':description', $product['desc']);      
    $statement->bindValue(':category', $product['category']);        

            // Execute the prepared statement
            $statement->execute();

           
            return $product;
        } catch (PDOException $e) {
            error_log('Error adding order: ' . $e->getMessage());
            throw new Exception('Failed to add order');
        }
    }

    
     public function get_products(){
    $sql = "SELECT * FROM products";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->execute();
        
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $orders;
    } catch (PDOException $e) {
        error_log('Error getting orders: ' . $e->getMessage());
        throw new Exception('Failed to get orders');
    }
}
 

public function get_protein(){
    $sql = "SELECT * FROM products WHERE category = 'protein'";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting protein products: ' . $e->getMessage());
        throw new Exception('Failed to get protein products');
    }
}


public function get_vitamini(){
    $sql = "SELECT * FROM products WHERE category = 'vitamini'";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting protein products: ' . $e->getMessage());
        throw new Exception('Failed to get protein products');
    }
}
public function get_creatine(){
    $sql = "SELECT * FROM products WHERE category = 'creatine'";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting protein products: ' . $e->getMessage());
        throw new Exception('Failed to get protein products');
    }
}
public function get_healthybars(){
    $sql = "SELECT * FROM products WHERE category = 'cokoladice'";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting protein products: ' . $e->getMessage());
        throw new Exception('Failed to get protein products');
    }
}

public function get_byid($id){
    $sql = "SELECT * FROM products WHERE id = :id";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}


public function delete_by_id($id){
    $sql = "DELETE  FROM products WHERE id = :id";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}

public function updateCart($id){
    $sql = "UPDATE products SET status = 'Y' WHERE id = :id";
;
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}




public function deleteCart($id){
    $sql = "UPDATE products SET status = 'N' WHERE id = :id";
;
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}


public function getCart(){
    $sql = "SELECT * FROM products WHERE status = 'Y'";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting protein products: ' . $e->getMessage());
        throw new Exception('Failed to get protein products');
    }
}



public function updateProduct($id){
    $sql = "UPDATE products SET status = 'Y' WHERE id = :id";
;
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}



}





