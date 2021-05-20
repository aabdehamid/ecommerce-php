<?php 

include('Database.php');

Class Auth{


    private $email;

    private $password;

    private $db;


    public function __construct($email = null , $password = null){
        $this->email = $email;
        $this->password = $password;
        $this->db = ( new Database() )->connection;
    }

    public function login(){
        $attempt = $this->db->prepare("SELECT * FROM `users` WHERE `email`= ? and `password`= ?");
        $attempt->execute(
            [
                $this->email, 
                $this->password
            ]
        );

        if($attempt->fetchColumn()){
            $_SESSION['email'] = $this->email;
            $_SESSION['password'] = $this->password;
            return true;
        }else{
            return false;
        }
    }

    public function isAuth(){
        if(isset($_SESSION['email']) && isset($_SESSION['password'])){
            $this->email = $_SESSION['email'];
            $this->password = $_SESSION['password'];
            return $this->login();
        }else{
            return false;
        }
    }

    public function user(){
        if($this->isAuth()){
            $getUser = $this->db->prepare("SELECT * FROM `users` WHERE `email`= ? and `password`= ?");
            $getUser->execute([$this->email, $this->password]);
            return $getUser->fetch();
        }else{
            return null;
        }
    }

}


?>