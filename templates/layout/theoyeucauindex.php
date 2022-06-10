<?php 

	$d->reset();
	$sql="select id,ten$lang as ten,noidung$lang as noidung,photo from #_about where type='theo-yeu-cau-index'";
	$d->query($sql);
	$bg = $d->fetch_array();


	$d->reset();
	$sql="select id,ten$lang as ten from #_product_danhmuc where hienthi=1 and type='san-pham' order by stt,id desc";
	$d->query($sql);
	$sanpham_yeucau = $d->result_array();


?>


<div class="w_dichvu bg_container" id="theoyeucauindex" style="background-image: url('<?=_upload_hinhanh_l.$bg['photo']?>');">
<div class="container">
	<div class="tieude_gc"><span><?=$bg['ten']?></span></div>
	<div class="content mb-30"><?=$bg['noidung']?></div>
<form action="dat-hang-theo-yeu-cau.html" method="post" name="frm_yeucau" id="frm_yeucau" >
	<div class="row">
		<div class="col-12 col-md-4">
			<div class="form-group">
				<input class="form-control" type="text" id="ten_yeucau" name="ten_yeucau" value="" placeholder="<?=_hovaten?>*" />
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group">
				<input class="form-control" type="email" id="email_yeucau" name="email_yeucau" value="" placeholder="Email*" />
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group">
				<input class="form-control" type="text" id="dienthoai_yeucau" name="dienthoai_yeucau" value="" placeholder="<?=_dienthoai?>*" />
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group">
				<select name="sanpham_yeucau" class="form-control" id="sanpham_yeucau">
					<option value="">Chọn sản phẩm</option>
					<?php foreach($sanpham_yeucau as $val){ ?>
					<option value="<?=$val['ten']?>" data-id="<?=$val['id']?>"><?=$val['ten']?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group" id="divloaisanpham_yeucau">
				<select name="loaisanpham_yeucau" class="form-control" id="loaisanpham_yeucau">
					<option value="">Chọn loại</option>
				</select>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group">
				<input class="form-control" type="number" id="soluong_yeucau" name="soluong_yeucau" value="" placeholder="Số lượng (tấm) *" min="1" />
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<textarea name="noidung_yeucau" id="noidung_yeucau" rows="3" class="form-control" placeholder="<?=_noidung?>*" ></textarea>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group text-center">
				<input class="mybtn btn-do" type="submit" name="submit_yeucau" value="Gửi yêu cầu" onclick="return sb_yeucau()" />
			</div>
		</div>
	</div>
</form>
</div>
</div>