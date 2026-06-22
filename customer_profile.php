<?php
session_start();
// print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nourish Bakery</title>
    <link href="./css_files/customer_profile.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'customer_navbar.php'?>
<div class="background-image" style="background-color: white;">
    <img src="./pictures/Asset 11.png" alt="cookies" class="img-fluid">
</div>
<div class="container">
    <div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4"><?php
            $image=$_SESSION['Image'];
            echo "<img src='$image' class='img-thumbnail' alt='image' width=200px height=auto>";
            ?>
        </div>
        <div class="col-md-8">
        <div class="card-bodyy">
            <h4 class="card-titlee"><?php
            $user=$_SESSION['Name'];
            echo"Customer Name: $user";
            ?></h4>
            <p class="card-textt"><?php
            $email=$_SESSION['Email'];
            echo"Email Address: $email";
            ?></p>
            <p class="card-textt"><?php
            $phone=$_SESSION['Phone'];
            echo"Phone Number: +20 $phone";
            ?></p>
            <p class="card-textt"><?php
            $gender=$_SESSION['Gender'];
            echo"Gender: $gender";
            ?></p>
        </div>
        </div>
    </div>
    </div>
</div>
<?php include 'customer_footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>