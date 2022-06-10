 <?php 
	
	if(!isset($_SESSION['loginw'])){
		redirect("/dang-nhap.html");
	}
	$d->reset();
	$sql = "select * from #_user where id = ".$_SESSION['loginw']['id_tv'];
	$d->query($sql);
	$user1 = $d->fetch_array(); 
	if(isset($_POST) && $_POST['email']){
			$reguser = addslashes($_POST['email']);
			$sql_reguser = "select * from #_user where email='$reguser'";
			$d->query($sql_reguser);
			$check =$d->fetch_array();
			if ( count($check) > 0 && $check['id'] != $_SESSION['loginw']['id_tv'])
			{
				transfer(_emaildadangky, "trang-ca-nhan.html");
			}else 
			{
			$data['email'] = $reguser;
			$data['ten'] = $_POST['ten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['diachi'] = $_POST['diachi'];

			$d->setTable('user');
			$d->setWhere('id',$_SESSION['loginw']['id_tv']);
		
			if($d->update($data)){
				$lastname = explode(' ',$_POST['ten']);
				$_SESSION['loginw']['lastname'] = array_pop($lastname);
				transfer(_capnhatthanhcong, "trang-ca-nhan.html");
			}else
				transfer(_dangkythatbai, "trang-ca-nhan.html");
			}
	}

