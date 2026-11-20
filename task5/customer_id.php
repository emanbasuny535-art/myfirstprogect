<?php
require 'db.php'; require 'auth.php'; require_login();
$row=null; $error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $id=filter_input(INPUT_POST,'customer_id',FILTER_VALIDATE_INT);
 if (!$id || $id<1) $error='Customer ID must be a positive number.';
 else { $s=$pdo->prepare("SELECT customer_id, first_name, last_name, email, phone, city, salary FROM customers WHERE customer_id=?"); $s->execute([$id]); $row=$s->fetch(); }
}
require 'header.php'; ?>
<h2>Find Customer by ID</h2><div class="panel"><form method="post"><label>Customer ID</label><input type="number" name="customer_id" min="1" required><button>Search</button></form>
<?php if($error): ?><p class="error"><?=e($error)?></p><?php endif; ?>
<?php if($row): ?><h3>Customer Information</h3><div class="details"><?php foreach($row as $k=>$v): ?><p><b><?=e(ucwords(str_replace('_',' ',$k)))?>:</b> <?=e($v)?></p><?php endforeach; ?></div><?php elseif($_SERVER['REQUEST_METHOD']==='POST' && !$error): ?><p>No customer with this ID.</p><?php endif; ?></div>
<?php require 'footer.php'; ?>
