<?php session_start();
include('src/Auth.php');
$user = (new Auth())->user();
?>

<?php include('theme/header.php'); ?>

<?php 
        if(isset($user['role']) && $user['role'] == 'admin')
          echo '<div class="alert alert-warning" role="alert"> you are admin <a href="admin.php">click here</a></div>';

?>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="card" style="width: 18rem;">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="card" style="width: 18rem;">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
  </div>
</div>


<?php include('theme/footer.php'); ?>