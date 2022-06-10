<?php 
$d->reset();
$sql="select ten$lang as ten,mota$lang as mota, tenkhongdau, icon from #_news_danhmuc where hienthi=1 and type='y-tuong-noi-that' and noibat=1  order by stt,id desc limit 0,5";
$d->query($sql);
$ar_ytuong = $d->result_array();

$d->reset();
$sql="select photo,ten$lang as ten from #_slider where hienthi=1 and type='slider-ytuong' order by stt,id desc";
$d->query($sql);
$sl_ytuong = $d->result_array();

 ?>
 <style>
 	#y-tuong::before{
 		background-image: url('<?=_upload_hinhanh_l.$bg_ytuong['photo']?>');
 	}
 </style>
<div class="w_dichvu" id="y-tuong">
	<div class="bg-xam">
		<div class="sl_ytuong">
			<?php foreach($sl_ytuong  as $img){ ?>
				<div class="sl_img_ytuong">
					<img src="thumb/688x575x1x90/<?=_upload_hinhanh_l.$img['photo']?>" alt="<?=$ar_ytuong[$i]['ten']?>" />
				</div>
			<?php } ?>
		</div>
		<div class="ytuong_noidung">
			<div class="container">
				<div class="tieude_ytuong"><b></b><span><?=_ytuongnoithat?></span><b></b></div>
			<?php for($i = 0,$i_max = count($ar_ytuong) ;$i< $i_max ; $i++){ ?>
				<div class="item_ytuong">
					<a href="y-tuong-noi-that/<?=$ar_ytuong[$i]['tenkhongdau']?>"></a>
					<div class="item_ytuong_img">
						<img src="<?=_upload_tintuc_l.$ar_ytuong[$i]['icon']?>" alt="<?=$ar_ytuong[$i]['ten']?>"  width="100" /> 
					</div>
					<div  class="item_ytuong_noidung">
						<h4><?=catchuoi($ar_ytuong[$i]['ten'],35)?></h4>
						<p> <?=catchuoi($ar_ytuong[$i]['mota'],150)?></p>
					</div>
				</div>
		 	<?php } ?>
			</div>
	 	</div>
	 	<div class="clearfix"></div>
	</div>
 </div>
