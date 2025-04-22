<?php
$dsn = 'mysql:host=localhost;dbname=employee';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    include 'view/error.php';
    exit();
}
?>

