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
    <link href="./css_files/admin_login.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>
    <div class="form-container">
        <h1>Log in</h1>
        <form action="" method="post" enctype="multipart/form-data" novalidate>
            <div class="row">
                <div class="col-8 md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email..." required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-8 md-4">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Enter your password..." required value="<?php echo isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : ''; ?>">
                </div>
            </div>
            <div class="col-12 button">
                <button class="btn btn-custom" type="submit" value="Signup" name="login">Log in</button>
            </div>
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
$stmt="SELECT * FROM `Admin` WHERE `Email`='$email' AND `Password`='$pwd'";
$result=mysqli_query($conn, $stmt);
$login = false;
if($admin=mysqli_fetch_array($result)){
    $_SESSION['A_ID']=$admin[0];
    $_SESSION['Password']=$admin[1];
    $_SESSION['Username']=$admin[2];
    $_SESSION['Email']=$admin[3];
    $_SESSION['Phone']=$admin[4];
    $_SESSION['Gender']=$admin[5];
    $_SESSION['Image']=$admin[6];
    $_SESSION['loggedin']='true';
    $_SESSION['role'] = 'admin';

    header("location:admin_home.php");
}
while ($row = mysqli_fetch_array ($result)){
    echo "<h3>Welcome $row[2]</h3>";
    $login=true;
}
if($login==false)
echo"<div class='alert alert-danger' role='alert'>
    Invalid username or password.</div>";}
?>