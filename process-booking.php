<?php
include "db-connect.php";

$fullname=$_POST["fullname"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$date = $_POST["date"];
$consultation=$_POST["consultationtype"];
$status=$_POST["status"];
$services=$_POST["servicesofinterest"];
$services = implode(", ", $services);
$projectdetails = $_POST["projectdetails"];

if (empty($fullname) || empty($email)) {
die("Please fill in all required fields")
}

if (!filter_var ($email FILTER_VALIDATE_EMAIL)) {
die("Please enter valid email address.")
}

if (empty($tel)) {
die("Please enter  a phone number")
}

$sql= "INSERT INTO bookings(fullname, email, tel, consultation_date, consultationtype, services, status, project_details)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssssss", $fullname, $email, $tel, $date, $consultation, $services, $status, $projectdetails);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_execute($stmt)) {
echo "Thank you, ". $fullname . "! Your consultation request has been saved.";
} else {
echo "Error: " . mysqli_stmt_error($stmt);
} 


?>