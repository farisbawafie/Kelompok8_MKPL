<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	mysql_connect("localhost","root","") or die("Failed");
	mysql_select_db("photo");
?>