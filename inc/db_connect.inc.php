<?php
// Create a new connection to the database
$db = new mysqli('localhost', 'root', '', 'codemonkey');

// If there was an error connecting to the database, display it.
if ($db->connect_error) {
    $error = $db->connect_error;
    echo $error;
}

// Set the character encoding of the database connection to UTF-8 for maximum compatibility
$db->set_charset('utf8');