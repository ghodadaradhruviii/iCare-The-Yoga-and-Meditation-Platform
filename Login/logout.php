<?php
// Start the session
session_start();

// Unset all of the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the home page or login page
header("Location: ../Home/index.html"); // Corrected syntax
exit();
?>
