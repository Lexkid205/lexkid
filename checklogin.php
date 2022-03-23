<?php
	if(isset($_SESSION['user_id'])){}else{
		header('location: login.php?report=Your+session+has+expired&&c=1 ');
	}
?>