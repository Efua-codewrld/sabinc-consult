<form action="registration.php" method="Post">
<label for="fullname">Full Name:</label>
<input type="text" id="fullname" name="fullname" required><br>

<label for="email">Email: </label>
<inpput type="email" id="email" name="email" required><br>

<label for="password">Password</label>
<input type="password" id="password" name="password" required><br>

<button type="submit">Register</button>
</form>

<?php

include "db-connect.php";

$email=$_POST["email"];
$password=password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql="SELECT * FROM clients WHERE email = ?";
$stmt=mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$result= myqsli_stmt_get_result($stmt)
$client= mysqli_fetch_assoc($result)

if (mysqli_stmt_execute($stmt)) {
echo "Registration Successful! <a href='client-login.php'>Log in</a>
} else {
echo "Error: ". mysqli_stmt_error($stmt);
}
?>