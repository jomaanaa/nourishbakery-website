<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/admin_signup.css" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <h1>Sign Up</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 md-3">
                    <label for="user" class="form-label">Username</label>
                    <input type="text" class="form-control" id="user" name="user" placeholder="Enter your full name..." required value="<?php echo isset($_POST['user']) ? htmlspecialchars($_POST['user']) : ''; ?>">
                </div>
                <div class="col-6 md-3">
                    <label for="Phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="Phone" name="Phone" placeholder="Enter your phone number..." required value="<?php echo isset($_POST['Phone']) ? htmlspecialchars($_POST['Phone']) : ''; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 md-3">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter your password..." required value="<?php echo isset($_POST['pwd']) ? htmlspecialchars($_POST['pwd']) : ''; ?>">
                </div>
                <div class="col-6 md-3">
                    <label for="pwd2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="pwd2" name="pwd2"placeholder="Confirm your password..." required value="<?php echo isset($_POST['pwd2']) ? htmlspecialchars($_POST['pwd2']) : ''; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-6 md-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="Email" name="Email" placeholder="Enter your Email Address..." required value="<?php echo isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : ''; ?>">
                </div>
                <div class="col-6 md-3">
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
            <div class="row">
                <div class="col-12 md-3">
                    <label for="Image" class="form-label">Image</label>
                    <input type="file" class="form-control file-upload" id="Image" name="Image" required>
                </div>
            </div>
            </div>
            <div class="col-12 button">
                <button class="btn btn-custom" type="submit" value="Signup" name="signup">Sign up</button>
            </div>
            <div>
                <h6>Have an account?<a href=".\admin_login.php">login</a></h6>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>

<?php
if(isset($_POST["signup"])){
$user=$_POST["user"];
$pwd=$_POST["pwd"];
$pwd2=$_POST["pwd2"];
$Phone=$_POST["Phone"];
$Email=$_POST["Email"];
$Gender=$_POST["gen"];
$img="./admin/".basename($_FILES['Image']['name']);

$image=$_FILES['Image']["name"];
move_uploaded_file($_FILES["Image"]["tmp_name"],$img);

if ($pwd!=$pwd2){ 
    echo "<div class='alert alert-danger' role='alert'>
    Error: Passwords mismatch.</div>";
    die(); 
    }

$conn = mysqli_connect("localhost", "root", "", "nourishbakery");
$stmt = "INSERT INTO `Admin` ( `Username`,`Password`, `Phone`,`Email`,`Gender`,`Image`) 
VALUES ('$user','$pwd', '$Phone', '$Email', '$Gender','$img')";
$result = mysqli_query($conn, $stmt);
if($result==FALSE)  
    echo "Error. $user was not added";
else
    header("location:admin_login.php");
    }
?>  