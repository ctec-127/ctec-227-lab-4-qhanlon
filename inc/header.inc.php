<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>Files and Directories</title>
</head>
<header>
	<ul>
		<?php echo !isset($_SESSION['first_name']) ? "<li><a href=\"login.php\">Log in</a></li>" : '';?>
		<?php echo !isset($_SESSION['first_name']) ? "<li><a href=\"register.php\">Register</a></li>" : '';?>
		<?php echo isset($_SESSION['first_name']) ? "<li><a href=\"logout.php\">Log out</a></li>" : '';?>
		<!-- <li>
			<a href="login.php" id="login">Login</a>
			<a href="logout.php" id="logout">Logout</a>
		</li> -->
	</ul>
</header>

<body>