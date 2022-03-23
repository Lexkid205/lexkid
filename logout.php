<?php
session_start(); 
session_destroy();
header('location: login.php?report=You+are+logged+out');
?>