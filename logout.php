<?php
session_start();

// Unset the user's session
unset($_SESSION['user']);

// Redirect to the login page
header('Location: login.php');
exit;
