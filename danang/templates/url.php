<?php 
	$web = 'http://'.$config_url.'/';
	$com = '';
	$duoi = '';
	$type = $_GET['type'];
	$act = $_GET['act'];
	switch($type){
		case "san-pham":
			$com = 'san-pham';
			$duoi ='.html';
			break;
		case "tin-tuc":
			$com = 'tin-tuc';
			$duoi ='.html';
			break;
		case "du-an":
			$com = 'du-an';
			$duoi ='.html';
			break;
		case "ho-tro-khach-hang":
			$com = 'ho-tro-khach-hang';
			$duoi ='.html';
			break;
		default :
			$com = '';
	}
	switch($act){
		case "man_danhmuc":
		case "add_danhmuc":
		case "edit_danhmuc":
			$duoi ='';
			break;
		case "man_list":
		case "add_list":
		case "edit_list":
			$duoi ='/';
			break;
		case "man_cat":
		case "add_cat":
		case "edit_cat":
			$duoi ='.htm';
			break;
	}
 ?>
