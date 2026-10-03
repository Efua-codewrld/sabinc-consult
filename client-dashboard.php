<?php
session_start();

if (!isset($_SESSION["client_loggedin") || $_SESSION["client_loggedin"] !== true) {
header("Location: client-login.php");
exit;
}
include "db-connect.php";

$sql = "SELECT * FROM projects WHERE client_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $client_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<h1>Your Projects</h1>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<p><?php echo $row["project_name"]; ?> — Status: <?php echo $row["status"]; ?></p>
<?php } 

?>