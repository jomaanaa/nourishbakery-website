<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Check if the user is not logged in
$showModal = !isset($_SESSION['Name']);
?>
<?php
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
    header('location: customer_home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nourish Bakery</title>
    <link rel="stylesheet" href="./css_files/customer_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preload" href="products/holiday-hover.avif" as="image">
</head>
<body>
<?php include 'customer_navbar.php'; ?>
<!-- Modal -->
<?php if ($showModal): ?>
<div class="modal" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="welcomeModalLabel">Welcome to Nourish Bakery!</h5>
            </div>
            <div class="modal-body">
                <p>Please log in or sign up to access the website!</p>
            </div>
            <div class="modal-footer">
                <a href="customer_login.php" class="btn btn-success">Log In</a>
                <a href="customer_signup.php" class="btn btn-success">Sign Up</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
    welcomeModal.show();
});
</script>
<?php endif; ?>
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
    <div class="carousel-item active">
    <video autoplay loop muted playsinline>
                <source src="pictures/video3.mp4" type="video/mp4">
            </video>
    </div>
    <div class="carousel-item">
    <video autoplay loop muted playsinline>
                <source src="pictures/our video.mov" type="video/mp4">
            </video>
    </div>
    <div class="carousel-item">
    <video autoplay loop muted playsinline>
                <source src="pictures/Beachfront B-Roll_ Baking Cookies (Free to Use HD Stock Video Footage).mp4" type="video/mp4">
            </video>
    </div>
</div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
    </div>
<div class="container-fluid">
<!--<?php
$user=$_SESSION['Name'];
echo"<h1> Welcome $user</h1>";
?> -->
<h2>New Collection</h2>
<div class="product-container">
<?php
    $connect = mysqli_connect("localhost", "root", "", "nourishbakery");

if (!$connect) {
    die("<div class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</div>");
}


$state = "SELECT * FROM product WHERE collection LIKE '%New%'";
$result = mysqli_query($connect, $state);

if ($result === FALSE) {
    echo "<div class='alert alert-danger'>Query failed: " . mysqli_error($connect) . "</div>";
} else { 
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product-card'>
        <img src='" . htmlspecialchars($row['Image']) . "' alt='" . htmlspecialchars($row['Name']) . "' style='width:200px; height:100%;'class='product-image'>
            <h3 class='product-name'>" . htmlspecialchars($row['Name']) . "</h3>
            <p class='product-price'> EGP " . htmlspecialchars($row['Price']) . "</p>
            <form method='post'>
    <input type='hidden' name='prodid' value='" . $row['P_ID'] . "'>
    <input type='submit' name='buy' value='Add to Cart'  class='btn btn-outline-secondary'>
</form>
                </div>";
    }
    echo "</div>";
}
mysqli_close($connect);
?>
</div>

    <h2>Limited Edition</h2>
<div class="product-container">
<?php
    $connect = mysqli_connect("localhost", "root", "", "nourishbakery");

if (!$connect) {
    die("<div class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</div>");
}

$state = "SELECT * FROM product WHERE collection LIKE '%Xmas%'";
$result = mysqli_query($connect, $state);

if ($result === FALSE) {
    echo "<div class='alert alert-danger'>Query failed: " . mysqli_error($connect) . "</div>";
} else { 
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product-card'>
        <img src='" . htmlspecialchars($row['Image']) . "' alt='" . htmlspecialchars($row['Name']) . "' style='width:200px; height: 100%;'class='product-image'>
            <h3 class='product-name'>" . htmlspecialchars($row['Name']) . "</h3>
            <p class='product-price'> EGP " . htmlspecialchars($row['Price']) . "</p>
            <p class='product-description'>" . htmlspecialchars($row['Desc']) . "</p>
            <form method='post'>
    <input type='hidden' name='prodid' value='" . $row['P_ID'] . "'>
    <input type='submit' name='buy' value='Add to Cart' class='btn btn-outline-secondary' background-color=' #f3c6d3' >
</form>
                </div>";
    }
    echo "</div>"; 
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #f3c6d3;
            border-radius: 50%;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #chat-window {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 300px;
            height: 400px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: none;
            flex-direction: column;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #chat-header {
            background-color: #f3c6d3;
            color: #1e1e1e;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        #chat-body {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
        }

        #chat-input-container {
            display: flex;
            border-top: 1px solid #ccc;
        }

        #chat-input {
            flex-grow: 1;
            padding: 10px;
            border: none;
            outline: none;
        }

        #send-button {
            padding: 10px;
            background-color: #f3c6d3;
            color: #1e1e1e;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="chat-icon">💬</div>
    <div id="chat-window">
        <div id="chat-header">Chatbot</div>
        <div id="chat-body"></div>
        <div id="chat-input-container">
            <input id="chat-input" type="text" placeholder="Type a message...">
            <button id="send-button">Send</button>
        </div>
    </div>

    <script>
        const chatIcon = document.getElementById('chat-icon');
        const chatWindow = document.getElementById('chat-window');
        const chatInput = document.getElementById('chat-input');
        const chatBody = document.getElementById('chat-body');
        const sendButton = document.getElementById('send-button');

        // Toggle chat window visibility
        chatIcon.addEventListener('click', () => {
            chatWindow.style.display = chatWindow.style.display === 'none' ? 'flex' : 'none';
        });

        // Send message to chatbot
        sendButton.addEventListener('click', () => {
            const userMessage = chatInput.value;
            if (!userMessage) return;

            // Add user message to chat
            addMessageToChat('You', userMessage);

            // Send request to Python chatbot
            fetch('http://127.0.0.1:5000/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ user_input: userMessage }),
            })
                .then((response) => response.json())
                .then((data) => {
                    // Add chatbot response to chat
                    addMessageToChat('Chatbot', data.response);
                })
                .catch(() => {
                    addMessageToChat('Chatbot', 'Error connecting to server.');
                });

            chatInput.value = '';
        });

        function addMessageToChat(sender, message) {
            const messageElement = document.createElement('div');
            messageElement.textContent = `${sender}: ${message}`;
            chatBody.appendChild(messageElement);
            chatBody.scrollTop = chatBody.scrollHeight;
        }
    </script>
</body>
</html>
</div>
<?php include 'customer_footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>