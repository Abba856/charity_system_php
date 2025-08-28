<?php 
session_start();

// Remove all session variables
session_unset(); 

// Destroy the session 
session_destroy(); 

// Redirect to login page with a message
header('location: index.php?message=logged_out');
exit();
?>