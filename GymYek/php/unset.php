<?php
	session_start();

	unset($_SESSION['username']);
	header("Location: /GymYek/login.php");
?>