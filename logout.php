<?php
// Start the session
session_start();

session_unset();
session_destroy();

// Redirect the user back to index.php (or any other page you want after logout)
header("Location: index.php");
exit();
?>
