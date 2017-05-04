<?php

	$server = "localhost";
	$username = "root";
	$pass = "";

	$dbhandle = mysql_connect($server, $username, $pass) or die("Couldn't connect");
	$db = mysql_select_db("zailet", $dbhandle) or die("couldn't connect to database");
?>