<?php
include("navbar.php");


session_destroy(); 
session_regenerate_id(); 
session_unset(); 

header("location: index.php");
exit;
?>
