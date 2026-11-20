<?php require_once 'header.php'; ?>
<section class="hero">
  <div>
    <p class="eyebrow">DATABASE MANAGEMENT PROJECT</p>
    <h1>Welcome to MySQL Store</h1>
    <p>Explore customers, orders, employees and products.</p>
    <?php if (empty($_SESSION['customer_id'])): ?>
      <a class="btn" href="login.php">Login to continue</a>
    <?php else: ?>
      <a class="btn" href="customers_salary.php">Explore Dashboard</a>
    <?php endif; ?>
  </div>
</section>
<section class="intro">
<h2>Assignment 4</h2>
<p>This project demonstrates MySQL queries, joins, aggregate functions, searching, validation and a PHP login system.</p>
</section>
<?php require 'footer.php'; ?>
