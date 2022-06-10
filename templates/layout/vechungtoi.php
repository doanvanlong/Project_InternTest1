<?php

$d->reset();
$sql = "select ten$lang as ten,mota$lang as mota,photo from #_slider where type='ve-chung-toi' and hienthi=1 order by stt,id desc";
$d->query($sql);
$ar_vechungtoi = $d->result_array();
// text-vechungtoi

$d->reset();
$sql = "select noidung,photo  from #_about where type='text-ve-chung-toi' and hienthi=1 ";
$d->query($sql);
$text_vechungtoi = $d->result_array();
$d->reset();
$sql = "select noidung  from #_about where type='text-lua-chon-chung-toi' and hienthi=1 ";
$d->query($sql);
$text_luachonchungtoi = $d->result_array();
// background về chúng tôi
$d->reset();
$sql2 = "select ten$lang as ten,mota$lang as mota,photo from #_background where type='ve-chung-toi-index' and hienthi=1 order by stt,id desc";
$d->query($sql2);
$back_vechungtoi = $d->result_array();
// luachonchungtoi
$d->reset();
$sql = "select ten$lang as ten,mota$lang as mota,photo from #_slider where type='lua-chon-chung-toi' and hienthi=1 order by stt,id asc";
$d->query($sql);
$ar_luachonchungtoi = $d->result_array();
?>
<div class="vechungtoi pb-5">
	<div class="container">
		<div class="title-vechungtoi text-center py-5">
			<h4 class="tieude_gc">
				<p class="mb-0">Về chúng tôi</p>
				<div class="mh-separator-outer">
					<div class="mh-separator style-square"> <span class="separator-left bg-separator"></span><br> <span class="separator-right bg-separator"></span></div>
				</div>
			</h4>
			<div class="row offset-2 ">
				<div class="col-12 col-sm-12 col-md-12 col-lg-10 ">
				<p class="text-center px-2"><?php echo strip_tags($text_vechungtoi[0]['noidung']) ?></p>

				</div>
			</div>

		</div>
		<div class="row">
			<div class="hide-mobilevechungtoi col-lg-5 col-sm-12 col-12 img-inner">
				<img width="100%" height="542px" src="<?= _upload_hinhanh_l . $text_vechungtoi[0]['photo'] ?>" alt="<?= $text_vechungtoi[0]['ten'] ?>">
			</div>
			<div class="col-lg-7 col-sm-12 col-md-12  col-12">
				<div class="row ">
					<?php
					foreach ($ar_vechungtoi as $value) {
					?>
						<div class="col-lg-6 col-sm-6 col-md-6 col-12 mb-4 col-inner">
							<div class="box-items-vechungtoi text-center">
								<img class="my-3" src="<?= _upload_hinhanh_l . $value['photo'] ?>" alt="<?= $value['ten'] ?>">
								<h4 class="box-items-vechungtoi-title text-uppercase">
									<?= $value['ten'] ?>
								</h4>
								<p style="line-height:26px"><?= $value['mota'] ?></p>
							</div>
						</div>
					<?php
					}
					?>

				</div>
			</div>


		</div>
	</div>
</div>
</div>
<div>
	

</div>
<div class="luachonchungtoi pb-5">
	<div class="container">
		<div class="title-vechungtoi text-center py-5">
			<h4 class="tieude_gc">
				<p class="mb-0">Tại sao chọn chúng tôi</p>
				<div class="mh-separator-outer">
					<div class="mh-separator style-square"> <span class="separator-left bg-separator"></span><br> <span class="separator-right bg-separator"></span></div>
				</div>
			</h4>
			<div class="row offset-2 no-offset-moblie">
				<div class="col-12 col-sm-12 col-md-12 col-lg-10 ">
			<p class="text-center "><?php echo strip_tags($text_luachonchungtoi[0]['noidung']) ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php

			foreach ($ar_luachonchungtoi as $value) {
			?>
				<div class="col-lg-4 col-sm-6 col-md-6 col-12">
					<div class="box-items-luachonchungtoi text-center px-4">
						<div class="box-items-luachonchungtoi-img ">
							<img src="<?= _upload_hinhanh_l . $value['photo'] ?>" alt="<?= $value['ten'] ?>">
						</div>
						<div class="mh-ornament"></div>
						<h6 class="box-items-luachonchungtoi-title my-4">
							<span><?= $value['ten'] ?></span>
						</h6>
						<p class="pt-2"><?= $value['mota'] ?></p>

					</div>
				</div>
			<?php
			}
			?>


		</div>
	</div>
</div>
<div class="counter_index">
	<div class="container">
		<ul>
			<li>
				<div class="mr-3 counter_index_content" >
					<div class="counter_index-number">1000+</div>
					<div class="counter_index-text">Dự án</div>
				</div>
				<div class="counter_index-icon">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</li>
			<li>
				<div class="mr-3 counter_index_content" >
					<div class="counter_index-number">1500+</div>
					<div class="counter_index-text">KHÁCH HÀNG</div>
				</div>
				<div class="counter_index-icon">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
			</li>
			<li>
				<div class="mr-3 counter_index_content" >
					<div class="counter_index-number">4500+</div>
					<div class="counter_index-text">NHÂN VIÊN

					</div>
				</div>
				<div class="counter_index-icon">
					<i class="fa fa-users" aria-hidden="true"></i>
				</div>
			</li>
			<li>
				<div class="mr-3 counter_index_content" >
					<div class="counter_index-number">250+</div>
					<div class="counter_index-text">GIẢI THƯỞNG</div>
				</div>
				<div class="counter_index-icon">
					<i class="fa fa-trophy" aria-hidden="true"></i>
				</div>
			</li>
		</ul>
	</div>
</div>