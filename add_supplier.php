<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
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
            <h2>Add a Supplier</h2>
        </div>
        <div class="col-md-6">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName" required placeholder="Enter the supplier name" name="Name" value="<?php echo isset($_POST['Name']) ? htmlspecialchars($_POST['Name']) : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" required placeholder="Enter the supplier address" name="Address" value="<?php echo isset($_POST['Address']) ? htmlspecialchars($_POST['Address']) : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputStock" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputEmail" required placeholder="Enter the supplier email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputPhone" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="inputPhone" required placeholder="Enter the supplier phone" name="PhoneNumber" value="<?php echo isset($_POST['PhoneNumber']) ? htmlspecialchars($_POST['PhoneNumber']) : ''; ?>">
        </div>
        <div class="col-12 button-container">
            <button type="submit" class="btn btn-primary" name="save">Add Supplier</button>
        </div>
    </form>
</div>
<?php include 'admin_footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
    if(isset($_POST["save"])){
    $name = $_POST["Name"];
    $address = $_POST["Address"];
    $email = $_POST["email"];
    $phone = $_POST["PhoneNumber"];

    $connect=mysqli_connect("localhost", "root", "", "nourishbakery");

    $state = "INSERT INTO `supplier` (`Name`, `Address`, `email`, `PhoneNumber`) 
    VALUES ('$name', '$address', '$email', '$phone')";

    $result=mysqli_query($connect,$state);
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