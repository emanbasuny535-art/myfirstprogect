<?php
require_once 'db.php';
require_once 'auth.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $pass = $_POST['password'] ?? '';
    if (!$id || strlen($pass) < 1 || strlen($pass) > 100) {
        $error = 'Enter a valid customer ID and password.';
    } else {
        $stmt = $pdo->prepare("SELECT customer_id, first_name, last_name, password FROM customers WHERE customer_id = ?");
        $stmt->execute([$id]);
        $customer = $stmt->fetch();
        if ($customer && $customer['password'] && password_verify($pass, $customer['password'])) {
            session_regenerate_id(true);
            $_SESSION['customer_id'] = $customer['customer_id'];
            $_SESSION['customer_name'] = $customer['first_name'] . ' ' . $customer['last_name'];
            header('Location: index.php'); exit;
        }
        $error = 'Incorrect ID or password. Run setup_passwords.php once after importing the database.';
    }
}
require 'header.php';
?>
<div class="panel narrow">
<h2>Login</h2>
<p class="muted">Demo login: customer ID <b>1</b>, password <b>123456</b>.</p>
<?php if ($error): ?><p class="error"><?= e($error) ?></p><?php endif; ?>
<form method="post">
<label>Customer ID</label><input type="number" name="customer_id" min="1" required>
<label>Password</label><input type="password" name="password" maxlength="100" required>
<button>Login</button>
</form>
</div>
<?php require 'footer.php'; ?>
