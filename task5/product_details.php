<?php
require 'db.php'; require 'auth.php'; require_login();
$summary=null; $orders=[]; $buyers=[]; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $id=filter_input(INPUT_POST,'product_id',FILTER_VALIDATE_INT);
 if(!$id || $id<1) $error='Product ID must be a positive number.';
 else {
  $s=$pdo->prepare("SELECT p.product_id,p.product_name,COUNT(DISTINCT oi.order_id) AS times_sold,COALESCE(SUM(oi.quantity),0) AS units_sold FROM products p LEFT JOIN order_items oi ON oi.product_id=p.product_id WHERE p.product_id=? GROUP BY p.product_id,p.product_name");
  $s->execute([$id]); $summary=$s->fetch();
  if($summary){
   $s=$pdo->prepare("SELECT DISTINCT order_id FROM order_items WHERE product_id=? ORDER BY order_id"); $s->execute([$id]); $orders=$s->fetchAll(PDO::FETCH_COLUMN);
   $s=$pdo->prepare("SELECT DISTINCT c.customer_id,CONCAT(c.first_name,' ',c.last_name) AS customer_name,c.salary FROM customers c JOIN orders o ON o.customer_id=c.customer_id JOIN order_items oi ON oi.order_id=o.order_id WHERE oi.product_id=? ORDER BY c.salary DESC"); $s->execute([$id]); $buyers=$s->fetchAll();
  }
 }
}
require 'header.php'; ?>
<h2>Product Sales Details</h2><div class="panel"><form method="post"><label>Product ID</label><input type="number" name="product_id" min="1" required><button>Search</button></form>
<?php if($error): ?><p class="error"><?=e($error)?></p><?php endif; ?>
<?php if($summary): ?><h3><?=e($summary['product_name'])?></h3><p>Times sold (number of distinct orders): <b><?=e($summary['times_sold'])?></b></p><p>Total units sold: <b><?=e($summary['units_sold'])?></b></p><p>Order IDs: <?=e(implode(', ',$orders) ?: 'No orders')?></p><h3>Customers who bought this product (richest first)</h3><div class="table-wrap"><table><tr><th>Customer ID</th><th>Name</th><th>Salary</th></tr><?php foreach($buyers as $b): ?><tr><td><?=e($b['customer_id'])?></td><td><?=e($b['customer_name'])?></td><td><?=number_format($b['salary'],2)?></td></tr><?php endforeach; ?></table></div><?php elseif($_SERVER['REQUEST_METHOD']==='POST' && !$error): ?><p>Product not found.</p><?php endif; ?></div>
<?php require 'footer.php'; ?>
