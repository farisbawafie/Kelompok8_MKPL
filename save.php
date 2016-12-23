<?php
	include "koneksi.php";
	$save = $_POST['nameSave'];
	$query = mysql_query("UPDATE foto SET judul='$save' WHERE foto='$save'");
	if($query){
		echo "<meta http-equiv='refresh' content='0; url=admin.php'>";
	} else {
		echo "string";
	}
?>