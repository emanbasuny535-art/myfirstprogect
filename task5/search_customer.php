<?php
require 'db.php'; require 'auth.php'; require_login();
$rows=[]; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $name=trim($_POST['name']??'');
 if($name==='' || mb_strlen($name)>60) $error='Enter a name (maximum 60 characters).';
 else { $s=$pdo->prepare("SELECT customer_id,first_name,last_name,email,city,salary FROM customers WHERE first_name LIKE ? OR last_name LIKE ? ORDER BY first_name"); $like="%$name%"; $s->execute([$like,$like]); $rows=$s->fetchAll(); }
}
require 'header.php'; ?>
<h2>Search Customers by Name</h2><div class="panel"><form method="post"><label>Customer Name</label><input type="text" name="name" maxlength="60" required><button>Search</button></form>
<?php if($error): ?><p class="error"><?=e($error)?></p><?php endif; ?>
<?php if($rows): ?><div class="table-wrap"><table><tr><th>ID</th><th>Name</th><th>Email</th><th>City</th><th>Salary</th></tr><?php foreach($rows as $r): ?><tr><td><?=e($r['customer_id'])?></td><td><?=e($r['first_name'].' '.$r['last_name'])?></td><td><?=e($r['email'])?></td><td><?=e($r['city'])?></td><td><?=number_format($r['salary'],2)?></td></tr><?php endforeach; ?></table></div><?php elseif($_SERVER['REQUEST_METHOD']==='POST' && !$error): ?><p>No matching customers.</p><?php endif; ?></div>
<?php require 'footer.php'; ?>
