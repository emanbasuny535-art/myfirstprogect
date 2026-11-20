<?php
require 'db.php'; require 'auth.php'; require_login();
$rows=$pdo->query("SELECT c.customer_id, CONCAT(c.first_name,' ',c.last_name) AS customer_name, COUNT(o.order_id) AS orders_count FROM customers c LEFT JOIN orders o ON o.customer_id=c.customer_id GROUP BY c.customer_id,c.first_name,c.last_name ORDER BY orders_count DESC")->fetchAll();
require 'header.php'; ?>
<h2>Number of Orders per Customer</h2><div class="table-wrap"><table><tr><th>Customer</th><th>Orders Count</th></tr>
<?php foreach($rows as $r): ?><tr><td><?=e($r['customer_name'])?></td><td><?=e($r['orders_count'])?></td></tr><?php endforeach; ?></table></div>
<?php require 'footer.php'; ?>
