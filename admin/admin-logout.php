<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Return JSON response
header("Location: index.php");
?>
