<?php
require_once __DIR__ . '/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MySQL Store</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
  <a class="brand" href="index.php">MySQL Store</a>
  <div class="links">
    <?php if (!empty($_SESSION['customer_id'])): ?>
      <a href="customers_salary.php">High Salary</a>
      <a href="customer_id.php">Customer ID</a>
      <a href="customer_orders.php">Orders</a>
      <a href="best_selling.php">Best Sellers</a>
      <a href="employees.php">Employees</a>
      <a href="search_customer.php">Search Name</a>
      <a href="customers_city.php">By City</a>
      <a href="products_quantity.php">Quantity</a>
      <a href="richest_customers.php">Richest</a>
      <a href="product_details.php">Product Details</a>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </div>
</nav>
<main class="container">
