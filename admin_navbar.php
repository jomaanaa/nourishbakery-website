<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Nourish Bakery</title>
<link href="./css_files/admin_navbar.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
<a class="navbar-brand" href="admin_home.php"><img src="./pictures/5.png" alt="NourishBakery" width=70px height=auto></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="admin_home.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="admin_reports.php">Reports</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
        Add
        </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="add_product.php" target="_self">Add Products</a></li>
        <li><a class="dropdown-item" href="add_item.php" target="_self">Add Items</a></li>
        <li><a class="dropdown-item" href="add_supplier.php" target="_self">Add Supplier</a></li>
        <li><a class="dropdown-item" href="add_product_item.php" target="_self">Add Recipe</a></li>
        </ul>
    </li>
    </ul>
    <form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <button class="btn btn-outline-success" type="submit"><a href="admin_logout.php" class="logout">Logout</a></button>
</div>  
</div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>