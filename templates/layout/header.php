<?php
error_reporting(0);
$d->reset();
$sql = "select photo from #_background where type='logo-desktop' limit 0,1";
$d->query($sql);
$logo_desktop = $d->fetch_array();

$d->reset();
$sql = "select photo from #_background where type='logo-mobile' limit 0,1";
$d->query($sql);
$logo_mobile = $d->fetch_array();

$d->reset();
$sql = "select ten$lang as ten,link,id,photo from #_slider where hienthi=1 and type='social' order by stt,id desc";
$d->query($sql);
$social = $d->result_array();

$d->reset();
$sql = "select ten$lang as ten,mota$lang as mota,id,photo from #_slider where hienthi=1 and type='info-head' order by stt,id desc";
$d->query($sql);
$infoHead = $d->result_array();


?>
<div id="header">
	<div class="menu-main">
		<div class="container">
			<div id="menu">
				<div class="logo_head">
					<a href=""></a>
					<img src="<?= _upload_hinhanh_l . $logo_desktop['photo'] ?>" class="logo-desktop" alt="<?= $company['ten'] ?>" onError="this.src='http://placehold.it/200x75';" height="70" />
					<img src="<?= _upload_hinhanh_l . $logo_mobile['photo'] ?>" class="logo-mobile" alt="<?= $company['ten'] ?>" onError="this.src='http://placehold.it/100x50';" height="50" />
				</div>
				<div class="d-flex justify-content-between">
					<div id="search" class="mr-5">
						<input type="text" name="keyword" id="keyword" onKeyPress="doEnter(event,'keyword');" value="<?= _nhaptukhoatimkiem ?>..." onclick="if(this.value=='<?= _nhaptukhoatimkiem ?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?= _nhaptukhoatimkiem ?>...'}" placeholder="Tìm kiếm...">
						<button onclick="onSearch(event,'keyword');"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
					<div id="head_right " class="d-flex">
						<a href="lien-he.html" class="header_button header_right-location ">
							<span> <i class="fa fa-location-arrow" aria-hidden="true"></i></span>
						</a>

						<button class="header_button header_right-search-mobile " onclick="clickSearchMobile()">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
						<button class="header_button ">
							<span class="header_right-account">Đăng nhập</span>
							<i class="header_right-account-moblie fa fa-user" aria-hidden="true"></i>
						</button>

						<a href="gio-hang.html" title="Giỏ hàng" class="header_button  header_cart">
							<span class="header_right-cart-desktop"> Giỏ hàng<i class="fa fa-shopping-bag pl-2" aria-hidden="true"></i></span>
							<i class="header_right-cart-mobile fa fa-shopping-bag " aria-hidden="true"></i>
							<span class="count_cart text-center d-flex justify-content-center align-items-center"><b class="num-cart" style="font-size:12px"><?= get_total(); ?></b> </span>
						</a>

					</div>
				</div>
			</div>
			<!-- end menu -->
		</div>
		<div id="nav_menu">
			<div class="container">
				<?php include _template . "layout/menu_top.php"; ?>
				<div>
					<?php include _template . "layout/menu_mobi.php"; ?>
				</div>
				<!---END #menu_mobi-->
			</div>
		</div>
	</div>
</div>

<!-- chèn layout menu  -->
</div>
<div id="search-mobile">
	<input type="text" name="keyword2" id="keyword2" onkeypress="doEnter2(event,'keyword2');" value="Tìm kiếm..." onclick="if(this.value=='Tìm kiếm...'){this.value=''}" onblur="if(this.value==''){this.value='Nhập từ khóa tìm kiếm...'}">

	<button class="button-search-mobile" onclick="onSearch2(event,'keyword2')"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>
<!-- <div class="shop_cart">
	<a href="gio-hang.html" title="Giỏ hàng">
		<span class="icon-cart"></span><span class="num-cart"><?= get_total(); ?></span>
	</a>
</div> -->
<!--Tim kiem-->
<script language="javascript">
	function doEnter(evt) {
		var key;
		if (evt.keyCode == 13 || evt.which == 13) {
			onSearch(evt);
		}
	}

	function clickSearchMobile() {
		$('#modal-search-mobile').addClass('modal-search-mobileopen');
		$('#search-mobile').addClass('search-mobileopen');
		$('#modal-search-mobile').removeClass('search-mobileopen');

	}

	function closeSearchMobile() {
		$('#modal-search-mobile').removeClass('modal-search-mobileopen');
		$('#search-mobile').removeClass('search-mobileopen');

	}

	function onSearch(evt) {

		var keyword = document.getElementById("keyword").value;
		if (keyword == '' || keyword == '<?= _nhaptukhoatimkiem ?>...') {
			alert('<?= _chuanhaptukhoa ?>');
		} else {
			location.href = "tim-kiem.html&keyword=" + keyword;
			loadPage(document.location);
		}
	}
</script>
<!--Tim kiem-->