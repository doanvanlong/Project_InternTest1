<?php 

$d->reset();
$sql="select ten$lang as ten,mota$lang as mota, tenkhongdau, photo from #_news where hienthi=1 and type='tin-tuc' and noibat=1  order by stt,id desc limit 0,5";
$d->query($sql);
$bangtin = $d->result_array();
 ?>
<div class="w_dichvu">
	<div class="container">
		<div class="tieude_gc mb-40">
			<span><?=_tintuc?></span>
		</div>
		<div class="sl_news">
			<?php for($i=0,$count = count($bangtin);$i<$count;$i++){ ?>
				<div class="pn-15  ">
					<div class="item item_news  bg_new_time wow fadeIn" data-wow-duration="1s">
						<a href="tin-tuc/<?=$bangtin[$i]['tenkhongdau']?>.html""></a>
						<div class="item_img">
							<img src="thumb/480x320x1x90/<?=_upload_tintuc_l.$bangtin[$i]['photo']?>" alt="<?=$bangtin[$i]['ten']?>"  onError="this.src='http://placehold.it/480x320';"  />
						</div> 
						<div class="new_time">
				            <span class="day"><?=date('d',$v['ngaytao'])?></span>
				            <span class="month"><?=date('M',$v['ngaytao'])?></span>
				        </div>
						<h4 class="item_name"><?=$bangtin[$i]['ten']?></h4>
						<div class="item_content">
				            <?=catchuoi($bangtin[$i]['mota'],150)?>
				        </div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
 </div> 
