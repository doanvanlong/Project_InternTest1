<?php  if(!defined('_source')) die("Error");
	
	/*$where = " type='san-pham' and hienthi=1 and noibat=1 order by stt,id desc";
	
	#Lấy sản phẩm và phân trang
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_product where $where";
	$d->query($sql);	
	$dem = $d->fetch_array();
	
	$totalRows = $dem['numrows'];
	$page = $_GET['p'];
	$pageSize = 8;//Số item cho 1 trang
	$offset = 5;//Số trang hiển thị				
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;		
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giakm from #_product where $where limit $bg,$pageSize";		
	$d->query($sql);
	$sp_noibat = $d->result_array();	
	$url_link = 'index.html';*/
	
	if(!empty($_POST['email_nhantin']))
	{		
		$ar = explode('@',$_POST['email_nhantin']);
		$tenkhach = $ar[0];
		$data['ten'] = addslashes($tenkhach);
		$data['email'] = addslashes($_POST['email_nhantin']);
		$data['type']='nhantin';
		$data['ngaytao']=time();
		
		
		
			/*$email_nhantin = trim(strip_tags($email_nhantin));
			$email_nhantin = mysql_real_escape_string($email_nhantin);		*/
			
		//kiểm tra email
			$d->reset();
			$sql="select * from #_contact where email like '".$data['email']."' and type='nhantin'";
			$d->query($sql);
			if($d->num_rows()>0){
				transfer(_emaildadangky, getCurrentPageURL());
			}
			
			$d->reset();
			$d->setTable('contact');
			if($d->insert($data)){
			include_once "phpMailer/class.phpmailer.php";	
			$mail = new PHPMailer();
			$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
			$mail->Host       = $ip_host;   // tên SMTP server
			$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
			$mail->Username   = $mail_host; // SMTP account username
			$mail->Password   = $pass_mail;  
			/*$mail->SMTPSecure   = 'ssl';  
			$mail->Port   = 465;*/
	
			//Thiết lập thông tin người gửi và email người gửi
			$mail->SetFrom($mail_host,$company['ten']);
	
			//Thiết lập thông tin người nhận và email người nhận
			$mail->AddAddress($company['email'], $company['ten']);
			$mail->AddAddress($_POST['email_nhantin'], $tenkhach);
			
			//Thiết lập email nhận hồi đáp nếu người nhận nhấn nút Reply
			$mail->AddReplyTo($_POST['email_nhantin'],$tenkhach);
	
			//Thiết lập file đính kèm nếu có
			if(!empty($_FILES['file']))
			{
				$mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);	
			}
			
			//Thiết lập tiêu đề email
			$mail->Subject    = "Thư đăng ký thành viên";
			$mail->IsHTML(true);
			
			//Thiết lập định dạng font chữ tiếng việt
			$mail->CharSet = "utf-8";	
				$body = '<table>';
				$body .= '
					<tr>
						<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
						<th colspan="2">Thư đăng ký thành viên từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
					</tr>
					<tr>
						<th colspan="2">&nbsp;</th>
					</tr>
					<tr>
						<th>Email :</th><td>'.$tenkhach.'</td>
					</tr>
					<tr>
						<th>Email :</th><td>'.$_POST['email_nhantin'].'</td>
					</tr>
					';
				$body .= '</table>';
				
				$mail->Body = $body;
				if($mail->Send())
					transfer(_guithuthanhcong, getCurrentPageURL());
				else
					transfer(_guithuthatbai, getCurrentPageURL());	
			}else{
				transfer(_guithuthatbai, getCurrentPageURL());	
			}			
	}

?>