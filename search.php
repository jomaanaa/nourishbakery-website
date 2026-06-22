<?php
session_start();

// Check if item count is initialized
if (!isset($_SESSION['itemcount'])) {
    $_SESSION['itemcount'] = 0;
}

// Remove empty cart
if (isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

// Database connection
$connect = mysqli_connect('localhost', 'root', '', 'nourishbakery');
if (!$connect) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Handle 'buy' button click
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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="./css_files/search.css" type="text/css">
</head>

<body>
<?php include 'customer_navbar.php'; ?>
<div class="main">
<?php
$conn = mysqli_connect("localhost", "root", "", "nourishbakery");
if (isset($_GET["search"])) {
    $filter = mysqli_real_escape_string($conn, $_GET["search"]);
    $query = "SELECT * FROM product WHERE CONCAT(Image, Name, Price) LIKE '%$filter%'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        echo "<div class='results'>";
        while ($items = mysqli_fetch_assoc($query_run)) {
            echo "<div class='product'>";
            echo "<img src='" . htmlspecialchars($items['Image']) . "' alt='" . htmlspecialchars($items['Name']) . "' class='product-image'>";
            echo "<h3>" . htmlspecialchars($items['Name']) . "</h3>";
            echo "<p>Price:EGP " . htmlspecialchars($items['Price']) . "</p>";
            echo "<form action='' method='post'>
                <input type='hidden' name='prodid' value='" . htmlspecialchars($items['P_ID']) . "'>
                <input type='submit' name='buy' value='Add to Cart' class='Searchbtn'>
            </form>";
            echo "</div>";
        }

    } else {

        echo "<p>No records found for your search.</p>";
    }
} else {
    echo "<p>Please enter a search term to see results.</p>";
}
?>
</div>
    <?php include 'customer_footer.php'; ?>
</body>
</html>