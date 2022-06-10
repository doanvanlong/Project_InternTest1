<?php
	error_reporting(0);
	session_start();
	$session=session_id();

	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './danang/lib/');
			
	include_once _lib."config.php";
	include_once _lib."AntiSQLInjection.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";	
	include_once _lib."class.database.php";
	include_once _lib."functions_user.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";	
	$login_name = 'ANGEL789';
	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
	$pid=$_REQUEST['productid']; 
		addtocart($pid,1); 
		redirect("gio-hang.html");}
?>
<!doctype html>
<html lang="vi" itemscope itemtype="http://schema.org/LocalBusiness">

<head prefix="og: http://ogp.me/ns#; dcterms: http://purl.org/dc/terms/#">
	<base href="http://<?=$config_url?>/"  />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php include _template."layout/seoweb.php";?>
	<?php include _template."layout/css.php";?>
</head>

<body ondragstart="return false;" ondrop="return false;" >

<div class="wap">
<h1 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h1>
	<?php include _template."layout/header.php";?>
   
    <?php if($_GET['com'] == 'index' || $_GET['com'] == ''){?>
    	<?php include _template."layout/slider_jssor.php";?>

		<?php include _template."layout/vechungtoi.php";?>
		<?php include _template.$template."_tpl.php"; ?>
	    	
		
		<?php //include _template."layout/gioithieu.php";?>
		<?php //include _template."layout/theoyeucauindex.php";?>
		

	<?php  }elseif($_GET['com'] == 'san-pham' || !isset($_GET['id'])){ ?>
		<?php if(isset($_GET['id'])){ ?>
			<div class="div_breadcrumb">
				<?php include _template."layout/breadcrumb.php"; ?>
			</div>
		<?php }else{ include _template."layout/banner.php"; } ?>

        <div class="container">
			<?php include _template.$template."_tpl.php"; ?>
    	</div>

	<?php  }else{ ?>

		<div class="div_breadcrumb">
			<?php include _template."layout/breadcrumb.php"; ?>
		</div>

      	<div class="container">
      		<div id="content_left">
				<?php include _template.$template."_tpl.php"; ?>
			</div>
			<div id="content_right">
				<?php include _template."layout/left.php"; ?>
    		</div>
    		<div class="clearfix"></div>
      	</div>
    <?php } ?>
	
    <?php include _template."layout/danhsachdoitac.php";?>
    <?php include _template."layout/footer2.php";?>
	<?php include _template."layout/js.php";?>
    <?=$company['codethem']?>
    <?php include _template."layout/menufooter.php";?>
</div>
<script>
	$(window).bind('scroll', function () {
		if ($(window).scrollTop() > 5) {
				$('#header').addClass('fixed');
		} else {
				$('#header').removeClass('fixed');
		}
	});
</script>
</body>
</html> 
