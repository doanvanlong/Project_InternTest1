<?php 

$d->reset();
$sql="select ten$lang as ten, mota$lang as mota, photo,thoigian from #_slider where hienthi=1 and type='y-kien-khach-hang' order by id limit 0,8";
$d->query($sql);
$ykien = $d->result_array();

 ?>
 <div class="w_dichvu mb-30">
	 <div class="container">
	 	 <div class="tieude_gc"><span><?=_ykienkhachhang?></span></div>
	 	 <div class="sl_ykien">
	 	<?php foreach($ykien as $v){ ?>
			<div class="item_ykien">
				<div class="img_ykien">
					<img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" />
				</div>
				<div class="nd_ykien">
					<i class="fa fa-quote-left"></i>
					&nbsp; <?=$v['mota']?> &nbsp;
					<i class="fa fa-quote-right"></i>
				</div>
				<div class="tenkhach_ykien">
					<span> <b><?=$v['ten']?></b> </span> - <span><?=getThang(date('m',$v['thoigian']))?> <?=date('d, Y',$v['thoigian']);?></span>
				</div>
			</div>
	 	<?php } ?>
	 	</div>
	 </div>
 </div>
	
