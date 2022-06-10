<?php  if(!defined('_source')) die("Error");

    $where = "type='".$type."' and hienthi=1 order by stt,id desc";
	#Lấy item và phân trang
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_slider where $where";
	$d->query($sql);
	$dem = $d->fetch_array();

	$totalRows = $dem['numrows'];
	$page = $_GET['p'];

	$pageSize = 20;//Số item cho 1 trang

	$offset = 5;//Số trang hiển thị
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;

	$d->reset();
	$sql = "select ten$lang as ten,mota$lang as mota,photo,link from #_slider where $where limit $bg,$pageSize";
	$d->query($sql);
	$ar_slider = $d->result_array();
	$url_link = getCurrentPageURL();
?> 