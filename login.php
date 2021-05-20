<?php session_start();

include('src/Auth.php');

if((new Auth())->isAuth())
    header('Location: index.php');


if(isset($_POST['login'])){
    $auth = new Auth($_POST['email'], $_POST['password']);
    if($auth->login()){
        header('Location: index.php');
    }else{
        $error = "user or password is wrong !";
    }
}

?>

<?php include('theme/header.php'); ?>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <?php 
                if(isset($error))
                    echo "<div class='alert alert-danger'>{$error}</div>";
            
            ?>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit" name="login">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>

        </form>
        </div>
    </div>

</div>


<?php include('theme/footer.php'); ?>