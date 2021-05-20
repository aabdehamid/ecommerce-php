<?php session_start();
include('src/Auth.php');
include('src/Product.php');
$auth =  new Auth();

if(!$auth->isAuth() || $auth->user()['role'] != 'admin')
    header('Location: index.php');

$user = $auth->user();

if(isset($_POST['create_product'])){
    $product = new Product();
    $product->create($_POST);
}

?>

<?php include('theme/header.php'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-3">
            <?php include('theme/menu.php') ?>
        </div>
        <div class="col-md-9">
            <h3>Create Product</h3>

            <form action="create_product.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Qty</label>
                    <input type="text" name="qty" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div> 
                
                <div class="mb-3 size-group">
                    <div class="size-item">
                        <label class="form-label">Size</label>
                        <input type="text" name="size[]" class="form-control">
                    </div>
                </div> 

                <div class="mb-3">
                    <button type="button" id="new-size" class="btn btn-primary">Add Size</button>
                    <button type="button" id="remove-size" class="btn btn-danger">Remove Size</button>
                </div>

                <div class="mb-3 color-group">
                    <div class="color-item">
                        <label class="form-label">Color</label>
                        <input type="text" name="color[]" class="form-control">
                    </div>
                </div> 

                <div class="mb-3">
                    <button type="button" id="new-color" class="btn btn-primary">Add Color</button>
                    <button type="button" id="remove-color" class="btn btn-danger">Remove Color</button>
                </div>

                <div class="mb-3">
                    <button type="submit" name="create_product" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    $('#new-size').click(function(){
        $('.size-group').append($('.size-item').first().clone());
    });

    $('#remove-size').click(function(){
        const sizeItem = $('.size-item');
        if(sizeItem.length > 1)
            sizeItem.last().remove();
    })

    $('#new-color').click(function(){
        $('.color-group').append($('.color-item').first().clone());
    })

    $('#remove-color').click(function(){
        const colorItem = $('.color-item');
        if(colorItem.length > 1)
            colorItem.last().remove();
    })
</script>
<?php include('theme/footer.php'); ?>