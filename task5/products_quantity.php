<?php
require 'db.php'; require 'auth.php'; require_login();
$rows=[]; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $n=filter_input(INPUT_POST,'quantity',FILTER_VALIDATE_INT);
 if($n===false || $n===null || $n<100 || $n>5000) $error='Enter a whole number from 100 to 5000.';
 else { $s=$pdo->prepare("SELECT p.product_name,SUM(oi.quantity) AS total_quantity FROM products p JOIN order_items oi ON oi.product_id=p.product_id GROUP BY p.product_id,p.product_name HAVING SUM(oi.quantity)>? ORDER BY total_quantity DESC"); $s->execute([$n]); $rows=$s->fetchAll(); }
}
require 'header.php'; ?>
<h2>Products with Total Quantity Greater Than a Number</h2><div class="panel"><form method="post"><label>Quantity (100–5000)</label><input type="number" name="quantity" min="100" max="5000" required><button>Search</button></form>
<?php if($error): ?><p class="error"><?=e($error)?></p><?php endif; ?>
<?php if($rows): ?><div class="table-wrap"><table><tr><th>Product</th><th>Total Quantity Sold</th></tr><?php foreach($rows as $r): ?><tr><td><?=e($r['product_name'])?></td><td><?=e($r['total_quantity'])?></td></tr><?php endforeach; ?></table></div><?php elseif($_SERVER['REQUEST_METHOD']==='POST' && !$error): ?><p>No products matched.</p><?php endif; ?></div>
<?php require 'footer.php'; ?>
