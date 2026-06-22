<?php   

if(isset($_POST["save"])){
$name = $_POST["name"];
$Phone = $_POST["Phone"];
$pwd1 = $_POST["pwd1"];
$pwd2 = $_POST["pwd2"];
$Email = $_POST["Email"];
$street = $_POST["Street"];
$ZIP = $_POST["Zip"];
$City = $_POST["City"];
$gen = $_POST["gen"];
$img="./Customer/".basename($_FILES['Image']['name']);

$image=$_FILES['Image']["name"];
move_uploaded_file($_FILES["Image"]["tmp_name"],$img);

if ($pwd1 != $pwd2){ 
    echo"<div class='alert alert-danger' role='alert'>
    Passwords Mismatch.
    </div>"; 
}
else{
$conn = mysqli_connect("localhost", "root", "", "nourishbakery");
$stmt = "INSERT INTO `Customer` ( `name`,`Phone`, `Password`,`Email`, `Street`, `ZIP`, `City`,`Gender`,`Image`) 
VALUES ('$name','$Phone', '$pwd1', '$Email', '$street', '$ZIP', '$City','$gen','$img')";
$result = mysqli_query($conn, $stmt);
if($result==FALSE)  
    echo "Error. $name was not added";
else
    header("location:customer_login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/customer_signup.css" rel="stylesheet">
</head>
<body>
<div class="form-container">
        <h1>Sign Up</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 md-3 mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                </div>
                <div class="col-6 md-3 mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" placeholder="Email" name="Email" required value="<?php echo isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : ''; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6 md-3 mb-3">
                    <label for="pwd1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pwd1" placeholder="Password" name="pwd1" required value="<?php echo isset($_POST['pwd1']) ? htmlspecialchars($_POST['pwd1']) : ''; ?>">
                </div>
                <div class="col-6 md-3 mb-3">
                    <label for="pwd2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="pwd2" placeholder="Confirm Password" name="pwd2" required value="<?php echo isset($_POST['pwd2']) ? htmlspecialchars($_POST['pwd2']) : ''; ?>">
                </div>
            </div>

            <div class="row">
            <div class="col-6 md-3 mb-3">
                    <label for="Phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="Phone" placeholder="Phone" name="Phone" required value="<?php echo isset($_POST['Phone']) ? htmlspecialchars($_POST['Phone']) : ''; ?>">
                </div>
                <div class="col-6 md-3 mb-3">
                    <label for="Street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="Street" placeholder="Street" name="Street" required value="<?php echo isset($_POST['Street']) ? htmlspecialchars($_POST['Street']) : ''; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6 md-3 mb-3">
                    <label for="City" class="form-label">City</label>
                    <input type="text" class="form-control" id="City" placeholder="City" name="City" required value="<?php echo isset($_POST['City']) ? htmlspecialchars($_POST['City']) : ''; ?>">
                </div>
                <div class="col-6 md-3 mb-3">
                    <label for="Zip" class="form-label">ZIP Code</label>
                    <input type="text" class="form-control" id="Zip" placeholder="ZIP Code" name="Zip" value="<?php echo isset($_POST['Zip']) ? htmlspecialchars($_POST['Zip']) : ''; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-6 md-3 mb-3">
                    <label class="form-label">Gender</label>
                    <div class="d-flex gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gen" id="male" value="male" checked>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gen" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="col-6 md-3 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control file-upload" id="image" name="Image">
                </div>
            </div>
            <div class="col-12 button">
                <button class="btn btn-custom" type="submit" value="Signup" name="save">Sign up</button>
            </div>
            <div>
                <h6>Have an account?<a href=".\customer_login.php">Login</a></h6>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>