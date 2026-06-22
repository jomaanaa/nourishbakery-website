<?php

session_start();
// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empty Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/empty_cart.css" rel="stylesheet">
</head>
<body>
    <?php include 'customer_navbar.php'; ?>
    <div class="container mt-5 text-center empty">
        <img src="./pictures/empty-cart.png">
        <h1>Your Cart is Empty</h1>
        <p>Looks like you haven't added anything sweet to your cart yet!</p>
        <a href="shopping_cart.php" class="btn btn-primary">Go Back to Shop</a>
    </div>
    <?php include 'customer_footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
