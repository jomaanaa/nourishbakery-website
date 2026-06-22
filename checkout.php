<?php

session_start();
// print_r($_SESSION);

if(!isset($_SESSION['cart'])){

}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: empty_cart.php');
    exit();
}

$total=0;
foreach($_SESSION['cart'] as $product)
{
    $total+=$product['quantity']*$product['price'];
}

$_SESSION['total']=$total;

$username=$_SESSION["Name"];
$phone=$_SESSION["Phone"];
$street=$_SESSION["Street"];
$city=$_SESSION["City"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/checkout.css" rel="stylesheet">
</head>
<body>
    <?php include("customer_navbar.php");?>
    <div class="container-fluid">
    <div class="container">
    <!-- Title -->
    <div class="d-flex justify-content-between align-items-center py-3">
        <h2 class="h5 mb-0"><a href="#" class="text-muted"></a>Your cart</h2>
    </div>

    <!-- Main content -->
    <div class="row">
        <div class="col-lg-8">
        <!-- Details -->
        <div class="card mb-4">
            <div class="card-body">
            <div class="mb-3 d-flex justify-content-between">
                <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </div>
                </div>
            </div>
            <table class="table table-borderless">

    <?php 
        if (isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $product)
                echo"<tbody>
                <tr>
                    <td>
                    <div class='d-flex mb-2'>
                        <div class='flex-shrink-0'>
                        <img src=$product[img] alt='product' width='35' class='img-fluid'>
                        </div>
                        <div class='flex-lg-grow-1 ms-3'>
                        <h6 class='small mb-0'>$product[name]</h6>
                        </div>
                    </div>
                    </td>
                    <td>$product[quantity]</td>
                    <td class='text-end'> $product[price]EGP</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>";
        }
    ?>
                    <td colspan='2'>Subtotal</td>
                    <td class='text-end'><?php echo $_SESSION['total'] ?>EGP</td>
                </tr>
                <tr>
                    <td colspan='2'>Shipping</td>
                    <td class='text-end'>70EGP</td>
                </tr>
                <tr class='fw-bold'>
                    <td colspan='2'>TOTAL</td>
                    <td class='text-end'> <?php echo $_SESSION['total']+70 ?>EGP</td>
                </tr>
                </tfoot>
            </table>
            </div>
        </div>

        <!-- Payment -->
        <div class="card mb-4">
            <form method="post" action="confirm_order.php">
            <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                <h3 class="h6">Payment Method</h3>
                <p>Total: <?php echo $_SESSION['total']+70?>EGP</p>
                <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" value="Cash" checked>
                    <label class="form-check-label" for="flexRadioDefault1">Cash on Delivery</label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault2" value="Credit">
                    <label class="form-check-label" for="flexRadioDefault2">Credit Card</label>                    
                    <img src="./pictures/visa.png" alt="Visa" style="width: 25px; height: 25px; margin-left: 5px;">
                    <img src="./pictures/card.png" alt="Card" style="width: 25px; height: 25px; margin-left: 1px;">
                </div>
                </div>
                </div>
                <div class="col-lg-6">
                <h3 class="h6">Billing address</h3>
                <address>
                    <?php
                    echo "<strong>$username</strong><br>
                    $street<br>
                    $city<br>
                    $phone
                </address>";?>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
        <!-- Customer Notes -->
        <div class="card mb-4">
            <div class="card-body">
            <h3 class="h6">Notes</h3>
            <div class="input-group">
            <textarea class="form-control notes" aria-label="With textarea" name="ordernote"></textarea>
            </div>
            </div>
        </div>
        <div class="card mb-4">
        <!-- Shipping information -->
        <div class="card-body">
        <h3 class="h6">Shipping Information</h3>
        <strong>Tracking Number</strong>
        <span><a href="#" class="text-decoration-underline link" target="_blank">FF1234567890</a><i class="bi bi-box-arrow-up-right"></i></span>
        <hr>
        <h3 class="h6">Address</h3>
        <?php
            echo"<address>
            <strong>$username</strong><br>
            $street<br>
            $city<br>
            $phone
        </address>";?>
        </div>
        </div>
        </div>
        <input class="btn btn-primary confirm-order" style="margin-left: auto; display: block;" type="submit" value="Confirm Order" name="confirm_order">
        </form>
    </div>
    </div>
    </div>
    <?php include("customer_footer.php");?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>