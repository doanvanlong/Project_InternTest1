<?php  if(!defined('_source')) die("Error");

if(!empty($_POST['email_baogia'])){
	$data['ten'] = addslashes($_POST['ten_baogia']);
	$data['email'] = addslashes($_POST['email_baogia']);
	$data['dienthoai'] = addslashes($_POST['dienthoai_baogia']);
	$data['sanpham'] = addslashes($_POST['sanpham_baogia']);
	$data['ghichu'] = $_POST['thanhtoan_baogia'];
	$thanhtoan = ($_POST['thanhtoan_baogia']==0)?'Trả thẳng':'Trả góp';
	$data['type']='yeu-cau-bao-gia';
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
		$mail->SMTPSecure   = 'ssl';  
		$mail->Port   = 465;

		//Thiết lập thông tin người gửi và email người gửi
		$mail->SetFrom($mail_host,$company['ten']);

		//Thiết lập thông tin người nhận và email người nhận
		//$mail->AddAddress($company['email'], $company['ten']);
		$mail->AddAddress($company['email'], $company['ten']);
		$mail->AddAddress($_POST['email_baogia'], $_POST['ten_baogia']);
		
		//Thiết lập email nhận hồi đáp nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($_POST['email_baogia'],$_POST['ten_baogia']);
	//Thiết lập tiêu đề email
		$mail->Subject    = "Thư yêu cầu báo giá";
		$mail->IsHTML(true);
		
		//Thiết lập định dạng font chữ tiếng việt
		$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư yêu cầu báo giá xe từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten_baogia'].'</td>
				</tr>
				
				<tr>
					<th>Email :</th><td>'.$_POST['email_baogia'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai_baogia'].'</td>
				</tr>
				<tr>
					<th>Tên xe :</th><td>'.$_POST['sanpham_baogia'].'</td>
				</tr>
				<tr>
					<th>Hình thức thanh toán :</th><td>'.$thanhtoan.'</td>
				</tr>
				';
			$body .= '</table>';
			
			$mail->Body = $body;
			if($mail->Send())
				transfer("Gửi email yêu cầu báo giá xe thành công.", "/index.html");
			else
				transfer("Hệ thống bị lỗi, xin quý khách vui lòng thử lại sau.", "/index.html");
	}
}else{
	transfer("Bạn chưa nhập thông tin yêu cầu báo giá", "/index.html");
}