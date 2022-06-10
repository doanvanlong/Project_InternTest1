<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');
		
	include_once _lib."config.php";
	include_once _lib."support.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."library.php";
	include_once _lib."pclzip.php";
	include_once _lib."class.database.php";	
	
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$login_name = 'DEVEL';
	if($_REQUEST['author']){
		header('Content-Type: text/html; charset=utf-8');
		echo '<pre>';
		print_r($config['author']);
		echo '</pre>';
		die();
	}
	
	$d = new database($config['database']);
	$archive = new PclZip($file);
	#Thông tin 
	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();
	switch($com){
		####Phân quyền
		case 'phanquyen':
			$source = "phanquyen";
			break;
		
		case 'com':
			$source = "com";
			break;
			
		case 'group':
			$source = "group";
			break;
		####Thường có
		case 'pupop':
			$source = "pupop";
			break;
		case 'anhnen':
			$source = "anhnen";
			break;
		case 'background':
			$source = "background";
			break;
			
		case 'vnexpress':
			$source = "vnexpress";
			break;
				
		####Đơn hàng	
		case 'order':
			$source = "donhang";
			break;
			
		case 'chitietdonhang':
			$source = "chitietdonhang";
			break;
			
		case 'hinhthucgiaohang':
			$source = "hinhthucgiaohang";
			break;
			
		case 'hinhthucgiaohang':
			$source = "hinhthucgiaohang";
			break;
			
		case 'import':
			$source = "import";
			break;
			
		case 'export':
			$source = "export";
			break;
			
		case 'thanhpho':
			$source = "thanhpho";
			break;
		####Đơn hàng	
			
		case 'letruot':
			$source = "letruot";
			break;
			
		case 'slider':
			$source = "slider";
			break;
			
		case 'newsletter':
			$source = "newsletter";
			break;
			
		case 'lkweb':
			$source = "lkweb";
			break;
			
		case 'video':
			$source = "video";
			break;
			
		case 'photo':
			$source = "photo";
			break;
			
		case 'about':
			$source = "about";
			break;

			
		case 'news':
			$source = "news";
			break;
			
			
		case 'product':
			$source = "product";
			break;
			
		case 'yahoo':
			$source = "yahoo";
			break;
			
		####Luôn tồn tại
		case 'uploadfile':
			$source = "uploadfile";
			break;
			
		case 'multi':
			$source = "multi";
			break;
			
		case 'multi_upload':
			$source = "multi_upload";
			break;
			
		case 'creatsitemap':
			$source = "creatsitemap";
			break;
			
		case 'banner':
			$source = "banner";
			break;
		case 'baiviet':
			$source = "baiviet";
			break;	
		case 'hinhanh':
			$source = "hinhanh";
			break;
			
		case 'company':
			$source = "company";
			break;
		case 'place':
			$source = "place";
			break;		
		case 'footer':
			$source = "footer";
			break;
		case 'com':
			$source = "com";
			break;	
		case 'lienhe':
			$source = "lienhe";
			break;
			
		case 'user':
			$source = "user";
			break;
			
		case 'meta':
			$source = "meta";
			break; 
		case 'contact':
			$source = "contact";
			break;	
		####Giá trị mạc định	
		default: 
			$source = ""; 
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		redirect("index.php?com=user&act=login");
	}
		
	if(phanquyen($_SESSION['login']['com'],$_SESSION['login']['nhom'],$_GET['com'],$_GET['act'],$_GET['type'])){
		transfer("Bạn Không có quyền vào đây. Vui lòng liên hệ admin. Cảm ơn!",$_SERVER['HTTP_REFERER']);
	}
	if($source!="") include _source.$source.".php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator - Hệ thống quản trị nội dung</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/chosen.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/external.js"></script>
<script src="js/jquery.price_format.2.0.js" type="text/javascript"></script>
<script src="ckeditor/ckeditor.js"></script>
<link href="js/plugins/multiupload/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="js/plugins/multiupload/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

<!-- MultiUpload -->
<script type="text/javascript" src="js/plugins/multiupload/jquery.filer.min.js"></script>
<script src="js/jquery.minicolors.js"></script>
<link rel="stylesheet" href="css/jquery.minicolors.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!--Chọn mã màu-->
<script type="text/javascript" src="media/scripts/jquery.ps-color-picker.min.js"></script>  
<script type="text/javascript">      
  $(document).ready(function(){
	 $(".cp3").CanvasColorPicker();
		$(".sub li").each(function(){
			if($(this).hasClass("<?=$_REQUEST["com"].'_'.$_REQUEST["act"].'_'.$_REQUEST["type"]?>")){
				$(this).addClass("this");
			}
		})
		$.fn.exists = function(){return this.length>0;}
		$(".categories_li").each(function(){
			if($(this).find("ul").find("li").exists()==false){
				$(this).hide();
			}
		})
		
  });
</script>
<!--Chọn mã màu-->
<script>var base_url = 'http://<?=$config_url?>';  </script>
<!--Chọn mã màu-->
<link href="js/plugins/colorpick/colpick.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/plugins/colorpick/colpick.js"></script>
</head>
<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?> 
<body>

<span class="vui"></span>
<script type="text/javascript">
function text_count_changed(textfield_id,counter_id,number){
var v = $(textfield_id).val();
if(v==''){
		$(counter_id).val(number);return false;
	}
	if(parseInt(v.length) > number){
		$(textfield_id).css('border', '1px solid #D90000');
		$(textfield_id).css('background', '#e5e5e5');
		$(counter_id).val(number-parseInt(v.length));

	}else{
		$(textfield_id).css('border', '1px solid #DDDDDD');
		$(textfield_id).css('background', '#FFF');
		$(counter_id).val(number-parseInt(v.length));
	}
} 

$(document).ready(function(){
	if($('#description').length){
		text_count_changed("#description","#des_char",160);
		$('#description').blur(function(event) {
				text_count_changed($(this),"#des_char",160);
		});
		$('#description').keypress(function(event) {
			text_count_changed($(this),"#des_char",160);
		});
	}

	if($('#mota').length){
		text_count_changed("#mota","#des_char2",300);
		$('#mota').blur(function(event) {
				text_count_changed($(this),"#des_char2",300);
		});
		$('#mota').keypress(function(event) {
			text_count_changed($(this),"#des_char2",300);
		});
	}

	if($('#title').length){
		text_count_changed("#title","#des_char_tt",70);
		$('#title').blur(function(event) {
				text_count_changed($(this),"#des_char_tt",70);
		});
		$('#title').keypress(function(event) {
			text_count_changed($(this),"#des_char_tt",70);
		});
	}
});

function stt(x)
{
	var a=$(x).val();
	
	$.ajax({
			type: "POST",
			url: "ajax/ajax_hienthi.php",
			data:{
				id: $(x).attr("data-val0"),
				bang: $(x).attr("data-val2"),
				type: $(x).attr("data-val3"),
				value:a
			}
		});
		$('.vui').show();
}
$(function(){
	$('.hien_menu').toggle(function(){
		$(this).parent().children('.menu_header').slideDown(300);
		
	},function(){
		$(this).parent().children('.menu_header').slideUp(300);
	});
	$('.menu_header').prev('.hien_menu').find('.numberTop').html($('.menu_header > li').length);	
	
	var num = $('#menu').children(this).length;
	for (var index=0; index<=num; index++)
	{
		var id = $('#menu').children().eq(index).attr('id');
		$('#'+id+' strong').html($('#'+id+' .sub').children(this).length);
		$('#'+id+' .sub li:last-child').addClass('last');
	}
	$('#menu .activemenu .sub').css('display', 'block');
	$('#menu .activemenu a').removeClass('inactive');
	$('.conso').priceFormat({
		limit: 13,
		prefix: '',
		centsLimit: 0
	});
	
	$('.color').each( function() {
	$(this).minicolors({
		control: $(this).attr('data-control') || 'hue',
		defaultValue: $(this).attr('data-defaultValue') || '',
		format: $(this).attr('data-format') || 'hex',
		keywords: $(this).attr('data-keywords') || '',
		inline: $(this).attr('data-inline') === 'true',
		letterCase: $(this).attr('data-letterCase') || 'lowercase',
		opacity: $(this).attr('data-opacity'),
		position: $(this).attr('data-position') || 'bottom left',
		change: function(value, opacity) {
			if( !value ) return;
			if( opacity ) value += ', ' + opacity;
			if( typeof console === 'object' ) {
				console.log(value);
			}
		},
		theme: 'bootstrap'
	});
});

})
</script>

	<div id="leftSide">
	<?php include _template."menu_tpl.php";?>
    </div>
    <!-- Right side -->
        <div id="rightSide">
            <!-- Top fixed navigation -->
            <div class="topNav">
                <?php include _template."header_tpl.php";?>
            </div>
    <div class="titleArea"><div class="wrapper"></div></div>
    <div class="wrapper">
    <?php include _template.$template."_tpl.php";?>
    </div></div>
        <div class="clear"></div>
    </body>
<?php }else {?>
    <body class="nobg loginPage" style="overflow:hidden;">   
    <?php include _template.$template."_tpl.php";?>
    <!-- Footer line -->
     <div id="footer" class="none">
        <div class="wrapper">Powered by <a href="" title=""></a></div>
    </div>

    </body>
<?php } ?>


<script>
$(document).ready(function() {
	$('.ck_editor').parent('.formRight').css({width:'100%','margin-top':'30px','float':'none'});
	$('.ck_editor').each(function(index, el) {
		var id=$(this).attr('id');
		CKEDITOR.replace( id, {
		height : 400,
		entities: false,
        basicEntities: false,
        entities_greek: false,
        entities_latin: false,
		skin:'office2013',
		filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		allowedContent:
			'h1 h2 h3 p blockquote strong em;' +
			'a[!href];' +
			'img(left,right)[!src,alt,width,height];' +
			'table tr th td caption;' +
			'span{!font-family};' +
			'span{!color};' +
			'span(!marker);' +
			'del ins'
		});

	});
});
	
</script>
<script type="text/javascript">
	$(document).ready(function(e) {
		
        $("a.diamondToggle").click(function(){
			if($(this).attr("rel")==0){
				$.ajax({
					type: "POST",
					url: "ajax/ajax_hienthi.php",
					data:{
						id: $(this).attr("data-val0"),
						bang: $(this).attr("data-val2"),
						type: $(this).attr("data-val3"),
						value:1
					}
				});
				$(this).addClass("diamondToggleOff");
				$(this).attr("rel",1);
				
			}else{
				
				$.ajax({
					type: "POST",
					url: "ajax/ajax_hienthi.php",
					data:{
						id: $(this).attr("data-val0"),
						bang: $(this).attr("data-val2"),
						type: $(this).attr("data-val3"),
						value:0
						}
				});
				$(this).removeClass("diamondToggleOff");
						$(this).attr("rel",0);
			}

		});
    });
</script>
<script>
	$(document).ready(function(e) {
		var web = '<?='http://'.$config_url.'/' ?>';
		var com = '';
		var duoi = '';
		var type = '<?=$_GET['type']?>';
		var act = '<?=$_GET['act']?>';
		switch(type){
			case "san-pham":
				com = 'san-pham';
				duoi ='.html';
				break;
			case "tin-tuc":
				com = 'tin-tuc';
				duoi ='.html';
				break;
			case "du-an":
				com = 'du-an';
				duoi ='.html';
				break;
				case "tuyen-dung":
				com = 'tuyen-dung';
				duoi ='.html';
				break;
			case "ho-tro-khach-hang":
				com = 'ho-tro-khach-hang';
				duoi ='.html';
				break;
			default :
				com = '';
		}
		switch(act){
			case "add_danhmuc":
			case "edit_danhmuc":
				duoi ='';
				break;
			case "add_list":
			case "edit_list":
				duoi ='/';
				break;
		}
		$('#url_start').html(web+com+'/');
		$('#url_end').html(duoi);
	});
		
	function taoSEO(){
		var ten = $('#ten').val();
		var mota = $("#mota").val();
		var des =ten+' '+mota;
		if(ten != '' && mota != ''){
			$('#tenbaiviet').html(ten);
			$("input[name='title']").val(ten);
			$("input[name='keywords']").val(ten);
			description=des.substr(0,159);
			$("textarea[name='description']").val(description);
			text_count_changed('#description',"#des_char",160);
			changeUrl(ten);
		}else{
			alert("Bạn cần nhập tên và mô tả trước");
		}
	}
	function changeUrl(ten){
		$.ajax({
				type: "POST",
				url: "ajax/xuly_admin_dn.php",
				data: {
					ten:ten,
					act: 'changeUrl',
				},
				success:function(data){
					$("#url_middle").html(data);
					$("input[name='link_url']").val(data);
					$("input[name='link_url']").attr('placeholder',data);
				}
			})
	}
	function fixUrl(){ 
		var ten = $('#ten').val();
		var ten_input = $("input[name='link_url']").val();
		if(ten_input == ''){ changeUrl(ten); }
		if(ten != ''){
			$('#url_middle').css('display','none');
			$('#fixUrl').css('display','none');
			$('#okUrl').css('display','inline-block');
			$('#url_middle_input').css('display','inline-block');
		}else{
			alert("Bạn cần nhập tên bài viết trước");
		}
	}

	function okUrl(){
		var newurl = $("input[name='link_url']").val();
		$('#url_middle').html(newurl);
		$('#url_middle').css('display','inline-block');
		$('#url_middle_input').css('display','none');
		$('#okUrl').css('display','none');
		$('#fixUrl').css('display','inline-block');
	}
</script>
</html> 
