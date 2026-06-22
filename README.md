# Nourish Bakery – E-Commerce Website

An e-commerce website for Nourish Bakery, a healthy sweets and treats brand, featuring product browsing, ordering and a built-in customer support chatbot powered by a custom-trained machine learning model.

## Features

- Customer registration and login
- Product browsing and ordering
- Shopping cart and checkout with credit card payment
- Admin dashboard for product, supplier, and order management
- Sales and inventory reports
- Built-in FAQ chatbot powered by a logistic regression model
- Product search with autocomplete

## Tech Stack

- PHP
- Python (Flask)
- MySQL (phpMyAdmin)
- Bootstrap
- Machine Learning (scikit-learn)

## Getting Started

### Prerequisites

- A PHP server (e.g. XAMPP or WAMP)
- MySQL via phpMyAdmin
- Python 3 installed

### Setup

**Step 1:** Clone the repository

`git clone https://github.com/jomaanaa/nourishbakery-website.git`

**Step 2:** Place the project folder in your PHP server's `htdocs` directory

**Step 3:** Import the database by opening phpMyAdmin, creating a new database named `nourishbakery`, and importing the included `nourishbakery.sql` file

**Step 4:** Install the required Python dependencies

`pip install flask flask-cors scikit-learn nltk pandas openpyxl joblib`

**Step 5:** Run the chatbot server

`cd chatbot`

`python bookie.py`

**Step 6:** Start your PHP server and open the project in your browser
## Contributors

Jomana Ahmed Mostafa
