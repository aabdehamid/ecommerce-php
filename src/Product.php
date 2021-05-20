<?php 
include_once('src/Database.php');

Class Product{

    private $db;

    public function __construct(){
        $this->db = ( new Database() )->connection;
    }

    public function create($data){

        $product = $this->db->prepare("INSERT INTO `products` (`name`, `price`, `qty`, `description`) VALUE (?, ?, ?, ?)");
        $product->execute([
            $data['name'],
            $data['price'],
            $data['qty'],
            $data['description']
        ]);

        $productID = $this->db->lastInsertId();
        
        if(isset($data['color'])){
            foreach($data['color'] as $color){
                if(!empty($color)){
                    $newColor = $this->db->prepare("INSERT INTO `colors` (`color`, `product_id`) VALUE (?, ?)");
                    $newColor->execute([
                        $color,
                        $productID
                    ]);
                }

            }
        }

        if(isset($data['size'])){
            foreach($data['size'] as $size){
                if(!empty($size)){
                    $newSize = $this->db->prepare("INSERT INTO `sizes` (`size`, `product_id`) VALUE (?, ?)");
                    $newSize->execute([
                        $size,
                        $productID
                    ]);
                }
            }
        }

    }

    public function all(){
        return $this->db->query("SELECT * FROM `products`");
    }

    public function delete($id){
        $product = $this->db->prepare("DELETE FROM `products` WHERE `id`= ?");
        $product->execute([
            $id
        ]);
    }

}