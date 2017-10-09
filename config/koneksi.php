<?php

$server = "localhost";
$user 	= "root";
$pass	= "";
$db		= "rental_mobil";

$connect = mysql_connect($server,$user,$pass);
$connect_db = mysql_select_db($db);

function autogenerate($field,$tabel,$digit,$kode){
	$data = mysql_fetch_array(mysql_query("SELECT MAX(RIGHT($field,$digit)) FROM $tabel"));
	$id = (int)$data[0]+1;
	$id_baru = $kode.sprintf('%0'.$digit.'s',$id);
	echo $id_baru;

}

?>