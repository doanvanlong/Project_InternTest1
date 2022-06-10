<?php  if(!defined('_source')) die("Error");
	
	#Chi tiết bài viết
	$sql = "select ten$lang as ten,noidung$lang as noidung,title,keywords,description,photo from #_about where type='".$type."' and hienthi=1 limit 0,1";
	$d->query($sql);
	$tintuc_detail = $d->fetch_array();
	
	#Thông tin seo web
	//$title_cat = 'Giới thiệu';		
	$title = $tintuc_detail['title'];
	$keywords = $tintuc_detail['keywords'];
	$description = $tintuc_detail['description'];



	if(!empty($_POST['email_yeucau'])){
	 if(empty($_POST['ten_yeucau']) && trim($_POST['ten_yeucau']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }
      if(empty($_POST['email_yeucau']) && trim($_POST['email_yeucau']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }
      if(empty($_POST['dienthoai_yeucau']) && trim($_POST['dienthoai_yeucau']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }

         if(empty($_POST['sanpham_yeucau']) && trim($_POST['sanpham_yeucau']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }

         if(empty($_POST['loaisanpham_yeucau']) && trim($_POST['loaisanpham_yeucau']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }

         if(empty($_POST['soluong_yeucau']) && trim($_POST['soluong_yeucau']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }

        
      if(empty($_POST['noidung_yeucau']) && trim($_POST['noidung_yeucau']) == ''){
                transfer("Bạn chưa nhập đủ thông tin", getCurrentPageURL());
        }


       /* $duoi_file =end(explode('.',$_FILES['img_yeucau']['name']));
	    if(!in_array($duoi_file, array('png', 'jpg','jpeg','PNG','JPG','JPEG'))){
	    	transfer("File đính kèm phải có đuôi png,jpg,jpeg!", getCurrentPageURL());
	    }*/

	$data['ten'] = addslashes($_POST['ten_yeucau']);
	$data['email'] = addslashes($_POST['email_yeucau']);
	$data['dienthoai'] = addslashes($_POST['dienthoai_yeucau']);
	$data['sanpham'] = addslashes($_POST['sanpham_yeucau']).', '.addslashes($_POST['loaisanpham_yeucau']);
	$data['donvi'] = addslashes($_POST['soluong_yeucau']);
	$data['noidung'] = addslashes($_POST['noidung_yeucau']);
	$data['type']='theo-yeu-cau';
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
		if($company['email2'] !=''){
			$mail->AddAddress($company['email2'], $company['ten']);
		}
		
		$mail->AddAddress($_POST['email_yeucau'], $_POST['ten_yeucau']);
		
		//Thiết lập email nhận hồi đáp nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($_POST['email_yeucau'],$_POST['ten_yeucau']);

		//Thiết lập file đính kèm nếu có
		/*if(!empty($_FILES['img_yeucau']))
		{
			$mail->AddAttachment($_FILES['img_yeucau']['tmp_name'], $_FILES['img_yeucau']['name']);	
		}*/

	//Thiết lập tiêu đề email
		$mail->Subject    = "Thư Đặt hàng theo yêu cầu";
		$mail->IsHTML(true);
		
		//Thiết lập định dạng font chữ tiếng việt
		$mail->CharSet = "utf-8";	
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư Đặt hàng theo yêu cầu website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ và tên :</th><td>'.$_POST['ten_yeucau'].'</td>
				</tr>
				
				<tr>
					<th>Email :</th><td>'.$_POST['email_yeucau'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai_yeucau'].'</td>
				</tr>
				<tr>
					<th>Sản phẩm :</th><td>'.$_POST['sanpham_yeucau'].', '.$_POST['loaisanpham_yeucau'].'</td>
				</tr>
				<tr>
					<th>Số lượng :</th><td>'.$_POST['soluong_yeucau'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung_yeucau'].'</td>
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

