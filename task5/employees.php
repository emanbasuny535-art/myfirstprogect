<?php
require 'db.php'; require 'auth.php'; require_login();
$sql="SELECT e.employee_name, COALESCE(m.employee_name,'No manager') AS manager_name FROM employees e LEFT JOIN employees m ON e.manager_id=m.employee_id ORDER BY e.employee_name";
$rows=$pdo->query($sql)->fetchAll();
require 'header.php'; ?>
<h2>Employees and Their Managers (Self Join)</h2><div class="table-wrap"><table><tr><th>Employee</th><th>Manager</th></tr>
<?php foreach($rows as $r): ?><tr><td><?=e($r['employee_name'])?></td><td><?=e($r['manager_name'])?></td></tr><?php endforeach; ?></table></div>
<?php require 'footer.php'; ?>
