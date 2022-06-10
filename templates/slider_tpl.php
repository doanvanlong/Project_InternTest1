<?php 

	$d->reset();
	$sql="select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='doitac' order by stt,id desc";
	$d->query($sql);
	$ar_doitac=$d->result_array();
 ?>
<h2 class="tieude_page"><span>Đối tác</span></h2>
<div>
	<div class="row">
	<?php foreach($ar_doitac as $v){ ?>
	<div class="col-lg-3  col-sm-6 col-12 mb-30">
	    <div class="item item_s">
	    	<div class="s_img">
	    		<img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" />
	    	</div>
		    <div class="s_noidung">
		    	<h3><?= $v['ten']?></h3>
		    	<div class="d-flex"><span>website: </span> <a href="<?=$v['link']?>"><?=$v['link']?></a></div>
		    </div>
	    </div>
	</div>
	<?php }?>
	</div> 
</div>
<h2 class="tieude_page"><span><?=$title_cat?></span></h2>
<div class="min-height">
	<div class="row">
	<?php foreach($ar_slider as $v){ ?>
	<div class="col-lg-3  col-sm-6 col-12 mb-30">
	    <div class="item item_s">
	    	<div class="s_img">
	    		<img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" />
	    	</div>
		    <div class="s_noidung">
		    	<h3><?= $v['ten']?></h3>
		    	<div class="d-flex"><span>website: </span> <a href="<?=$v['link']?>"><?=$v['link']?></a></div>
		    </div>
	    </div>
	</div>
	<?php }?>
	</div> 
	<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div>
