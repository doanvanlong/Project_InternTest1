<?php

$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";
switch ($com) {
	case 'product':
		$config_s['danhmuc'] = false;
		$config_s['list'] = false;
		$config_s['logo'] = true;
		$config_s['hinhanh'] = true;
		$config_s['noibat'] = true;
		$config_s['moi'] = false;
		$config_s['banchay'] = false;
		$config_s['khuyenmai'] = false;
		$config_s['url'] = true;
		$config_s['luotxem'] = true;
		switch ($type) {
			case 'san-pham':
				$config_s['danhmuc'] = true;
				$config_s['list'] = true;
				$config_s['cat'] = false;
				switch ($act) {
					case 'add_danhmuc':
					case 'edit_danhmuc':
						$config_s['logo'] = false;
						$config_s['hinhanh'] = true;
						$config_s['size_logo'] = 'Chiều rộng:200px | Chiều cao:65px';
						$config_s['size_anh'] = 'Chiều rộng:600px | Chiều cao:400px';
						break;
					case 'add_list':
					case 'edit_list':
						$config_s['hinhanh'] = true;
						$config_s['size_anh'] = 'Chiều rộng:600px | Chiều cao:400px';
						break;
					case 'add_cat':
					case 'edit_cat':
						$config_s['hinhanh'] = true;
						$config_s['size_anh'] = 'Chiều rộng:600px | Chiều cao:400px';
						break;
					case 'man':
						$config_s['moi'] = false;
						$config_s['banchay'] = false;
						break;
					case 'add':
					case 'edit':
						$config_s['gia'] = true;
						$config_s['giakm'] = true;
						$config_s['hinhanh'] = true;
						$config_s['hinhthem'] = true;
						$config_s['moi'] = false;
						$config_s['banchay'] = false;
						$config_s['them'] = false;
						$config_s['chitiet'] = false;
						$config_s['size_anh'] = 'Chiều rộng:450px | Chiều cao:450px';
						break;
					default:
						break;
				}
				break;
		}
		break;

	case 'news':
		$config_s['hinhanh'] = true;
		$config_s['banner'] = false;
		$config_s['hinhthem'] = false;
		$config_s['tag'] = false;
		$config_s['diachi'] = false;
		$config_s['danhmuc'] = false;
		$config_s['list'] = false;
		$config_s['mota'] = true;
		$config_s['noidung'] = true;
		$config_s['seo'] = true;
		$config_s['text_ngaytao'] = "Ngày đăng";
		$config_s['ngaytao'] = true;
		$config_s['file'] = false;
		$config_s['daidien'] = false;
		$config_s['dienthoai'] = false;
		$config_s['fax'] = false;
		$config_s['email'] = false;
		$config_s['diachi'] = false;
		switch ($type) {
			case 'tin-tuc':
				$config_s['url'] = true;
				$config_s['luotxem'] = true;
				$config_s['danhmuc'] = false;
				switch ($act) {
					case 'add_danhmuc':
					case 'edit_danhmuc':
						$config_s['icon'] = false;
						$config_s['hinhanh'] = false;
						$config_s['size_icon'] = 'Chiều rộng:25px | Chiều cao25px';
						$config_s['size_anh'] = 'Chiều rộng:300px | Chiều cao:500px';
						break;
					case 'add_list':
					case 'edit_list':
						$config_s['hinhanh'] = false;
						$config_s['size_anh'] = 'Chiều rộng:200px | Chiều cao:200px';
						break;
					case 'man':
						break;
					case 'add':
					case 'edit':
						$config_s['hinhanh'] = true;
						$config_s['size_anh'] = 'Chiều rộng:600px | Chiều cao:400px';
						$config_s['size_banner'] = 'Chiều rộng:1200px | Chiều caoh:500px';
						break;
					default:
						break;
				}
				break;

			case 'album':
				$config_s['hinhthem'] = true;
				$config_s['noidung'] = false;
				$config_s['sanpham'] = true;
				$config_s['size_anh'] = 'Chiều rộng:1170px | Chiều cao:600px';
				break;

			case 'cong-trinh':
				$config_s['diachi'] = false;
				$config_s['hinhthem'] = true;
				$config_s['text_ngaytao'] = "Ngày hoàn thành";
				$config_s['size_anh'] = 'Chiều rộng:1170px | Chiều cao:600px';
				break;
			case 'tuyen-dung':
			case 'du-an':
			case 'dich-vu':
			case 'ho-tro-khach-hang':
				$config_s['url'] = true;
				$config_s['luotxem'] = true;
				$config_s['size_anh'] = 'Chiều rộng:600px | Chiều cao:400px';
				break;
			case 'hinh-thuc-thanh-toan':
				$config_s['hinhanh'] = false;
				$config_s['seo'] = false;
				$config_s['mota'] = false;
				$config_s['ngaytao'] = false;
				break;
		}
		break;
	case 'about':
		$config_s['info'] = true;
		$config_s['seo'] = true;
		$config_s['hinhanh'] = true;
		$config_s['size_anh'] = 'Chiều rộng: 505px | Chiều cao: 305px';
		$config_s['ten'] = false;
		$config_s['mota'] = false;
		$config_s['link'] = false;
		$config_s['noidung'] = true;
		switch ($type) {
			case 'text-khuyenmai':
			case 'text-gioi-thieu':
				$config_s['info'] = false;
				break;
			case 'lien-he':
			case 'gioi-thieu':
			case 'thanh-toan':
				$config_s['hinhanh'] = false;
				$config_s['info'] = true;
				$config_s['link'] = false;
				$config_s['ten'] = false;
				$config_s['mota'] = false;
				$config_s['size_anh'] = 'Chiều rộng: 1365px | Chiều cao: 782px';
				break;
			case 'text-footer':
				$config_s['ten'] = true;
				$config_s['info'] = false;
				break;
			case 'lien-he':
			case 'event':
				$config_s['hinhanh'] = false;
				break;
			case 'bang-gia':
			case 've-chung-toi':
			case 'dich-vu':
			case 'tin-tuc':
			case 'san-pham':
				$config_s['info'] = false;
				break;
			case 'text-nhantin':
				$config_s['info'] = false;
				$config_s['ten'] = true;
				break;
			case 'theo-yeu-cau-index':
				$config_s['ten'] = true;
				$config_s['seo'] = false;
				$config_s['size_anh'] = 'Chiều rộng <b>1920px</b> Chiều cao: <b>600px</b>';
				break;
			case 'theo-yeu-cau':
				$config_s['size_anh'] = 'Chiều rộng <b>600px</b> Chiều cao: <b>466px</b>';
				break;
		}
		break;
	case 'background':
		$config_s['type'] = false;
		$config_s['size_anh'] = 'Chiều rộng <b>245px</b> Chiều cao: <b>70px</b>';
		switch ($type) {
			case 'logo-desktop':
				$config_s['size_anh'] = 'Chiều rộng <b>240px</b> Chiều cao: <b>70px</b>';
				break;
			case 'logo-mobile':
				$config_s['size_anh'] = 'Chiều rộng <b>170px</b> Chiều cao: <b>40px</b>';
				break;
			case 'logo-footer':
				$config_s['size_anh'] = 'Chiều rộng <b>170px</b> Chiều cao: <b>70px</b>';
				break;
			case 'theo-yeu-cau':
			case 'thuc-don':
			case 'tuyen-dung':
			case 'gioi-thieu':
			case 'san-pham':
			case 'du-an':
			case 'cong-trinh':
			case 'tin-tuc':
			case 'lien-he':
			case 'ho-tro-khach-hang':
			case 'dich-vu':
			case 'giohang':
			case 'video':
			case 'thanh-toan':
				$config_s['size_anh'] = 'Chiều rộng <b>1920px</b> Chiều cao: <b>200px</b>';
				break;
			case 'bg-tin-tuc':
				$config_s['size_anh'] = 'Chiều rộng <b>1365px</b> Chiều cao: <b>650px</b>';
				break;
			case 'bg-footer':
				$config_s['size_anh'] = 'Chiều rộng <b>1365px</b> Chiều cao: <b>385px</b>';
				break;
			case 'bg-ytuong':
				$config_s['size_anh'] = 'Chiều rộng <b>688px</b> Chiều cao: <b>575px</b>';
				break;
		}
		break;
	case 'slider':
		$config_s['link'] = true;
		$config_s['thoigian'] = false;
		$config_s['ten'] = true;
		$config_s['mota'] = false;
		$config_s['size_anh'] = 'Chiều rộng <b>900px</b> Chiều cao: <b>520px</b>';
		switch ($type) {
			case 'slider':
				$config_s['size_anh'] = 'Chiều rộng <b>1920px</b> Chiều cao: <b>640px</b>';
				break;
			case 'xuong-sx':
			case 'hotline':
			case 'showroom':
				$config_s['mota'] = true;
				$config_s['link'] = false;
				break;
			case 'quang-cao':
				$config_s['size_anh'] = 'Chiều rộng <b>512px</b> Chiều cao: <b>340px</b>';
				break;
			case 've-chung-toi':
				$config_s['size_anh'] = 'Chiều rộng <b>24px | Chiều cao:24px</b>';
				$config_s['mota'] = true;
				$config_s['link'] = false;
				break;
			case 'lua-chon-chung-toi':
				$config_s['size_anh'] = 'Chiều rộng <b>24px | Chiều cao:24px</b>';
				$config_s['mota'] = true;
				$config_s['link'] = false;
				break;
			case 'y-kien-khach-hang':
				$config_s['link'] = false;
				$config_s['thoigian'] = true;
				$config_s['mota'] = true;
				$config_s['size_anh'] = 'Chiều rộng <b>250px</b> Chiều cao: <b>250px</b>';
				break;
			case 'social':
				$config_s['size_anh'] = 'Chiều rộng <b>30px</b> Chiều cao: <b>30px</b>';
				break;
			case 'doitac':
				$config_s['size_anh'] = 'Chiều rộng <b>150px</b> Chiều cao: <b>90px</b>';
				break;
			case 'album':
				$config_s['size_anh'] = 'Chiều rộng <b>600px</b> Chiều cao: <b>400px</b>';
				$config_s['link'] = false;
				break;
			case 'download':
				$config_s['link'] = true;
				$config_s['download'] = true;
				break;
			case 'tai-khoan-ngan-hang':
				$config_s['link'] = false;
				$config_s['mota'] = true;
				break;
			case 'info-head':
				$config_s['size_anh'] = 'Chiều rộng <b>100px</b> Chiều cao: <b>100px</b>';
				$config_s['link'] = false;
				$config_s['mota'] = true;
				break;
			case 'khach-hang':
				$config_s['size_anh'] = 'Chiều rộng <b>250px</b> Chiều cao: <b>170px</b>';
				$config_s['mota'] = true;
				break;
			case 'thuong-hieu':
				$config_s['link'] = false;
				$config_s['size_anh'] = 'Chiều rộng <b>79px</b> Chiều cao: <b>50px</b>';
				break;
		}
		break;
	case 'contact':
		$config_s['ten'] = true;
		$config_s['sanpham'] = false;
		$config_s['dienthoai'] = true;
		$config_s['email'] = true;
		$config_s['noidung'] = true;
		switch ($type) {
			case 'goi-dien':
				$config_s['noidung'] = false;
				$config_s['email'] = false;
				break;
			case 'gui-tin':
				$config_s['email'] = false;
				break;
			case 'nhantin':
				$config_s['dienthoai'] = false;
				$config_s['noidung'] = false;
				break;

			case 'theo-yeu-cau':
				$config_s['sanpham'] = true;
				$config_s['donvi'] = true;
				break;

			case 'lien-he':
				break;
		}
		break;
	default:
		# code...
		break;
}
