<?php 

	include ("ajax_config.php");

	switch ($act) {
		case 'gui-tin':
			guitin($_POST['dienthoai'],$_POST['noidung']);
			break;
		case 'goi-dien':
			goidien($_POST['dienthoai']);
			break;
		default:
			# code...
			break;
	}
	function guitin($dienthoai,$noidung){
			global $d,$lang,$config_url;
			$data['dienthoai'] = addslashes($dienthoai);
			$data['noidung'] = addslashes($noidung);
			$data['type']="gui-tin";
			$data['ten']="Khách";
			$data['ngaytao']=time();
			
			$d->reset();
			$d->setTable('contact');
			if($d->insert($data)){
				$chude = "Thông báo khách gửi tin nhắn từ website ".$config_url;
				$noidung ="
				<table>
					<tr>
						<th colspan='2'>&nbsp;</th>
					</tr>
					<tr>
						<th>Số điện thoại :</th><td>".$dienthoai."</td>
					</tr>
					<tr>
						<th>Tin nhắn :</th><td>".$noidung."</td>
					</tr>

					<tr>
						<th>Thời gian gửi :</th><td>".date('d-m-Y H:i:s',time())."</td>
					</tr>
				</table>";
				sendMailBox($chude,$noidung);
				echo "<p><i class='fa fa-check'></i></p>
				<h6>"._guithanhcong." </h6>
				<p>"._loicamon."</p>";
			}else{
				echo "<p><i class='fa fa-check text-danger'></i></p> <h6>"._hethongbiloi."</h6> <p>"._quykhachtimlaisau."</p>";
			}
	}

	function goidien($dienthoai){
			global $d,$lang,$config_url;
			$data['dienthoai'] = addslashes($dienthoai);
			$data['type']="goi-dien";
			$data['ten']="Khách";
			$data['ngaytao']=time();
			
			$d->reset();
			$d->setTable('contact');
			if($d->insert($data)){
				$chude = "Thông báo khách gửi yêu cầu gọi lại từ website ".$config_url;
				$noidung ="
				<table>
					<tr>
						<th colspan='2'>&nbsp;</th>
					</tr>
					<tr>
						<th>Số điện thoại :</th><td>".$dienthoai."</td>
					</tr>

					<tr>
						<th>Thời gian gửi :</th><td>".date('d-m-Y H:i:s',time())."</td>
					</tr>
				</table>";
				sendMailBox($chude,$noidung);
				echo "<p><i class='fa fa-check'></i></p>
				<h6>"._guithanhcong."</h6>
				<p>"._loicamon."</p>";
			}else{
				echo "<p><i class='fa fa-check text-danger'></i></p>
				 <h6>"._hethongbiloi."</h6> 
				 <p>"._quykhachtimlaisau."</p>";
			}
	}
		function sendMailBox($chude,$noidung){
		global $company,$ip_host,$mail_host,$pass_mail;
		include_once _source."phpMailer/class.phpmailer.php";	
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
		
		//Thiết lập email nhận hồi đáp nếu người nhận nhấn nút Reply
		//$mail->AddReplyTo($_POST['email_contact'],$_POST['ten_contact']);
		//Thiết lập tiêu đề email
		$mail->Subject    = $chude;
		$mail->IsHTML(true);
		$mail->CharSet = "utf-8";	
		$mail->Body = $noidung;	
		if($mail->Send()) {
			return true;
		}else {
			return false;
		}
	}