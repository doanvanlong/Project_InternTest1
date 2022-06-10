<?php 
	$d->reset();
	$sql = "select ten$lang as ten,id,tenkhongdau,photo,mota$lang as mota,ngaytao from #_news where hienthi=1 and noibat=1 and type='cong-trinh' order by stt,id desc limit 0,8";
	$d->query($sql); 
	$ar_congtrinh=$d->result_array();


?>
<div class="w_dichvu" id="cong-trinh">
	<div class="container">
		<div class="tieude_gc">
			<span><?=_congtrinh?></span> 
		</div>
		<div class="sl_congtrinh">
			<?php  for($i=0,$count  = count($ar_congtrinh); $i< $count; $i++){  ?>
				<div class="pn-15">
					<div class="item item_congtrinh">
						<a href="cong-trinh/<?=$ar_congtrinh[$i]['tenkhongdau']?>.html" title="<?=$ar_congtrinh[$i]['ten']?>"></a>
			            <div class="item_img phong_to vien_trong">
			            		<img src="thumb/585x300x1x90/<?=_upload_tintuc_l.$ar_congtrinh[$i]['photo']?>" alt="<?=$ar_congtrinh[$i]['ten']?>"  onError="this.src='http://placehold.it/585x300';" />
			            </div>
			            <h2 class="item_name"><?=$ar_congtrinh[$i]['ten']?></h2>
			          	<div class="item_info">
			          		<div><b><?=_ngayhoanthanh?></b>: <span><?=date('d-m-Y',$ar_congtrinh[$i]['ngaytao'])?></span></div>
			          	</div>
			        </div><!---END .item-->
				</div>
			<?php } ?>
		</div>
	</div>
</div>
