<?php

	include "koneksi.php";
	$delete = $_POST['name'];
	$query = mysql_query("DELETE FROM foto WHERE foto='$delete'");
	if($query){
		echo "<meta http-equiv='refresh' content='0; url=profil.php'>";
	} else {
		echo "string";
	}

?>