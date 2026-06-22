<?php

session_start();
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
    <link href="./css_files/story.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include 'customer_navbar.php'; ?>
    <header>
        <video autoplay muted loop>
            <source src="./pictures/video3.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </header>

    <section class="py-5 fade-in">
        <div class="container">
            <h2 class="section-title">About Us</h2>
            <p class="lead">Nourish Bakery was born out of our desire to create desserts that are not only good for you but also taste amazing. We use only the finest natural ingredients, including organic flours, alternative sweeteners, and fresh seasonal fruits and vegetables. Our treats are packed full of high-quality ingredients, catering to various dietary requirements.</p>
        </div>
    </section>
    <section class="py-5 bg-light fade-in delay-1">
        <div class="container">
            <h2 class="section-title">Our Story</h2>
            <p class="lead-mb-6">Nouran, Mariam, Jomana, Maryam and Ahmed, friends who met in university and bonded over our shared passion for healthy living and baking. Realizing the lack of healthy dessert options, especially for those with dietary restrictions, we created Nourish Bakery to bring delicious and wholesome treats to everyone.</p>
            <div class="row g-4">
                <div class="col-lg-2 col-md-6 fade-in delay-2">
                    <div class="team-member text-center p-3">
                        <img src="./pictures/idea.png" alt="Nouran">
                        <h3>Nouran</h3>
                        <p>Co-founder & Creative Visionary</p>
                        <a href="https://instagram.com/nouran" target="_blank" class="text-decoration-none text-dark">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 fade-in delay-3">
                    <div class="team-member text-center p-3">
                        <img src="./pictures/creativity.png" alt="Mariam">
                        <h3>Mariam</h3>
                        <p>Co-founder & Head Baker</p>
                        <a href="https://instagram.com/mariam" target="_blank" class="text-decoration-none text-dark">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 fade-in delay-4">
                    <div class="team-member text-center p-3">
                        <img src="./pictures/cookbook.png" alt="Jomana">
                        <h3>Jomana</h3>
                        <p>Co-founder & Recipe Innovator</p>
                        <a href="https://instagram.com/jomana" target="_blank" class="text-decoration-none text-dark">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 fade-in delay-5">
                    <div class="team-member text-center p-3">
                        <img src="./pictures/efficiency.png" alt="Maryam">
                        <h3>Maryam</h3>
                        <p>Co-founder & Operations Manager</p>
                        <a href="https://instagram.com/maryamkilanyy" target="_blank" class="text-decoration-none text-dark">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 fade-in delay-6">
                    <div class="team-member text-center p-3">
                        <img src="./pictures/delivery-time.png" alt="Ahmed">
                        <h3>Ahmed</h3>
                        <p>Co-founder & Logistics Lead</p>
                        <a href="https://instagram.com/ahmed" target="_blank" class="text-decoration-none text-dark">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="cta text-center py-5">
        <a href="shopping_cart.php" class="btn btn-lg">Explore Our Desserts</a>
    </div>
    <?php include 'customer_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>