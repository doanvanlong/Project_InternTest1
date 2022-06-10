<?php  if(!defined('_source')) die("Error");

	@$id_danhmuc =  trim(strip_tags(addslashes($_GET['id_danhmuc'])));
	@$id_list =   trim(strip_tags(addslashes($_GET['id_list'])));
	@$id_cat =   trim(strip_tags(addslashes($_GET['id_cat'])));
	@$id_item =   trim(strip_tags(addslashes($_GET['id_item'])));
	@$id =   trim(strip_tags(addslashes($_GET['id'])));	

	
	if($com=='thuong-hieu'){
		$sql = "select id,ten$lang as ten,title,keywords,description,logo from #_product_danhmuc where tenkhongdau='$id_danhmuc' and type='thuonghieu' limit 0,1";
		$d->query($sql);
		$title_bar = $d->fetch_array();
					
		$title_cat = $title_bar['ten'];
		$title = $title_bar['title'];
		$keywords = $title_bar['keywords'];
		$description = $title_bar['description'];
		
		$where = " type='".$type."' and id_thuonghieu=".$title_bar['id']." and hienthi=1 order by stt,id desc";
		$com='san-pham';
	}
	//Tag sản phẩm
	elseif($com=='tags')
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
		$title_bar = $name_tag['ten'];
		
		$where = " type='".$type."' and id IN (select id_pro from #_protag where id_tag='".$id_cat."') order by stt asc,ngaytao desc";
	}
	//Chi tiết sản phẩm
	else if($id!='')
	{
		//Cập nhật lượt xem
		$sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE tenkhongdau ='$id'";
		$d->query($sql_lanxem);  
		
		//Chi tiết sản phẩm
		$sql_detail = "select *,ten$lang as ten,mota$lang as mota,noidung$lang as noidung,chitiet$lang as chitiet from #_product where hienthi=1 and tenkhongdau='$id' and  type= '$type'  limit 0,1";
		$d->query($sql_detail);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$row_detail = $d->fetch_array();
		
		if($row_detail['id_danhmuc'] > 0){
			$sql = "select id,ten$lang as ten,tenkhongdau,logo from #_product_danhmuc where id='".$row_detail['id_danhmuc']."' limit 0,1";
			$d->query($sql);
			$danhmucchinh = $d->fetch_array();	

			$breadcumbs[]=array($com.'/'.$danhmucchinh['tenkhongdau'],$danhmucchinh['ten']);
		}

		if($row_detail['id_list'] > 0){
			$sql = "select id,ten$lang as ten,tenkhongdau from #_product_list where id='".$row_detail['id_list']."' limit 0,1";
			$d->query($sql);
			$danhmuccap2 = $d->fetch_array();

			$breadcumbs[]=array($com.'/'.$danhmuccap2['tenkhongdau'].'/',$danhmuccap2['ten']);
		}
		
		$breadcumbs[]=array($com.'/'.$row_detail['tenkhongdau'].'.html',$row_detail['ten']);
		
		$title_cat = $row_detail['ten'];
		$title = $row_detail['title'];	
		$keywords = $row_detail['keywords'];
		$description = $row_detail['description'];
		
		#Thông tin share facebook
		$images_facebook = 'http://'.$config_url.'/'._upload_sanpham_l.$row_detail['photo'];
		$title_facebook = $row_detail['ten'];
		$description_facebook = trim(strip_tags($row_detail['mota']));
		$url_facebook = getCurrentPageURL();
		
		
		
		//Hình ảnh khác của sản phẩm
		$sql_hinhthem = "select id,ten,thumb,photo from #_hinhanh where id_hinhanh='".$row_detail['id']."' and type='".$type."' and hienthi=1 order by stt,id desc";
		$d->query($sql_hinhthem);
		$hinhthem = $d->result_array();
		
		$d->reset();
	    $sql_tags = "select id,ten from #_tags where  id IN (select id_tag from #_protag where id_pro='".$row_detail['id']."') and type='".$type."' order by id desc";
	    $d->query($sql_tags);
	    $tags_sp = $d->result_array();
		
		//Sản phẩm cùng loại
		$where = " type='".$type."' and id_danhmuc='".$row_detail['id_danhmuc']."'  and hienthi=1 and id<>'".$row_detail['id']."' order by stt,id desc";	
	}
	//Danh mục sản phẩm cấp 4
	elseif($id_item!='')
	{
		$sql = "select id,ten$lang as ten,title,keywords,description from #_product_item where tenkhongdau='$id_cat' limit 0,1";
		$d->query($sql);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$title_bar = $d->fetch_array();

		
		$title_cat = $title_bar['ten'];
		$title = $title_bar['title'];
		$keywords = $title_bar['keywords'];
		$description = $title_bar['description'];
	
		$where = " type='".$type."' and id_item='$id_item' and hienthi=1 order by stt,id desc";
	}
	//Danh mục sản phẩm cấp 3
	elseif($id_cat!='')
	{
		$sql = "select id,ten$lang as ten,mota$lang as mota,title,keywords,description,id_danhmuc,id_list,photo from #_product_cat where tenkhongdau='$id_cat' limit 0,1";
		$d->query($sql);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$title_bar = $d->fetch_array();
		
		if($title_bar['id_danhmuc'] > 0){
			$sql = "select id,ten$lang as ten,tenkhongdau,logo from #_product_danhmuc where id='".$title_bar['id_danhmuc']."' limit 0,1";
			$d->query($sql);
			$danhmucchinh = $d->fetch_array();	

			$breadcumbs[]=array($com.'/'.$danhmucchinh['tenkhongdau'],$danhmucchinh['ten']);
		}

		if($title_bar['id_list'] > 0){
			$sql = "select id,ten$lang as ten,tenkhongdau from #_product_list where id='".$title_bar['id_list']."' limit 0,1";
			$d->query($sql);
			$danhmuccap2 = $d->fetch_array();

			$breadcumbs[]=array($com.'/'.$danhmuccap2['tenkhongdau'].'/',$danhmuccap2['ten']);
		}

		$breadcumbs[]=array($com.'/'.$title_bar['tenkhongdau'].'.html',$title_bar['ten']);


		$title_cat = $title_bar['ten'];
		$title = $title_bar['title'];
		$keywords = $title_bar['keywords'];
		$description = $title_bar['description'];

		#Thông tin share facebook
		$images_facebook = 'http://'.$config_url.'/'._upload_sanpham_l.$title_bar['photo'];
		$title_facebook = $title_bar['ten'];
		$description_facebook = trim(strip_tags($title_bar['mota']));
		$url_facebook = getCurrentPageURL();
	
		$where = " type='".$type."' and id_cat=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}
	//Danh mục sản phẩm cấp 2
	elseif($id_list!='')
	{
		$sql = "select id,ten$lang as ten,tenkhongdau,title,keywords,description,id_danhmuc,mota$lang as mota,photo from #_product_list where tenkhongdau='$id_list' limit 0,1";
		$d->query($sql);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$title_bar = $d->fetch_array();
		
		if($title_bar['id_danhmuc'] > 0){
			$sql = "select id,ten$lang as ten,tenkhongdau,logo from #_product_danhmuc where id='".$title_bar['id_danhmuc']."' limit 0,1";
			$d->query($sql);
			$danhmuccap1 = $d->fetch_array();

			$breadcumbs[]=array($com.'/'.$danhmuccap1['tenkhongdau'],$danhmuccap1['ten']);	
		}
		$breadcumbs[]=array($com.'/'.$title_bar['tenkhongdau'].'/',$title_bar['ten']);

		$title_cat = $title_bar['ten'];
		$title = $title_bar['title'];
		$keywords = $title_bar['keywords'];
		$description = $title_bar['description'];

		#Thông tin share facebook
		if($title_bar['photo'] != ''){
			$images_facebook = 'http://'.$config_url.'/'._upload_sanpham_l.$title_bar['photo'];
		}
		
		$title_facebook = $title_bar['ten'];
		$description_facebook = trim(strip_tags($title_bar['mota']));
		$url_facebook = getCurrentPageURL();
	
		$where = " type='".$type."' and id_list=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}
	
	//Danh mục sản phẩm cấp 1
	else if($id_danhmuc!='')
	{
		$sql = "select id,ten$lang as ten,mota$lang as mota,photo,tenkhongdau,title,keywords,description from #_product_danhmuc where tenkhongdau='$id_danhmuc' limit 0,1";
		$d->query($sql);
		if($d->num_rows()==0){
			redirect('/404.php');
		}
		$title_bar = $d->fetch_array();

		$breadcumbs[]=array($com.'/'.$title_bar['tenkhongdau'],$title_bar['ten']);
					
		$title_cat = $title_bar['ten'];
		$title = $title_bar['title'];
		$keywords = $title_bar['keywords'];
		$description = $title_bar['description'];

		#Thông tin share facebook
		if($title_bar['photo'] != ''){
			$images_facebook = 'http://'.$config_url.'/'._upload_sanpham_l.$title_bar['photo'];
		}
		
		$title_facebook = $title_bar['ten'];
		$description_facebook = trim(strip_tags($title_bar['mota']));
		$url_facebook = getCurrentPageURL();
		
		$where = " type='".$type."' and id_danhmuc=".$title_bar['id']." and hienthi=1 order by stt,id desc";
	}
	//Tất cả sản phẩm
	else
	{	
		$where = " type='".$type."' and hienthi=1 order by stt,id desc";
		
	}
	
	#Lấy sản phẩm và phân trang
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_product where $where";
	$d->query($sql);	
	$dem = $d->fetch_array();
	
	$totalRows = $dem['numrows'];
	$page = $_GET['p'];
	if($id > 0)
	{
		$pageSize = $company['soluong_spk'];//Số item cho 1 trang
	}
	else
	{
		$pageSize = $totalRows;//$company['soluong_sp'];//Số item cho 1 trang
	}
	$offset = 5;//Số trang hiển thị				
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;		
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giakm from #_product where $where limit $bg,$pageSize";		
	$d->query($sql);
	$product = $d->result_array();	
	$url_link = getCurrentPageURL();
	
	
?>