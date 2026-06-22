<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookbook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/customer_product_item.css" rel="stylesheet">
</head>
<body>
<?php include 'customer_navbar.php'; ?>

<div class="container mt-4">
    <div class="titlebox text-center mb-4">
        <h2>Our Cookbook</h2>
    </div>

    <?php
    $con = mysqli_connect("localhost", "root", "", "nourishbakery");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = "
    SELECT 
        product.P_ID, 
        product.Name AS product_name, 
        product.Image AS product_image,
        GROUP_CONCAT(item.Name SEPARATOR ', ') AS item_names
    FROM 
        product
    LEFT JOIN 
        product_item ON product.P_ID = product_item.P_ID
    LEFT JOIN 
        item ON product_item.I_ID = item.I_ID
    GROUP BY 
        product.P_ID
    ";

    $result = mysqli_query($con, $stmt);

    if (mysqli_num_rows($result) > 0) {
        echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col">';
            echo '<div class="card h-100 shadow-sm">';
            echo '<img src="' . $row['product_image'] . '" class="card-img-top" alt="' . $row['product_name'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['product_name'] . '</h5>';

            echo '<h6>Ingredients:</h6>';
            if (!empty($row['item_names'])) {
                $itemNames = explode(", ", $row['item_names']);
                echo '<ul class="list-unstyled">';
                foreach ($itemNames as $itemName) {
                    echo '<li><i class="bi bi-check-circle-fill text-success"></i> ' . $itemName . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p class="text-muted">No ingredients listed.</p>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>'; 
        }

        echo '</div>'; 
    } else {
        echo '<p class="text-center">No products available at the moment. Please check back later!</p>';
    }

    mysqli_close($con);
    ?>
</div>

<?php include 'customer_footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>