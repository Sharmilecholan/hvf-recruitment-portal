<?php
session_start();
include 'db.php';

$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE role='$role' AND username='$username' AND password='$password'";
$res = $conn->query($sql);

if ($res->num_rows === 1) {
    $row = $res->fetch_assoc();
    $_SESSION['user'] = $row;
    $_SESSION['user_id'] = $row['id']; // ✅ Fix: properly set user_id from fetched row

    if ($role == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: candidate/dashboard.php");
    }
} else {
    $_SESSION['error'] = "Invalid login!";
    header("Location: index.php");
}
?>
