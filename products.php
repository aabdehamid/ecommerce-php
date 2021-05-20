<?php session_start();
include('src/Auth.php');
include('src/Product.php');
$auth =  new Auth();

if(!$auth->isAuth() || $auth->user()['role'] != 'admin')
    header('Location: index.php');

$user = $auth->user();

$products = new Product();


?>

<?php include('theme/header.php'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <?php include('theme/menu.php') ?>
        </div>
        <div class="col-md-9">
            <h3>Products</h3>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($products->all() as $product){ ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['qty']; ?></td>
                        <td><a class="btn btn-primary" href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="delete_product.php?id=<?php echo $product['id']; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('theme/footer.php'); ?>