<?php session_start();
include('src/Auth.php');
$auth =  new Auth();

if(!$auth->isAuth() || $auth->user()['role'] != 'admin')
    header('Location: index.php');

$user = $auth->user();
?>

<?php include('theme/header.php'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <?php include('theme/menu.php') ?>
        </div>
        <div class="col-md-9">
            Content
        </div>
    </div>
</div>

<?php include('theme/footer.php'); ?>