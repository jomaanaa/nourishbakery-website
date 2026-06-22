<?php
$conn = mysqli_connect("localhost", "root", "", "nourishbakery");

if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT Name FROM product WHERE Name LIKE '%$searchTerm%' LIMIT 5";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='suggestion-item'>" . htmlspecialchars($row['Name']) . "</div>";
        }
    } else {
        echo "<div class='suggestion-item'>No results found</div>";
    }
}
?>