<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css_files/admin_reports.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Reports</title>
</head>
<body>
<?php include 'admin_navbar.php'?>
<div class="form-container">
<video autoplay loop muted plays-inline class="d-block w-100">
    <source src="./pictures/video3.mp4" type="video/mp4">
</video>
<h2>Reports Dashboard</h2>
<form method="post">
<div class="row">
<div class="col-sm-3 mb-3 mb-sm-0">
<div class="card text-center center">
    <div class="card-body body">
    <h5 class="card-title title">Customer Report</h5>
    <button class="btn btn-primary" type="submit" value="Customer Report" name="Customer">Customer Report</button>
    </div>
</div>
</div>
<div class="col-sm-3">
<div class="card text-center center">
    <div class="card-body body">
    <h5 class="card-title title">Supplier Report</h5>
    <button class="btn btn-primary" type="submit" value="Supplier Report" name="sup">Supplier Report</button>
    </div>
</div>
</div>
<div class="col-sm-3">
<div class="card text-center center">
    <div class="card-body body">
    <h5 class="card-title title">Collection Report</h5>
    <button class="btn btn-primary" type="submit" value="Collection Report" name="Collections">Collection Report</button>
    </div>
</div>
</div> 
</div>
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST["sup"])){

    $conn=mysqli_connect("localhost","root","","nourishbakery");
    $stmt="SELECT * FROM supplier";
    $result=mysqli_query($conn,$stmt);
    echo"<div class='container'><table class='table'>
    <thead>
    <tr>
        <th scope='col'>Suplier Name</th>
        <th scope='col'>Address</th>
        <th scope='col'>Phone Number</th>
        </tr>
    </thead><tbody>";
    while ($row=mysqli_fetch_array($result)){
        echo "<tr><td>$row[1]</td><td>$row[2]<td>$row[4]</td></tr>";
    }
        echo "</tbody></table></div>";
}

if(isset($_POST["Customer"])){
    $conn=mysqli_connect("localhost","root","","nourishbakery");
    $stmt="SELECT Name,Email,Phone,Gender,`Image`FROM Customer";
    $result=mysqli_query($conn,$stmt);
    echo "<div class='container'><table class='table'>";
    echo "<thead><tr>
    <th scope='col'>Name</th>
    <th scope='col'>Email</th>
    <th scope='col'>Phone</th>
    <th scope='col'>Gender</th>
    <th scope='col'>Image</th>
    </tr></thead><tbody>";
    while($row=mysqli_fetch_array($result)){
        echo"<tr>
        <td>{$row['Name']}</td>
        <td>{$row['Email']}</td>
        <td>{$row['Phone']}</td>
        <td>{$row['Gender']}</td>
        <td><img src={$row['Image']} width=20% height=auto alt='Image'></td>
        </tr>";
    }
    echo"</tbody></table></div>";
}

if(isset($_POST["Collections"])){
    $conn=mysqli_connect("localhost","root","","nourishbakery");
    $stmt="SELECT * from product";
    $result=mysqli_query($conn,$stmt);
    echo"<div class='container'><table class='table'>
    <thead><tr>
    <th scope='col'>Product Name</th>
    <th scope='col'>Collection</th>
    </tr></thead><tbody>";
    while($row=mysqli_fetch_array($result))
    {
    echo"<tr><td>$row[2]</td><td>$row[6]</td></tr>";
    $login=true;
    }
    echo"</tbody></table></div>";
    }


?>
<?php include 'admin_footer.php'?>