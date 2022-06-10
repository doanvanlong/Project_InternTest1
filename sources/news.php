<?php  if(!defined('_source')) die("Error");

	@$id_danhmuc =   trim(strip_tags(addslashes($_GET['id_danhmuc'])));
	@$id_list =   trim(strip_tags(addslashes($_GET['id_list'])));
	@$id_cat =   trim(strip_tags(addslashes($_GET['id_cat'])));
	@$id =   trim(strip_tags(addslashes($_GET['id'])));	

	
	if($com=='tag')
	{
		$d->reset();
		$sql = "select id_pro from #_protag where id_tag='".$id_cat."'";
		$d->query($sql);
		$tag_detail = $d->result_array();

		$d->reset();
		$sql = "select ten from #_tags where id='".$id_cat."'";
		$d->query($sql);
		$name_tag = $d->fetch_array();

		$title_cat = $name_tag['ten'];	
		$title = $name_tag['ten'];
		$com = 'tin-tuc';
		
		$where = " type='".$type."' and id IN (select id_pro from #_protag where id_tag='".$id_cat."') order by stt,id desc";
	}
	#Chi tiết tin tức
	elseif($id!='')
	{

		//Cập nhật lượt xem
		$sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1  WHERE tenkhongdau ='$id'";
		$d->query($sql_lanxem);
		
		#Chi tiết tin tức
		$sql = "select *,ten$lang as ten,id,mota$lang as mota,noidung$lang as noidung from #_news where tenkhongdau='".$id."' and  type= '$type' and ngaytao <=".time()."  limit 0,1";
		$d->query($sql);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$tintuc_detail = $d->fetch_array();

		if($tintuc_detail['id_danhmuc'] > 0){
		//lấy thông tin danh mục cấp 1
		$d->reset();
		$sql = "select id,ten$lang as ten,tenkhongdau from #_news_danhmuc where hienthi=1 and id=".$tintuc_detail['id_danhmuc']." limit 0,1";
		$d->query($sql);
		$danhmuc = $d->fetch_array();

		$breadcumbs[]=array($com.'/'.$danhmuc['tenkhongdau'],$danhmuc['ten']);
		}
		//lấy thông tin danh mục cấp 2
		if($tintuc_detail['id_list'] > 0){
			$d->reset();
			$sql = "select id,ten$lang as ten,tenkhongdau from #_news_list where hienthi=1 and id=".$tintuc_detail['id_list']." limit 0,1";
			$d->query($sql);
			$n_list = $d->fetch_array();
			$breadcumbs[]=array($com.'/'.$n_list['tenkhongdau'].'/',$n_list['ten']);
		}

		$breadcumbs[]= array('',$tintuc_detail['ten']);
		
		#Thông tin seo web
		$title_cat = $tintuc_detail['ten'];		
		$title = $tintuc_detail['title'];
		$keywords = $tintuc_detail['keywords'];
		$description = $tintuc_detail['description'];
		
		#Thông tin share facebook
		$images_facebook = "http://".$config_url.'/'._upload_tintuc_l.$tintuc_detail['photo'];
		$title_facebook = $tintuc_detail['ten'];
		$description_facebook = trim(strip_tags($tintuc_detail['mota']));
		$url_facebook = getCurrentPageURL();
		
		#Các hình khác của dự án
		$sql_hinhkhac = "select id,ten,thumb,photo from #_hinhanh where type='".$type."' and hienthi=1 and id_hinhanh=".$tintuc_detail['id']." order by stt,id desc";
		$d->query($sql_hinhkhac);
		$hinhkhac = $d->result_array();
		
		
		#Các tin cũ hơn		
		$where = " type='".$type."' and hienthi=1 and id<>'".$tintuc_detail['id']."' and ngaytao <=".time()." order by  stt,id desc";		
	}
	#Danh mục tin tức
	elseif($id_danhmuc!='')
	{		
		$sql = "select id,ten$lang as ten,title,keywords,description from #_news_danhmuc where hienthi=1 and tenkhongdau='$id_danhmuc' limit 0,1";
		$d->query($sql);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$title_new = $d->fetch_array();

		$breadcumbs[]=array($com.'/'.$title_new['tenkhongdau'],$title_new['ten']);
		
		#Thông tin seo web
		$title_cat = $title_new['ten'];		
		$title = $title_new['title'];
		$keywords = $title_new['keywords'];
		$description = $title_new['description'];
		
		#Điều kiện lấy danh mục
		$where = " type='".$type."' and id_danhmuc=".$title_new['id']." and hienthi=1 and ngaytao <=".time()."  order by  stt,id desc";	
		
	}
	elseif($id_list!='')
	{		
		$sql = "select id,ten$lang as ten,title,keywords,description,id_danhmuc from #_news_list where hienthi=1 and tenkhongdau='$id_list' limit 0,1";
		$d->query($sql);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$title_new = $d->fetch_array();

		//lấy thông tin danh mục cha
		$d->reset();
		$sql = "select id,ten$lang as ten,tenkhongdau from #_news_danhmuc where hienthi=1 and id=".$title_new['id_danhmuc']." limit 0,1";
		$d->query($sql);
		$danhmuc = $d->fetch_array();

		$breadcumbs[]=array($com.'/'.$danhmuc['tenkhongdau'],$danhmuc['ten']);
		$breadcumbs[]=array('',$title_new['ten']);

		
		#Thông tin seo web
		$title_cat = $title_new['ten'];		
		$title = $title_new['title'];
		$keywords = $title_new['keywords'];
		$description = $title_new['description'];
		
		#Điều kiện lấy danh mục
		$where = " type='".$type."' and id_list=".$title_new['id']." and hienthi=1 and ngaytao <=".time()."  order by  stt,id desc";	
		
	}
	elseif($id_cat!='')
	{		
		$sql = "select id,ten$lang as ten,title,keywords,description from #_news_cat where hienthi=1 and id='".$id_cat."' limit 0,1";
		$d->query($sql);
		$title_new = $d->fetch_array();
		
		#Thông tin seo web
		$title_cat = $title_new['ten'];		
		$title = $title_new['title'];
		$keywords = $title_new['keywords'];
		$description = $title_new['description'];
		
		#Điều kiện lấy danh mục
		$where = " type='".$type."' and id_cat=".$title_new['id']." and hienthi=1 and ngaytao <=".time()."  order by  stt,id desc";	
		
	}
	#Tất cả Tin tức có type là $type
	else{	
		$where = " type='".$type."' and hienthi=1 and ngaytao <=".time()."  order by  stt,id desc";	
	}
	
	#Lấy tin tức và phân trang
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_news where $where";
	$d->query($sql);	
	$dem = $d->fetch_array();
	
	$totalRows = $dem['numrows'];
	$page = $_GET['p'];
	if($id>0)
	{
		$pageSize = $company['soluong_tink'];//Số tin khác cho 1 trang
	}
	else
	{
		$pageSize = $company['soluong_tin'];//Số tin cho 1 trang
	}
	$offset = 5;//Số trang hiển thị				
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;		
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,mota$lang as mota,thumb,ngaytao,photo,id_danhmuc,daidien,dienthoai,fax,email,diachi,file_tl from #_news where $where limit $bg,$pageSize";		
	$d->query($sql);
	$tintuc = $d->result_array();	
	$url_link = getCurrentPageURL();
?>