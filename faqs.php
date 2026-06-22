<?php

session_start();
// print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQs - Nourish Bakery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css_files/faqs.css" type="text/css">
</head>
<body>
<?php include 'customer_navbar.php'; ?>
<main class="faq-container">
    <div class="accordion" id="faqAccordion">
    <?php
    $faqs = [
    ["question" => "What makes Nourish Bakery healthier?", "answer" => "Our treats contain 40% fewer calories, 30% less sugar, and 60% less fat per 100g compared with leading brands. They are made with natural colours and flavours and are free from artificial sweeteners. We bake with high-quality healthy ingredients including fruits and veggie purees, pure nut butters, and low-fat dairy."],
    ["question" => "Do you offer sugar-free options?", "answer" => "Yes, all of our desserts are sugar-free. We use natural sweeteners like stevia, Erythritol, yacon syrup, and monk fruit sweetener."],
    ["question" => "What is the shelf life of the cookies?", "answer" => "Two weeks - they're baked fresh with no preservatives. If you think it'll take longer than 2 weeks to consume, we recommend sticking them in the freezer as soon as you receive them. Freezing can keep them fresh for up to one month!"],
    ["question" => "I have a nut allergy, can I still eat your cookies?","answer" => "We bake all of our cookies in an open kitchen where wheat, dairy, eggs, soy, peanuts, and tree nuts are all present. While we do our best to prevent cross contamination, we cannot completely eliminate the risk. If you have a severe allergy we recommend consulting a medical professional before consuming our products."],
    ["question" => "Do you have a physical storefront?", "answer" => "Currently, we do not have physical stores and we sell our products through online channels only. We aspire to add physical channels as well in the future."],
    ["question" => "Where can I shop your products?", "answer" => "You can shop our products online through our website or by calling us at (+02 01156 49079)."],
    ["question" => "What's your return/exchange/refund policy?", "answer" => "At Nourish Bakery, we take great pride in the quality and freshness of our products. Due to the perishable nature of our baked goods, we do not offer returns, exchanges, or refunds."]
    ];
        foreach ($faqs as $index => $faq) {
        $isFirst = $index === 0 ? 'show' : '';
        echo "<div class='accordion-item faq-item'>
                <h2 class='accordion-header' id='heading{$index}'>
                    <button class='accordion-button " . ($isFirst ? "" : "collapsed") . "' type='button' data-bs-toggle='collapse' data-bs-target='#collapse{$index}' aria-expanded='" . ($isFirst ? "true" : "false") . "' aria-controls='collapse{$index}'>
                    {$faq['question']}
                    </button>
                </h2>
                <div id='collapse{$index}' class='accordion-collapse collapse {$isFirst}' aria-labelledby='heading{$index}' data-bs-parent='#faqAccordion'>
                    <div class='accordion-body'>
                    {$faq['answer']}
                    </div>
                </div>
                </div>";
        }
    ?>
    </div>
</main>

<?php include 'customer_footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>