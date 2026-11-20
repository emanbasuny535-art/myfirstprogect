<?php
require 'db.php'; require 'auth.php'; require_login();
$sql="SELECT p.product_name, SUM(oi.quantity) AS units_sold, SUM(oi.quantity*oi.unit_price) AS total_sales FROM products p JOIN order_items oi ON oi.product_id=p.product_id GROUP BY p.product_id,p.product_name ORDER BY units_sold DESC";
$rows=$pdo->query($sql)->fetchAll();
require 'header.php'; ?>
<h2>Best-Selling Products</h2><div class="table-wrap"><table><tr><th>Product</th><th>Units Sold</th><th>Total Sales</th></tr>
<?php foreach($rows as $r): ?><tr><td><?=e($r['product_name'])?></td><td><?=e($r['units_sold'])?></td><td><?=number_format($r['total_sales'],2)?></td></tr><?php endforeach; ?></table></div>
<?php require 'footer.php'; ?>
