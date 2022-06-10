<?php  
if(!defined('_source')) die("Error");
		$title_tcat = _dangkythanhvien;
		$title_bar .= _dangkythanhvien;
		
		if($_SESSION['loginw']['thanhvien']!=''){
			redirect("index.html");
		}

		$vl =  $_SESSION['login']['id_tv'];
		

		if(isset($_POST) && $_POST['email']){
		
			$reguser = addslashes($_POST['email']);
			$sql_reguser = "select * from #_user where email='$reguser'";
			$d->query($sql_reguser);
			if ($d->num_rows() > 0)
			{
				transfer(_emaildadangky, "dang-ky.html");
			}
			else 
			{
	
			$data['password'] = md5(addslashes($_POST['password']));
			$arTen = explode('@',$reguser);
			$data['username'] = $arTen[0].time();
			$data['email'] = $reguser;
			$data['ten'] = $_POST['ten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['active'] = "0";
			$data['ngaytao'] = time();

			$d->setTable('user');
		
			if($d->insert($data)){
				$d->reset();
				$sql_lanxem = "UPDATE #_user SET lastlogin='".time()."' WHERE email ='".$reguser."'";
				$d->query($sql_lanxem);

				transfer(_dangkythanhcong, "dang-nhap.html");
			}else
				transfer(_dangkythatbai, "dang-ky.html");
			}
    }
?>