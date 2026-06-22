<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css_files/add_item.css">
</head>
<body>
<?php include 'admin_navbar.php'?>
<div class="background-image">
    <img src="./pictures/Asset 11.png" alt="cookies" class="img-fluid">
</div>
<div class="product">
    <form class="row g-3" action="" method="post" enctype="multipart/form-data" class="row g-3">
    <div>
        <h2>Add Item</h2>
    </div>
    <div class="col-md-6">
        <label for="Name" class="form-label label">Name</label>
        <input type="text" class="form-control control" id="name" required placeholder="Enter the item name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
    </div>
    <div class="col-md-6">
        <label for="Quantity" class="form-label label">Quantity</label>
        <input type="number" class="form-control control" id="AvailableQ" required  name="quantity" placeholder="Enter the item's quantity" name="quantity" value="<?php echo isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : ''; ?>">
    </div>
    <div class="col-md-6">
        <label for="Supplier Name" class="form-label label">Supplier Name</label>
        <select class="form-control control" id="supName" required name="supplier" >
        <option value="" hidden>Select a Supplier</option>
            <?php
            $con=mysqli_connect("localhost", "root", "", "nourishbakery");
            $stmt="SELECT `SupplierID`, `Name` FROM `supplier`";
            $result=mysqli_query($con, $stmt);
            while ($row=mysqli_fetch_array($result))
                echo "<option value='{$row['SupplierID']}'>{$row['Name']}</option>";
            ?>
            </select>
    </div>
    <div class="col-md-6">
        <label for="Image" class="form-label label">Image</label>
        <input type="file" class="form-control control" id="img" required  name="itemimg" >
    </div>
    <div class="col-12 button-container">
        <button type="submit" class="btn btn-primary" name="sub">Add Item</button>
    </div>
    </form>
</div>
<?php include 'admin_footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body> 
</html>
<?php
if(isset($_POST["sub"])){
    $N=$_POST["name"];
    $Q=$_POST["quantity"];
    $S=$_POST["supplier"];
    $img="./item/".basename($_FILES['itemimg']['name']);
    $image=$_FILES['itemimg']["name"];
    move_uploaded_file($_FILES["itemimg"]["tmp_name"],$img);
    $con=mysqli_connect("localhost","root","","nourishbakery");
    $stmt="INSERT INTO `item` (`Name`, `Qauntity_Available`, `Image`,`S_ID`) 
    Values ('$N','$Q','$img','$S')";
    $result=mysqli_query($con,$stmt);
    if($result==FALSE){
    echo "<div class='alert alert-danger alert-container' role='alert'>$N was not added!</div>";}
    else{
        echo "<div class='alert alert-success alert-container' role='alert'>$N was successfully added!</div>";
    }
}
?>