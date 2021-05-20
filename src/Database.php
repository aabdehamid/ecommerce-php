<?php 


Class Database{

    private $host = 'localhost';

    private $username = 'root';

    private $password = '';

    private $name = 'ecommerce';

    public $connection;


    public function __construct(){

        try{
            
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo "database error : ". $e->getMessage();
        }


    }


}