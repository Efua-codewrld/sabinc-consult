<?php
include "db-connect.php";
session_start();

$username=$_POST["username"];
$password=$_POST["password"];

$sql="SELECT * FROM admins WHERE username = ?";
$stmt= mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$admin = mysqli_fetch_assoc($result);

if ($admin && password_verify ($password, $admin["password"])) {
$_SESSION["loggedin"] = true;
header("Location: admin-bookings.php");
exit;
} else {
echo "Incorrect username or password. <a href='login.php'> Try again</a>";
};
?>