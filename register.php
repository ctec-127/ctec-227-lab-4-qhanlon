<?php
$pageTitle = "Register";
require 'inc/header.inc.php';
require_once 'inc/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $db->real_escape_string($_POST['email']);
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));

    $sql = "INSERT INTO user (email,first_name,last_name,password) VALUES ('$email','$first_name','$last_name','$password')";

    // If you need to debug the SQL
    // echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        echo "<div>There was a problem with registering your account.</div>";
    } else {
        echo "<div>You are now ready to make your own gallery!</div>";
        echo '<a href="login.php" title="Login Page">Login</a>';
    }
}
?>

<!-- Format with CSS instead of <br> -->
<h1>Register</h1>
<form action="register.php" method="POST">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <input type="password" name="password" id="password" required>
    <br><br>
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" required>
    <br><br>
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" required>
    <br><br>
    <input type="submit" value="Register">
</form>

<script src="js/script.js"></script>

<?php require 'inc/footer.inc.php'; ?>