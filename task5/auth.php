<?php
if (session_status() === PHP_SESSION_NONE) session_start();
function require_login() {
    if (empty($_SESSION['customer_id'])) {
        header("Location: login.php");
        exit;
    }
}
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
