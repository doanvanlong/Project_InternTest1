<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql_contact = "select ten$lang as ten,noidung$lang as noidung from #_about where type='lien-he' limit 0,1";
	$d->query($sql_contact);
	$company_contact = $d->fetch_array();	

	$title_cat = _lienhe;	
	$title = $company_contact['title'];
	$keywords = $company_contact['keywords'];
	$description = $company_contact['description'];	
	
	
if(!empty($_POST['email_contact'])){
	 if(empty($_POST['ten_contact']) && trim($_POST['ten_contact']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }
      if(empty($_POST['email_contact']) && trim($_POST['email_contact']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }
      if(empty($_POST['dienthoai_contact']) && trim($_POST['dienthoai_contact']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }
      if(empty($_POST['noidung_contact']) && trim($_POST['noidung_contact']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }

	$data['ten'] = addslashes($_POST['ten_contact']);
	$data['email'] = addslashes($_POST['email_contact']);
	$data['dienthoai'] = addslashes($_POST['dienthoai_contact']);
	$data['noidung'] = addslashes($_POST['noidung_contact']);
	$data['type']='lien-he';
	$data['ngaytao']=time();
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
		//$mail->AddAddress($company['email'], $company['ten']);
		$mail->AddAddress($company['email'], $company['ten']);
		$mail->AddAddress($_POST['email_contact'], $_POST['ten_contact']);
		
		//Thiết lập email nhận hồi đáp nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($_POST['email_contact'],$_POST['ten_contact']);
	//Thiết lập tiêu đề email
		$mail->Subject    = "Thư liên hệ";
		$mail->IsHTML(true);
		
		//Thiết lập định dạng font chữ tiếng việt
		$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ và tên :</th><td>'.$_POST['ten_contact'].'</td>
				</tr>
				
				<tr>
					<th>Email :</th><td>'.$_POST['email_contact'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai_contact'].'</td>
				</tr>
				
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung_contact'].'</td>
				</tr>
				';
			$body .= '</table>';
			
			$mail->Body = $body;
			
			if($mail->Send()) 
				transfer(_guithuthanhcong, "index.html");
			else
				transfer(_guithuthatbai, "index.html");
		}
	

}
