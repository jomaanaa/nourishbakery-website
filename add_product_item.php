<?php
session_start();
// print_r($_SESSION);

if (!isset($_SESSION['itemcount'])) {
    $_SESSION['itemcount'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ingredients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css_files/add_product_item.css" rel="stylesheet">
</head>
<body>
<?php include 'admin_navbar.php'?>
        <div class="titlebox">
        <h2>Add Ingredients</h2>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="labels">
            <label>Product Name </label>
            </div>
            <div class="inputs">
            <select name="product" class="form-control">
                <option value="" hidden>Select a Product</option>
                <?php
                $con = mysqli_connect("localhost", "root", "", "nourishbakery");
                $stmt = "SELECT P_ID, Name FROM product";
                $result = mysqli_query($con, $stmt);
                while ($row = mysqli_fetch_array($result))
                    echo "<option value='{$row['P_ID']}'>{$row['Name']}</option>";
                ?>
            </div>
    
<div class="buttons">
            <input type="submit" name="ing" value="View Ingredients" class="btn btn-outline-light" background-color=" #f3c6d3">
            </div>
        </form>

<?php
        if (isset($_POST["sub"])) {
            $P = $_POST["product"];
            $I = $_POST["item"];
            $con = mysqli_connect("localhost", "root", "", "nourishbakery");

            $checkStmt = "SELECT COUNT(*) FROM product_item WHERE P_ID = '$P' AND I_ID = '$I'";
            $check = mysqli_query($con, $checkStmt);
            $row = mysqli_fetch_array($check);

            if ($row[0] > 0) {
                echo "<div class='alert alert-danger alert-container' role='alert'>Error: This ingredient has already been added to the selected product.</div>";
            } else {

                $stmt = "INSERT INTO product_item (P_ID, I_ID) VALUES ('$P', '$I')";
                $result = mysqli_query($con, $stmt);
                if ($result == FALSE) {
                    echo "<div class='alert alert-danger alert-container' role='alert'>Error: the ingredient was not added!</div>" . mysqli_error($con);
                } else {
                    echo "<div class='alert alert-success alert-container' role='alert'>The ingredient was successfully added!</div>";
                }
            }
        }
if (isset($_POST["ing"])) {
    $P = $_POST["product"];

    // Establish a secure database connection
    $con = mysqli_connect("localhost", "root", "", "nourishbakery");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("
    SELECT 
        product.P_ID, 
        product.Name AS product_name, 
        product.Image AS product_image,
        GROUP_CONCAT(item.Name SEPARATOR ', ') AS item_names,
        GROUP_CONCAT(item.Image SEPARATOR ', ') AS item_images
    FROM 
        product
    LEFT JOIN 
        product_item ON product.P_ID = product_item.P_ID
    LEFT JOIN 
        item ON product_item.I_ID = item.I_ID
    WHERE 
        product.P_ID = ?
    GROUP BY 
        product.P_ID
");

    // Bind parameter and execute the statement
    $stmt->bind_param("i", $P); // "i" specifies integer type
    $stmt->execute();

    // Fetch results
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div style='
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                margin: 20px auto; 
                padding: 15px; 
                width: 600px; 
                border: 1px solid #ccc; 
                border-radius: 10px; 
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                background-color: white;
                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            ' onmouseover='this.style.transform=\"scale(1.05)\"; this.style.boxShadow=\"0 8px 12px rgba(0, 0, 0, 0.2)\";' onmouseout='this.style.transform=\"scale(1)\"; this.style.boxShadow=\"0 4px 6px rgba(0, 0, 0, 0.1)\";'>
            
            <h2 style='margin-bottom: 10px; color: black; text-align: center;'> " . $row["product_name"] . "</h2>";
    
            // Image and details container
            echo "<div style='display: flex; justify-content: space-between; width: 100%;'>";
            
            // Left side: Product Image
            echo "<div style='flex: 1; padding-right: 15px; text-align: left;'>
                <img src='" . $row["product_image"] . "' alt='Product Image' style='width: 200px; border-radius: 8px;'>
            </div>";
    
            // Right side: Items
            echo "<div style='flex: 2; text-align: left;'>
                <h3>Items:</h3>";
    
            if (!empty($row["item_names"])) {
                // Items list
                $itemNames = explode(", ", $row["item_names"]);
                echo "<ul style='padding-left: 20px;'>";
                foreach ($itemNames as $itemName) {
                    echo "<li style='margin-top: 5px;'>" . $itemName . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p style='color: gray;'>No items added yet.</p>";
            }
    
            // Add dropdown for adding items
            echo "<form action='' method='post'>
                <label for='add-item'>Add Item:</label>
                <select name='item' id='add-item' style='margin-left: 10px;'>
                    <option value='' hidden>Select an Item</option>";
                    
                    $itemResult = mysqli_query($con, "SELECT I_ID, Name FROM item");
                    while ($itemRow = mysqli_fetch_assoc($itemResult)) {
                        echo "<option value='{$itemRow['I_ID']}'>{$itemRow['Name']}</option>";
                    }
            echo "</select>
                <input type='hidden' name='product' value='" . $row["P_ID"] . "'>
                <button type='submit' class='add' name='sub' style='margin-left: 10px;'>Add</button>
            </form>";
    
            echo "</div>"; // Close right side
            echo "</div>"; // Close container
            echo "</div>"; // Close card
        }
    }
}

include 'admin_footer.php';

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>