<?php

session_start();
// print_r($_SESSION);

if (!isset($_SESSION['itemcount'])) {
    $_SESSION['itemcount'] = 0;
}

if (isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

$connect = mysqli_connect('localhost', 'root', '', 'nourishbakery');
if (!$connect) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['buy'])) {
    $prodid = $_POST['prodid'];
    $product_stmt2 = "SELECT * FROM product WHERE P_ID = $prodid";
    $result2 = mysqli_query($connect, $product_stmt2);
    while ($prodset = mysqli_fetch_array($result2)) {
        $cart = [
            'id' => $prodset[0],
            'name' => $prodset[2],
            'price' => $prodset[4],
            'img' => $prodset[1],
            'stock' => $prodset[3],
            'quantity' => 1,
        ];
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        $_SESSION['cart'][] = $cart;
        $_SESSION['itemcount'] += 1;
    } else {
        $ids = array_column($_SESSION['cart'], 'id');
        if (!in_array($cart['id'], $ids)) {
            $_SESSION['cart'][] = $cart;
            $_SESSION['itemcount'] += 1;
        } else {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($cart['id'] == $product['id']) {
                    $_SESSION['cart'][$key]['quantity'] += 1;
                }
            }
            $_SESSION['itemcount'] += 1;
        }
    }
    header('location: shopping_cart.php');
}

// Pagination logic
$products_per_page = 4;
$current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($current_page - 1) * $products_per_page;

// Fetch total number of products
$total_products_stmt = 'SELECT COUNT(*) AS total FROM product';
$total_products_result = mysqli_query($connect, $total_products_stmt);
$total_products_row = mysqli_fetch_assoc($total_products_result);
$total_products = $total_products_row['total'];
$total_pages = ceil($total_products / $products_per_page);

// Fetch products for the current page
$product_stmt = "SELECT * FROM product LIMIT $products_per_page OFFSET $offset";
$result = mysqli_query($connect, $product_stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Bakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/shopping_cart.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/home.css" type="text/css">
    <link rel="stylesheet" href="./css/navbar.css" type="text/css">
</head>

<body>
<?php include 'customer_navbar.php'; ?>
    <div class="container mt-5">
        <div class="row">

            <?php
            
            if ($result) {
                while ($prod = mysqli_fetch_assoc($result)) {
                    $reverse_layout_class = $prod['P_ID'] % 2 != 0 ? 'reverse-layout' : '';
                    $rotate_style = $prod['P_ID'] % 2 != 0 ? 'rotate(-13deg)' : 'rotate(20deg)';
                    if ($prod['P_ID'] == 4) {
                        $rotate_style = 'rotate(-20deg)';
                    } elseif ($prod['P_ID'] == 11) {
                        $rotate_style = 'rotate(-25deg)';
                    } elseif ($prod['P_ID'] == 6) {
                        $rotate_style = 'rotate(9deg)';
                    }
            
                    echo "<div class='col-md-12 mt-5'>
                                        <div class='product-card $reverse_layout_class'>
                                            <img src='{$prod['Image']}' class='img-fluid' alt='{$prod['Name']}' style='transform:$rotate_style;'>
                                            <div class='content'>
                                                <h2>{$prod['Name']}</h2>
                                                <p>{$prod['Desc']}</p>
                                                <p>Price: {$prod['Price']} EGP</p>
                                                <form action='' method='post'>
                                                    <input type='hidden' name='prodid' value='{$prod['P_ID']}'>
                                                    <input type='submit' class='btn btn-outline-light' name='buy' value='Add to Cart'>
                                                </form>
                                            </div>
                                        </div>
                                    </div>";
                }
            } else {
                echo '<p>No products available at the moment.</p>';
            }
            ?>
        </div>
        <div class="row">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php if ($current_page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php include 'customer_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>