<?php 

$d->reset();
$sql="select ten$lang as ten,mota$lang as mota,noidung$lang as noidung from #_about where type='text-gioi-thieu'"; 
$d->query($sql);
$text_gt=$d->fetch_array();


if($text_gt['noidung'] != ''){
?> 
<div class="w_dichvu pt-30">
	<div class="container">
		<div id="text_seo">
			<div class="content">
				<?=$text_gt['noidung']?>
			</div>
			<div class="xemthem"><button>Xem thêm</button></div>
		</div>
			
	</div>
</div>
<?php } ?>