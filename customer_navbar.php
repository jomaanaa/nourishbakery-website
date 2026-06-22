<?php

// session_start();
// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nourish Bakery - Our Story</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link href="./css_files/search.css" rel="stylesheet">
    <link href="./css_files/customer_navbar.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/autocomplete.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="customer_home.php"><img src="./pictures/5.png" style="width: 80px; height: 70px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="customer_home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="story.php">Our Story</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="shopping_cart.php">Our Bakes</a>
        </li>   
        <li class="nav-item">
            <a class="nav-link" href="customer_product_item.php">Cookbook</a>
        </li>             
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="customer_profile.php">View Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form method="post"><a class="dropdown-item"href="customer_logout.php">Logout</a></form></li></ul>
        </ul>
        <form class="d-flex position-relative" role="search" action="search.php" method="get">
    <input class="form-control me-2" type="text" placeholder="Find your favorite treat" aria-label="Search" name="search" id="search">
    <button class="btn btn-outline-success" type="submit" name="submitsearch">Search</button>

    <!-- Autocomplete suggestions container -->
    <div id="suggestions" style="display:none;"></div>
</form>

<script>
    $(document).ready(function () {
        $('#search').on('input', function () {
            let searchTerm = $(this).val();

            // Fetch suggestions if input length > 1
            if (searchTerm.length > 1) {
                $.ajax({
                    url: 'autocomplete.php', // The path to the autocomplete file
                    method: 'GET',
                    data: { search: searchTerm },
                    success: function (response) {
                        $('#suggestions').html(response).show();
                    },
                    error: function () {
                        $('#suggestions').hide();
                    }
                });
            } else {
                $('#suggestions').hide(); // Hide suggestions for fewer than 2 characters
            }
        });

        // Handle suggestion selection
        $(document).on('click', '.suggestion-item', function () {
            $('#search').val($(this).text()); // Set input field value to selected suggestion
            $('#suggestions').hide(); // Hide suggestions
        });

        // Hide suggestions if clicked outside
        $(document).click(function (e) {
            if (!$(e.target).closest('#search, #suggestions').length) {
                $('#suggestions').hide();
            }
        });
    });
</script>

<style>
    #suggestions {
        position: absolute;
        top: 100%;  /* Position it below the input */
        left: 0;
        width: 100%;  /* Match input width */
        background-color: white;
        border: 1px solid #ccc;
        z-index: 9999;
        display: none;
        max-height: 200px;
        overflow-y: auto;
    }

    .suggestion-item {
        padding: 8px;
        cursor: pointer;
    }

    .suggestion-item:hover {
        background-color: #f0f0f0;
    }
</style>

</body>
</html>

        <a href="checkout.php" class="position-relative">
    <img src="./pictures/cart.png" alt="Cart" class="cart-img">
    <span class="position-absolute top-0 start-100 translate-middle badge bg-pink text-dark rounded-pill">
        <?php echo $_SESSION['itemcount']; ?>
        <span class="visually-hidden">items in cart</span>
    </span>
</a>
        </form>
        </div>
    </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>