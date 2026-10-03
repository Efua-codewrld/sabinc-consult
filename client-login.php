<?php
include "db-connect.php";
session_start();

$email=$_POST["email"];
$password=$_POST["password"];

$sql="SELECT * FROM  clients WHERE email= ?";
$stmt=mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$client=mysqli_fetch_assoc($result);

if ($client && password_verify ($password, $client["password"])) {
$SESSION["client_loggedin"] = true;
$SESSION["client_id"]=$client["id"];
header("Location: client-dashboard.php");
exit;
} else{
echo "Incorrect email or password"
}



?>