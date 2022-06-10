<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="SHORTCUT ICON" href="<?=_upload_hinhanh_l.$company['faviconthumb']?>" type="image/x-icon" />
<meta name="robots" content="noodp,index,follow" />
<meta name="author" content="<?=$company['ten']?>" />
<meta name="copyright" content="<?=$company['ten']?> [<?=$company['email']?>]" />
<!--Meta seo web-->
<title><?php if($title!='')echo $title;else echo $company['title'];?></title>
<link rel="canonical" href="<?=getCurrentPageURL()?>" />
<meta name="keywords" content="<?php if($keywords!='')echo $keywords;else echo $company['keywords'];?>" />
<meta name="description" content="<?php if($description!='')echo $description;else echo $company['description'];?>" />
<!--Meta seo web-->

<!--Meta Geo-->
<meta name="DC.title" content="<?php if($title!='')echo $title;else echo $company['title'];?>" />
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="<?=$company['diachi']?>" />
<meta name="geo.position" content="<?=str_replace(',',':',$company['toado'])?>" />
<meta name="ICBM" content="<?=$company['toado']?>" />
<meta name="DC.identifier" content="http://<?=$config_url?>/" />
<!--Meta Geo-->
<!--Meta facebook-->

<?php 
  $d->reset();
  $sql = "select photo from #_slider where type='slider' limit 0,1";
  $d->query($sql);
  $slider_desktop = $d->fetch_array();

 ?>
<meta property="og:image" content="<?php if($images_facebook!=''){echo $images_facebook;}else{echo 'http://'.$config_url.'/'._upload_hinhanh_l.$slider_desktop['photo'];}?>" />
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">
<meta property="og:title" content="<?php if($title_facebook!=''){echo $title_facebook;}else{echo $company['title'];}?>" />
<meta property="og:url" content="<?=getCurrentPageURL();?>" />
<meta property="og:site_name" content="http://<?=$config_url?>/" />
<meta property="og:description" content="<?php if($description_facebook!=''){echo $description_facebook;}else{echo $company['description'];}?>" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="<?=$company['ten']?>" /> 
<link rel="canonical" href="<?=getCurrentPageURL()?>" />
<!--Meta facebook-->
<?php if($source!='index') { ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51d3c996345f1d03" async="async" defer="defer"></script>
<!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-550a87e8683b580f" async="async"></script>-->
<?php } ?>

 <?=$company['analytics']?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async=true;
  js.src = "//connect.facebook.net/<?php if($lang=='en')echo 'en_EN';else echo 'vi_VN' ?>/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Meta facebook-->
