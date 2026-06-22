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
    <link href="./css_files/customer_login.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="form-container">
    <h1>Login</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email..." required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </div>
        <div class="mb-4">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter your password..." required value="<?php echo isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : ''; ?>">
        </div>
        <button class="btn btn-custom" type="submit" value="Signup" name="login">Login</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</div>
</body>
</html>

<?php
if(isset($_POST["login"])){
$email=$_POST["email"];
$pwd=$_POST["pass"];

$conn=mysqli_connect("localhost","root","","nourishbakery");
$stmt="SELECT * FROM `customer` WHERE `Email`='$email' AND `Password`='$pwd'";
$result=mysqli_query($conn, $stmt);
$login = false;
if($customer=mysqli_fetch_array($result)){
    $_SESSION['C_ID']=$customer[0];
    $_SESSION['Name']=$customer[1];
    $_SESSION['Email']=$customer[2];
    $_SESSION['Password']=$customer[3];
    $_SESSION['Phone']=$customer[4];
    $_SESSION['Street']=$customer[5];
    $_SESSION['ZIP']=$customer[6];
    $_SESSION['City']=$customer[7];
    $_SESSION['Gender']=$customer[8];
    $_SESSION['Image']=$customer[9];
    $_SESSION['loggedin']='true';
    $_SESSION['role'] = 'customer';

    header("location:customer_home.php");
}

while ($row = mysqli_fetch_array ($result)){
echo "<h3>Welcome $row[1]</h3>";
$login=true;
}
if($login==false)
echo"<div class='alert alert-danger' role='alert'>
    Invalid username or password.
    </div>";}
?>