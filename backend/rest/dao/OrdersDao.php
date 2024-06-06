<?php


header("Access-Control-Allow-Origin: *");

require_once __DIR__ . "/BaseDao.php";

class OrdersDao extends BaseDao {
    public function __construct() {
        parent::__construct('orders');
    }

    public function add_orders($order) {

        $sql = "INSERT INTO orders (first_name, last_name, email, mobile_number, city, address) 
                VALUES (:first_name, :last_name, :email, :mobile_number, :city, :address)";

        try {
            $statement = $this->connection->prepare($sql);

$statement->bindValue(':first_name', $order['fName']);      
$statement->bindValue(':last_name', $order['lastName']);        
$statement->bindValue(':email', $order['email']);                
$statement->bindValue(':mobile_number', $order['mobilenumber']); 
$statement->bindValue(':city', $order['city']);                 
$statement->bindValue(':address', $order['address']);            

            // Execute the prepared statement
            $statement->execute();

           
            return $order;
        } catch (PDOException $e) {
            error_log('Error adding order: ' . $e->getMessage());
            throw new Exception('Failed to add order');
        }
    }

 public function get_orders(){
    $sql = "SELECT * FROM orders";
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

public function delete_byidO($id){
    $sql = "DELETE  FROM orders WHERE id = :id";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $orders;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}


public function update_byidO($id){
    $sql = "UPDATE orders SET status = 'SENT' WHERE id = :id";
;
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $orders;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}
}


?>