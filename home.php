<?php
session_start();
$pageTitle = 'Home';
require 'inc/header.inc.php';
?>


<a href="register.php">Register</a>
<a href="login.php" id="login">Login</a>
<a href="" id="logout">Logout</a>

<h1>Welcome to <?= isset($_SESSION['first_name']) ? 'your' : 'the'; ?> image gallery, <?= isset($_SESSION['first_name']) ? $_SESSION_['first_name'] : 'dearest guest'; ?>.</h1>
<div id="message"></div>

<script defer src="js/script.js"></script>

<?php require 'inc/footer.inc.php' ?>