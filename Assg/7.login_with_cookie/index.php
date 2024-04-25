<!-- First, we're going to create a database that contains our data.

Open phpMyAdmin.
Click databases, create a database and name it as "cookie".
After creating a database, click the SQL and paste the below code. See image below for detailed instruction.

CREATE TABLE `user` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `password` VARCHAR(30) NOT NULL,
  `fullname` VARCHAR(60) NOT NULL,
PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; -->

<!-- INSERT INTO `user` (`username`, `password`, `fullname`) VALUES
('vinay', 'pass123', 'Vinay Kumare'); -->

<?php
	session_start();
	include('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Using Cookie with Logout</title>
</head>
<body>
	<h2>Login Form</h2>
	<form method="POST" action="login.php">
	<label>Username:</label> <input type="text" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>" name="username">
	<label>Password:</label> <input type="password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" name="password"><br><br>
	<input type="checkbox" name="remember" <?php if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ echo "checked";}?>> Remember me <br><br>
	<input type="submit" value="Login" name="login">
	</form>
	
	<span>
	<?php
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
		unset($_SESSION['message']);
	?>
</span>
</body>
</html>