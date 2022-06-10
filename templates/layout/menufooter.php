<div id="menufooter">
	<ul class="">
		<li>
			<a href="tel:<?= $company['dienthoai'] ?>" class="">
				<i class="fa fa-phone icon-box-add" aria-hidden="true"></i>
			</a>
		</li>
		
		<li>
			<a href="javascript:void(0)" class="js-facebook-messenger-box">
				<i class="fa fa-comments icon-box-add-chat" aria-hidden="true"></i>
			</a>
		</li>
		<li>
			<a href="javascript:void(0)" onclick="scrolltop()">
			<i class="fa fa-arrow-up icon-box-add" aria-hidden="true"></i>

			</a>
		</li>
	</ul>
</div>
<div class="box-add">
	<div class="box-add-item box-call">
		<a href="#modal_call" data-toggle="modal"><i class="fa fa-phone icon-box-add" aria-hidden="true"></i></a>
		<div class="box-note"><?= _goichochungtoi ?></div>
	</div>
	<div class="box-add-item box-facebook js-facebook-messenger-box onApp rotate bottom-right cfm rubberBand animated moble-none" data-anim="rubberBand">
		<i class="fa fa-comments icon-box-add-chat" aria-hidden="true"></i>
		<svg id="close-icon" data-name="close icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.98 39.99">
			<path d="M48.88,11.14a3.87,3.87,0,0,0-5.44,0L30,24.58,16.58,11.14a3.84,3.84,0,1,0-5.44,5.44L24.58,30,11.14,43.45a3.87,3.87,0,0,0,0,5.44,3.84,3.84,0,0,0,5.44,0L30,35.45,43.45,48.88a3.84,3.84,0,0,0,5.44,0,3.87,3.87,0,0,0,0-5.44L35.45,30,48.88,16.58A3.87,3.87,0,0,0,48.88,11.14Z" transform="translate(-10.02 -10.02)" style="fill:#3d5c81"></path>
		</svg>
		<div class="box-note"><?= _chatqua ?> </div>
	</div>
	<div class="box-add-item box-call" onclick="scrolltop()">
		<i class="fa fa-arrow-up icon-box-add" aria-hidden="true"></i>
		<div class="box-note">Lên trên </div>
	</div>
</div>
<div id="modal-search-mobile" onclick="closeSearchMobile()" style="text-align:right;padding-right:10px;font-size:30px;color:#fff">&times;</div>

<div class="desktop js-facebook-messenger-container">
	<div class="js-facebook-messenger-top-header"><span><?= _hotlinetuvan ?>: <?= $company['dienthoai'] ?> </span></div>
	<div class="fb-page" data-tabs="messages" data-href="<?= $company['fanpage'] ?>" data-width="320" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
</div>
<script>
	jQuery(document).ready(function() {
		jQuery(".js-facebook-messenger-box").on("click", function() {
			jQuery(".js-facebook-messenger-box, .js-facebook-messenger-container").toggleClass("open"), jQuery(".js-facebook-messenger-tooltip").length && jQuery(".js-facebook-messenger-tooltip").toggle()
		}), jQuery(".js-facebook-messenger-box").hasClass("cfm") && setTimeout(function() {
			jQuery(".js-facebook-messenger-box").addClass("rubberBand animated")
		}, 3500), jQuery(".js-facebook-messenger-tooltip").length && (jQuery(".js-facebook-messenger-tooltip").hasClass("fixed") ? jQuery(".js-facebook-messenger-tooltip").show() : jQuery(".js-facebook-messenger-box").on("hover", function() {
			jQuery(".js-facebook-messenger-tooltip").show()
		}), jQuery(".js-facebook-messenger-close-tooltip").on("click", function() {
			jQuery(".js-facebook-messenger-tooltip").addClass("closed")
		}))
	});
</script>
<div class="modal fade" id="modal_message" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div id="message_val">
					<h6><?= _delaithongtin ?> - <b><?= _nhangiauudai ?></b></h6>
					<form action="" method="post" name="frm_message" id="frm_message">

						<input type="text" name="dienthoai_message" id="dienthoai_message" placeholder="<?= _sodienthoaicuaban ?>" class="form-control" />
						<textarea name="noidung_message" id="noidung_message" placeholder="<?= _delailoinhanchochungtoi ?>" class="form-control"></textarea>
						<input type="button" name="submit_message" value="<?= _gui ?> <?= $company['ten'] ?>" class="btn btn-success form-control" onclick="return sb_message()" />

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_call" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6><?= _goicho ?> <?= $company['ten'] ?> <?= _denhantuvantotnhat ?></h6>
				<div id="call_val">
					<form action="index.php" method="post" name="frm_call" id="frm_call">

						<div class="form-group">
							<input type="text" name="dienthoai_call" id="dienthoai_call" placeholder="<?= _sodienthoaicuaban ?>" class="form-control" />
							<input type="button" name="submit_call" id="submit_call" value="<?= _yeucaugoilai ?>" class="btn btn-success form-control" onclick="return sb_call()" />
						</div>

					</form>
					<div class="phan_cach"><span><?= _hoac ?></span></div>
					<div class="">
						<p><b><?= _goicho ?> <?= $company['ten'] ?> <?= _denhantuvantotnhat ?></b></p>
						<p><b><?= $company['dienthoai'] ?></b></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_map" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h6><?= _vanphong ?> - <?= $company['ten'] ?></h6>
				<p><i class="fa fa-map-marker"></i> &nbsp; <?= $company['diachi' . $lang] ?></p>
				<div class="x_map">
					<?= $company['link_googlemap'] ?>
				</div>
			</div>
		</div>
	</div>
</div>
<a href="#modal_result" data-toggle="modal" class="hidden" id="button_show_result"></a>
<div class="modal fade" id="modal_result" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="comment_result">

				</div>
				<div class="auto-close">
					<?= _thongbaosetudongtatsau ?> <b id="second_end">5</b> <?= _giay ?> ...
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function scrolltop() {
		$('html, body').animate({
			scrollTop: 0
		}, 1000);
	}
</script>
<script>

	function sb_call() {
		if (isEmpty($('#dienthoai_call').val(), "<?= _nhapsodienthoai ?>")) {
			$('#dienthoai_call').focus();
			return false;
		}
		if (isPhone($('#dienthoai_call').val(), "<?= _sodienthoaikhonghople ?>")) {
			$('#dienthoai_call').focus();
			return false;
		}
		$.ajax({
			url: 'ajax/box_contact.php',
			data: {
				act: 'goi-dien',
				dienthoai: $('#dienthoai_call').val(),
			},
			type: 'POST',
			async: true,
			success: function(res) {
				dongModal();

				$('.comment_result').html(res);

				$('#button_show_result').click();

				$("#dienthoai_call").val("");

				countdown();
			}
		});
	}
</script>
<script>
	function sb_message() {
		if (isEmpty($('#dienthoai_message').val(), "<?= _nhapsodienthoai ?>")) {
			$('#dienthoai_message').focus();
			return false;
		}
		if (isPhone($('#dienthoai_message').val(), "<?= _sodienthoaikhonghople ?>")) {
			$('#dienthoai_message').focus();
			return false;
		}
		if (isEmpty($('#noidung_message').val(), "<?= _nhapnoidung ?>")) {
			$('#noidung_message').focus();
			return false;
		}
		$.ajax({
			url: 'ajax/box_contact.php',
			data: {
				act: 'gui-tin',
				dienthoai: $('#dienthoai_message').val(),
				noidung: $('#noidung_message').val(),
			},
			type: 'POST',
			async: true,
			success: function(res) {

				dongModal();

				$('.comment_result').html(res);

				$('#button_show_result').click();

				$("#dienthoai_message").val('');

				$("#noidung_message").val('');

				countdown();

			}
		});
	}

	var setTime = 5;

	function countdown() {
		const interval = setInterval(function() {

			if (setTime == 0) {

				dongModal();

				clearInterval(interval);

				setTime = 5;

				$('#second_end').html('5');

			} else {
				setTime = setTime - 1;

				return $('#second_end').html(setTime);
			}
		}, 1000);
	}

	function dongModal() {
		$('.close').click();
	}
</script>