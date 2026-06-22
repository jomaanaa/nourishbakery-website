<?php

session_start();
// print_r($_SESSION);

if (isset($_POST['confirm_order'])){

$ordernote=$_POST["ordernote"];
$payment=$_POST["payment"];
$custid=$_SESSION["C_ID"];
$username=$_SESSION["Name"];
$total=$_SESSION["total"]+70;
$date=date("y-m-d");

if ($payment=="Credit"){
    header("location:credit_payment.php");}
else{
    header("location:confirm_order.php");}

$connect=mysqli_connect("localhost","root","","nourishbakery");
$stmt="INSERT INTO `order` (`Date`,`Total`,`C_ID`,`Payment`,`Note`) VALUES('$date','$total','$custid','$payment','$ordernote')";

$result=mysqli_query($connect,$stmt);

$ordernum=mysqli_insert_id($connect);

if($ordernum==0){
    die("Error: could not retrieve order number.");
}

foreach($_SESSION['cart'] as $product){
    $product_id=$product['id'];
    $quantity=$product['quantity'];

$stmt2="INSERT INTO `product_order` (`P_ID`,`O_ID`,`Quantity`) VALUES('$product_id','$ordernum','$quantity')";

$result2=mysqli_query($connect,$stmt2);

if (!$result2){
    die("Error inserting order details:".mysqli_error($connect));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/confirm_order.css" rel="stylesheet">
</head>
<body>
<?php include "customer_navbar.php";?>
<main>
    <div class="container">
        <img src="./pictures/accept.png" alt="checkmark" class="checkmark">
        <h1><strong>Thank You!</strong></h1>
        <p>A confirmation has been sent to your email.<br>
        Since you're here, join our list for discounts!</p>
        <form class="form-layout">
            <div class="input-group">
                <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" class="email-input">
                <button type="button" class="btn btn-primary emailsign">Sign Me Up</button>
            </div>
        </form>
        <form method="post" action="shopping_cart.php"><input type="submit" class="btn btn-primary continueshop" name="shop" value="Continue Shopping→"></input><form>
    </div>
</main>

<?php include "customer_footer.php";?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php

unset($_SESSION['cart']); 
$_SESSION['itemcount']=0;
if (isset($_POST["shop"])){
    header("location:shopping_cart.php");
}

?>