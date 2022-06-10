<?php 

$d->reset();
$sql="select ten$lang as ten,mota$lang as mota, photo,link from #_slider where hienthi=1 and type='ve-chung-toi'";
$d->query($sql);
$ar_vechungtoi = $d->result_array();

 ?>
<div class="w_dichvu">
	<div class="container">
		<div class="tieude_gc">
			<span><?=_vechungtoi?></span> 
		</div>
		<div class="row">
			<?php foreach($ar_vechungtoi as $val){ ?>
			<div class="col-md-4 col-12">
				<div class="vechungtoi_item">
					<a href="<?=$val['link']?>"></a>
					<div class="vechungtoi_img">
						<img src="thumb/400x400x1x90/<?=_upload_hinhanh_l.$val['photo']?>" alt="<?=$val['ten']?>" />
					</div>
					<h2 class="vechungtoi_ten"><span><?=$val['ten']?></span></h2>
					<div class="vechungtoi_mota">
						<?=$val['mota']?>
					</div>
				</div>
			</div>
		 	<?php } ?>
	 	</div>
	 </div>
 </div>
	 
