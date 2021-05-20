<?php session_start();
include('src/Auth.php');
include('src/Product.php');
$auth =  new Auth();

if(!$auth->isAuth() || $auth->user()['role'] != 'admin')
    header('Location: index.php');

if(isset($_GET['id'])){
    $product =  new Product();
    $product->delete($_GET['id']);
    header('Location: products.php');
}


?>
