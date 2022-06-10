<?php 
//echo $_SESSION['login']['username'];
	$title_tcat = _dangnhap;
	$title_bar .=_dangnhap;
	
	if($_SESSION['loginw']['thanhvien']!=''){
		redirect("index.html");
	}
	
if(!empty($_POST)&& isset($_POST['username'])){
	
	global $d, $login_name;
	
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);
	
	$sql = "select * from #_user where email='".$username."'";
	
	$d->query($sql);
	if($d->num_rows() == 1){
		$row = $d->fetch_array();
		
		if($row['active']!=1){
			transfer(_taikhoanchuakichhoat, "dang-nhap.html");
		} else { 
			if(($row['password'] == md5($password))){
			  $sql_lanxem = "UPDATE #_user SET lastlogin='".time()."' WHERE email ='".$username."'";
				$d->query($sql_lanxem);

				$_SESSION[$login_name] = true;
				$_SESSION['loginw']['thanhvien'] = $username;
				$_SESSION['loginw']['ten'] = $row['ten'];
				$lastname = explode(' ',$row['ten']);
				$_SESSION['loginw']['lastname'] = array_pop($lastname);
				$_SESSION['loginw']['diachi'] = $row['diachi'];
				$_SESSION['loginw']['email'] = $row['email'];
				$_SESSION['loginw']['dienthoai'] = $row['dienthoai'];
				$_SESSION['loginw']['id_tv'] = $row['id'];
			
				
				transfer(_dangnhapthanhcong,"trang-ca-nhan.html");
			}else{
				transfer(_matkhaukhongdung, "dang-nhap.html");
			}
			
		}
	}
	transfer(_tendangnhapkhongtontai, "dang-nhap.html");
	}
	
	 
?>