<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
header("Location: login.php");
exit;
} 

include "db-connect.php";

$sql= "SELECT * FROM bookings";
$result= mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>SABINC CONSULT | Bookings</title>
<link rel="stylesheet" href="css/sabinc.css">
</head>

<body>
<header>
<img src="images/logo.png.png" alt="SABINC CONSULT LOGO">
<h1>SABINC CONSULT</h1>
<p>Engineering Excellence &bull; Cost Control &bull; Project Certainty.</p>
</header>

<main>
<div class="table-card">
<h2>All Consultation Bookings</h2>
<a href="logout.php" class="logout-btn">Log Out</a>

<table border="1">
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Date</td>
<th>Type</th>
<th>Services</th>
<th>Status</th>
<th>Details</th>
</tr>

<?php
while ($row= mysqli_fetch_assoc($result)){

echo "<tr>";
echo "<td>" . $row["fullname"] . "</td>";
echo "<td>" . $row["email"] . "</td>";
echo "<td>" . $row["tel"] . "</td>";
echo "<td>" . $row["consultation_date"] . "</td>";
echo "<td>" . $row["consultationtype"] . "</td>";
echo "<td>" . $row["services"] . "</td>";
echo "<td>" . $row["status"] . "</td>";
echo "<td>" . $row["project_details"] .  "</td>";
echo "</tr>";
}

?>
</table>
</div>
</main>

<footer>
<p class="foot">Cantonment, Accra, Ghana | 027 632 0020 | sbconsult45@outlook.com</p>
<p class="foot">&copy; 2026 SABINC CONSULT. ALL rights reserved.</p>
</footer>
</body>
</html>