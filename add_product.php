<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/add_supplier_product.css" rel="stylesheet">
</head>
<body>
<?php include 'admin_navbar.php'?>
<div class="background-image">
    <img src="./pictures/Asset 11.png" alt="cookies" class="img-fluid">
</div>
<div class="product">
    <form class="row g-3" method="post" enctype="multipart/form-data">
        <div>
            <h2>Add a Product</h2>
        </div>
        <div class="col-md-6">
            <label for="inputName" class="form-label label">Name</label>
            <input type="text" class="form-control control" id="inputName" required placeholder="Enter the product name" name="prodname" value="<?php echo isset($_POST['prodname']) ? htmlspecialchars($_POST['prodname']) : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputPrice" class="form-label label">Price</label>
            <input type="text" class="form-control control" id="inputPrice" required placeholder="Enter the product price" name="prodprice" value="<?php echo isset($_POST['prodprice']) ? htmlspecialchars($_POST['prodprice']) : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputStock" class="form-label label">Stock</label>
            <input type="number" class="form-control control" id="inputStock" required placeholder="Enter the product stock" name="prodstock" value="<?php echo isset($_POST['prodstock']) ? htmlspecialchars($_POST['prodstock']) : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputImage" class="form-label label">Image</label>
            <input type="file" class="form-control control" id="inputImage" name="prodimg" required>
        </div>
        <div class="col-3-md-6">
            <label for="collectionname" class="form-label label">Collection</label>
            <input type="text" class="form-control control" id="collection" required name="collection" placeholder="Collection Name" value="<?php echo isset($_POST['collection']) ? htmlspecialchars($_POST['collection']) : ''; ?>">
        </div>
        <div class="col-12 desc">
        <label for="inputDesc" class="form-label label">Description</label>
        <textarea id="inputDesc" name="Desc" class="form-control control" rows="5" cols="50" required placeholder="Enter the Description"><?php echo isset($_POST['Desc']) ? htmlspecialchars($_POST['Desc']) : ''; ?></textarea>
        </div>
        <div class="col-12 button-container">
            <button type="submit" class="btn btn-primary" name="prodadd">Add Product</button>
        </div>
    </form>
</div>
<?php include 'admin_footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST["prodadd"])){
    $name=$_POST["prodname"];
    $price=$_POST["prodprice"];
    $stock=$_POST["prodstock"];
    $desc=$_POST["Desc"];
    $collection=$_POST["collection"];
    $img="./products/".basename($_FILES['prodimg']['name']);

    $image=$_FILES["prodimg"]["name"];
    move_uploaded_file($_FILES["prodimg"]["tmp_name"],$img);

    $connect=mysqli_connect("localhost","root","","nourishbakery");

    $state="INSERT INTO `product` (`Name`, `Stock`, `Price`, `Image`,`Desc`,`collection`) 
    VALUES ('$name', '$stock', '$price','$img','$desc','$collection')";

    $result=mysqli_query($connect, $state);
        if($result==FALSE)  
            echo "<div class='alert alert-danger alert-container' role='alert'>
            $name was not added!
            </div>";
        else
            echo "<div class='alert alert-success alert-container' role='alert'>
            $name was successfully added!
            </div>";
}
?>