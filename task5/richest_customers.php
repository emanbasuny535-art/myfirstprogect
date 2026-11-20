<?php
require 'db.php'; require 'auth.php'; require_login();
$cities=$pdo->query("SELECT DISTINCT city FROM customers ORDER BY city")->fetchAll(PDO::FETCH_COLUMN);
$rows=[]; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $city=trim($_POST['city']??'');
 if(!in_array($city,$cities,true)) $error='Choose a valid city.';
 else { $s=$pdo->prepare("SELECT customer_id,first_name,last_name,city,salary FROM customers WHERE city=? ORDER BY salary DESC LIMIT 3"); $s->execute([$city]); $rows=$s->fetchAll(); }
}
require 'header.php'; ?>
<h2>Top 3 Richest Customers in a City</h2><div class="panel"><form method="post"><label>City</label><select name="city" required><option value="">Choose a city</option><?php foreach($cities as $c): ?><option value="<?=e($c)?>"><?=e($c)?></option><?php endforeach; ?></select><button>Show Top 3</button></form>
<?php if($error): ?><p class="error"><?=e($error)?></p><?php endif; ?>
<?php if($rows): ?><div class="table-wrap"><table><tr><th>Rank</th><th>Name</th><th>City</th><th>Salary</th></tr><?php foreach($rows as $i=>$r): ?><tr><td><?=$i+1?></td><td><?=e($r['first_name'].' '.$r['last_name'])?></td><td><?=e($r['city'])?></td><td><?=number_format($r['salary'],2)?></td></tr><?php endforeach; ?></table></div><?php endif; ?></div>
<?php require 'footer.php'; ?>
