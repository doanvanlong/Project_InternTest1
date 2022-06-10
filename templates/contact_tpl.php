	<div class="div_content_border">
		<div class="content mb-30">
			<?=$company_contact['noidung'] ?>
		</div>

		<form action="lien-he.html" method="post" name="frm_contact" id="frm_contact" class="pt-2">
			<div class="form-group">
				<input class="form-control" type="text" id="ten_contact" name="ten_contact" value="" placeholder="<?=_hovaten?>*" />
			</div>
			<div class="form-group">
				<input class="form-control" type="email" id="email_contact" name="email_contact" value="" placeholder="Email*" />
			</div>
			<div class="form-group">
				<input class="form-control" type="text" id="dienthoai_contact" name="dienthoai_contact" value="" placeholder="<?=_dienthoai?>*" />
			</div>
			<div class="form-group">
				<textarea name="noidung_contact" id="noidung_contact" rows="3" class="form-control" placeholder="<?=_noidung?>*" ></textarea>
			</div>
			<div class="form-group">
				<input class="mybtn btn-do" type="submit" name="submit_contact" value="<?=_guilienhe?>" onclick="return sb_contact()" /> 
			</div>
		</form>
	</div>
	<div class="x_map mt-30"><?=$company['link_googlemap']?></div>
	
<div class="mb-30"></div>
 