<?php
require 'db.php'; require 'auth.php'; require_login();
$cities=$pdo->query("SELECT DISTINCT city FROM customers ORDER BY city")->fetchAll(PDO::FETCH_COLUMN);
$rows=[]; $selected='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $selected=trim($_POST['city']??'');
 if(in_array($selected,$cities,true)){
  $s=$pdo->prepare("SELECT customer_id,first_name,last_name,email,salary FROM customers WHERE city=? ORDER BY first_name,last_name"); $s->execute([$selected]); $rows=$s->fetchAll();
 }
}
require 'header.php'; ?>
<h2>Customers by City</h2><div class="panel"><form method="post"><label>Select City</label><select name="city" required><option value="">Choose a city</option><?php foreach($cities as $city): ?><option value="<?=e($city)?>" <?= $selected===$city?'selected':'' ?>><?=e($city)?></option><?php endforeach; ?></select><button>Show Customers</button></form>
<?php if($selected): ?><div class="table-wrap"><table><tr><th>ID</th><th>Name</th><th>Email</th><th>Salary</th></tr><?php foreach($rows as $r): ?><tr><td><?=e($r['customer_id'])?></td><td><?=e($r['first_name'].' '.$r['last_name'])?></td><td><?=e($r['email'])?></td><td><?=number_format($r['salary'],2)?></td></tr><?php endforeach; ?></table></div><?php endif; ?></div>
<?php require 'footer.php'; ?>
