<?php
require 'db.php'; require 'auth.php'; require_login();
$stmt = $pdo->query("SELECT * FROM customers WHERE salary > 20000 ORDER BY salary DESC");
$rows = $stmt->fetchAll();
require 'header.php'; ?>
<h2>Customers with salary greater than 20,000</h2>
<?php if (!$rows): ?><p>No customers found.</p><?php else: ?>
<div class="table-wrap"><table><tr><th>ID</th><th>Name</th><th>City</th><th>Salary</th></tr>
<?php foreach ($rows as $r): ?><tr><td><?= e($r['customer_id']) ?></td><td><?= e($r['first_name'].' '.$r['last_name']) ?></td><td><?= e($r['city']) ?></td><td><?= number_format($r['salary'],2) ?></td></tr><?php endforeach; ?>
</table></div><?php endif; ?>
<?php require 'footer.php'; ?>
