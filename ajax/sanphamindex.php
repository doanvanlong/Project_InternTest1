<?php
	include ("ajax_config.php");
$order=$_GET['order'];
$tranghientai=isset($_GET['vitri'])?$_GET['vitri']:1;

getSanPhamIndex($order,$tranghientai);

?>