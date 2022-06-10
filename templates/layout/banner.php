<?php 
$d->reset();
$sql = "select photo from #_background where type = '".$type."'";
$d->query($sql);
$banner = $d->fetch_array();
 ?>
 <div class="mybanner" style="background-image: url('<?=_upload_hinhanh_l.$banner['photo']?>');">
   <div>
   		<h2 class="tieude_page text-center mb-10"><span><?=$title_cat?></span></h2>
   		<div class="breadcumb2">
   			<?php for($i= 0 ; $i < count($breadcumbs)-1; $i++){ ?>
			<a href="<?= $breadcumbs[$i][0] ?>" title="<?= $breadcumbs[$i][1] ?>"><?= $breadcumbs[$i][1] ?> <i class="fa fa-angle-right"></i></a>
			<?php } ?>
			<span><?= $breadcumbs[count($breadcumbs)-1][1] ?></span>
   		</div>
   </div>

 </div>
 <div class="mb-30"></div>