<?php 
	$d->reset();
	$sql_tinmoi = "select id,ten$lang as ten,tenkhongdau,ngaytao,photo from #_news where type='".$type."' and hienthi=1 order by ngaytao desc limit 0,5";
	$d->query($sql_tinmoi);
	$tinmoi = $d->result_array();
?>
<div class="box_container">
	<div class="w_1000">
    <div class="wap_item" id="imagee">
		<?php foreach($hinhkhac as $v){ ?>
        	<div class="item_media">
            	<a href="<?=_upload_hinhthem_l.$v['photo']?>" rel="image"><img src="thumb/350x200x1x90/<?=_upload_hinhthem_l.$v['photo']?>" /></a>
            </div>
        <?php }?>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 col-noidung pull-left">
            <?=$tintuc_detail['noidung']?> 
            <div class="addthis_native_toolbox"></div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 col-lq pull-right">
        	<div class="info-item">
                <h4 class="info-title">Dự án:</h4>
                <h6> <?=$title_cat?> </h6>
            </div>
            <div class="info-item">
                <h4 class="info-title">Địa chỉ:</h4>
                <h6> <?=$tintuc_detail['diachi']?> </h6>
            </div>
        </div>
    </div>
	</div>
</div>

