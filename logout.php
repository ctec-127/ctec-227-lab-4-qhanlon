<?php
session_start();
session_destroy();
echo json_encode(['status' => 'success']);
header ('location: gallery.php');