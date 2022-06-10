 <?php 
	
	if(!isset($_SESSION['loginw'])){
		redirect("/dang-nhap.html");
	}
	 
	if(isset($_POST) && $_POST['password']){
			$d->reset();
			$sql = "select * from #_user where id = ".$_SESSION['loginw']['id_tv'];
			$d->query($sql);
			$user1 = $d->fetch_array();
			if ( $user1['password'] != md5(addslashes($_POST['oldpassword'])))
			{
				transfer(_matkhaucukhongdung, "doi-mat-khau.html");
			}else 
			{
			
			$data['password'] = md5(addslashes($_POST['password']));

			$d->setTable('user');
			$d->setWhere('id',$_SESSION['loginw']['id_tv']);
		
			if($d->update($data))
				transfer(_capnhatthanhcong, "doi-mat-khau.html");
			else
				transfer(_dangkythatbai, "doi-mat-khau.html");
			}
	}

