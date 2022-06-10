<?php 
	$d->reset();
	$sql = "select noidung$lang as noidung from #_about where hienthi=1 and type='tienmat'";
	$d->query($sql);
	$rs_tienmat=$d->fetch_array();

	
	$d->reset();
	$sql = "select noidung$lang as noidung from #_about where hienthi=1 and type='chuyenkhoan'";
	$d->query($sql);
	$rs_chuyenkhoan=$d->fetch_array();

	
?>
<?php 
if(!isAjaxRequest()){
	echo '<link href="css/cart.css" type="text/css" rel="stylesheet" />';
	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){ 
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=99999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 99999';
			}
		}
	}
?>

<div class="content" id="box-shopcart" style="width:100%">
<?php }?>
<div class="tieude_gc mb-30"><span><?=_giohang?></span></div>
<form name="form1" method="post">
	<input type="hidden" name="pid" />
	<input type="hidden" name="command" /> 
	<table id="giohang" class="table table-bordered " style="margin-top:10px;">
	<?php
	if(is_array($_SESSION['cart'])){
    	echo '<thead><th align="center" class="hidden-xs"></th><th>'._pname.'</th><th align="center">'._price.'</th><th align="center">'._quantity.'</th><th align="center" class="hidden-xs">'._total_price.'</th><th align="center">'._congcu.'</th></thead>';
		foreach($_SESSION['cart'] as $k=>$v){
			$pid=$v['productid'];
			$code  =$k;
			$color = $v['color'];
            $size = $v['size'];
			$q=$v['qty'];
			$pmasp=get_code($pid);					
			$pname=get_product_name($pid,$lang);
			 $info=getProductInfo($pid);
			 //dump($info);
			$image = _upload_sanpham_l.$info['photo'];
			if($q==0) continue;
	?>
		<tr>
			<td width="10%" align="center" class="hidden-xs">
				<a target="_blank"  href="san-pham/<?= $info['tenkhongdau'] ?>.html"><img src="thumb/300x300x2x90/<?= $image ?>" class='img-responsive' /></a>
			</td>
			<td width="20%">
				<a class="name" target="_blank" href="san-pham/<?= $info['tenkhongdau'] ?>.html"><?= $pname ?></a>
			</td>
			<td width="10%" align="center">
                <?php
                if ($info['giakm'] > 0) {
                    echo '<div class="price-old">' . number_format($info['gia'],0, ',', '.').'</div>';
					 echo '<div class="price-real">' .number_format($info['giakm'],0, ',', '.').' </div>';
                }else{
                echo '<div class="price-real">' .number_format($info['gia'],0, ',', '.').'</div>';
				}
                ?>
           </td>
			 <td width="10%" align="center">
			 	<input onchange="updateCart();" type="number" name="product[<?=$code?>]" value="<?=$q?>" maxlength="3" min="1" max="999" size="2" style="text-align:center; border:1px solid #F0F0F0" />&nbsp;
           		<p class="visible-xs" style="display:none;font-size:15px;"><?= number_format(get_price($pid) * $q, 0, ',', '.') ?></p>
           </td>  
			<td width="18%" align="center" class="price-total hidden-xs">
				<?= number_format(get_price($pid) * $q, 0, ',', '.') ?>
				</td>
			<td width="10%" align="center">
               <a href="javascript:updateCart()" data-toggle="tooltip" title="Cập nhật"><i class="fa fa-retweet"></i></a>
                &nbsp;&nbsp;
               <a href="javascript:deleteCart('<?= $k ?>')" data-toggle="tooltip" title="Xóa"><i class="fa fa-trash-o"></i></a>
			</td>
		</tr>
	<?php  } ?>
		<tr>
        	<td colspan="6" style="padding:0">
                <h3 class="all-cart-price"><?=_total_price?>: <?= number_format(get_order_total(), 0, ',', '.') ?>&nbsp;VNĐ</h3>
            </td>
        </tr>
        <tr>
            <td colspan="6" align="right">
            <button class="mybtn btn-do my-10" type="button" onclick="location.replace('');"><i class="fa fa-shopping-bag"></i>&nbsp;<?=_muatiep?></button>
             <button class="mybtn btn-den my-10" type="button" onclick="clearCart()"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;<?= _xoatatca ?></button>
            </td>
        </tr>
	<?php  }else{
				echo "<tr bgColor='#FFFFFF'><td>Không có sản phẩm!</td>";
			}
	 ?>

	</table> 
</form>
 <?php if(!isAjaxRequest()){ ?>
</div>
<div>
	<form method="post" name="frm_order" id="frm_order" class="form-horizontal from-thanhtoan" action="" enctype="multipart/form-data" role="form">
		<div class="">
			<div class="bill_form">
	         <div class="tieude_gc mb-30"><span><?=_thongtinthanhtoan?></span></div>
				<div class="row form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"><?=_fullname?><span>*</span></label>
					<div class="col-sm-10">
						<input class="t form-control" name="hoten" id="hoten" type="text" value="" />
					</div>
				</div>
				<div class="row form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"><?=_phone?><span>*</span></label>
					<div class="col-sm-10">
						<input class="t form-control" name="dienthoai" id="dienthoai" type="text" value="" />
					</div>
				</div>
				<div class="row form-group">
	            	<label for="inputEmail3" class="col-sm-2 control-label"><?=_tinhthanhpho?><span>*</span></label>
	                <div class="col-sm-10">
	                <div class="w51">
	                <select name="thanhpho" id="thanhpho" class="sl form-control">
	                	<option value=""><?=_tinhthanhpho?></option>
	                    <?php foreach($thanhpho as $k){ ?>
	                    	<option value="<?=$k['id']?>"><?=$k['ten']?></option>
	                    <?php }?>
	                </select>
	                </div>
	                 <div class="w51 margin">
		                <select name="quan" id="quan" class="sl form-control">
		                	<option value=""><?=_quanhuyen?></option> 
		                </select>
	                </div>
	                </div>
	            </div>
				<div class="row form-group">
					<label for="inputEmail3" class="col-sm-2 control-label" ><?=_address?><span>*</span></label>
					<div class="col-sm-10">
						<input class="t form-control" name="diachi"  id="diachi" type="text" value="" />
					</div>
				</div>
				<div class="row form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">E-Mail<span>*</span></label>
					<div class="col-sm-10">
						<input class="t form-control" name="email" id="email" type="email" value="" />
					</div>
				</div>

	            <div class="row form-group">
					<label class="col-sm-2 control-label"><?=_ghichu?><span>*</span></label>
					<div class="col-sm-10">
						<textarea name="noidung"  class="form-control ax" style="resize:none" cols="50" rows="4" ></textarea>
					</div>
				</div>
				<div class="row form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"><?=_phuongthucthanhtoan?><span>*</span></label>
					<div class="col-sm-10">
						<?php 
						$d->reset();
						$sql="select *,ten$lang as ten,noidung$lang as noidung from #_news where type='hinh-thuc-thanh-toan' and hienthi=1 order by stt,id desc";
						$d->query($sql);
						$ar_httt=$d->result_array();
						for($i=0,$count=count($ar_httt);$i<$count;$i++){
						 ?>
						<div>
							<div class="w_httt">
								<input class="httt" name="httt" id="httt-<?=$i?>" data-stt = "<?=$i?>" type="radio" value="<?=$ar_httt[$i]['id']?>" <?=($i==0)?'checked':"";?> />
								<label for="httt-<?=$i?>"><?=$ar_httt[$i]['ten']?></label> 
							</div>
								
							<div class="noidung-httt noidung-httt-<?=$i?> content">
								<?=$ar_httt[$i]['noidung']?>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<div class='clearfix'></div>
		<hr />
		</div>
		<div class="clearfix"></div>
	   <div style="text-align: right;">	
	        <button title='tiếp tục' class="mybtn btn-do mb-20" type="button" onclick="check();"  value="" style="cursor:pointer;" ><?=_xacnhanthanhtoan?> <i class="fa fa-sign-in"></i></button>
	    </div>
	</form>
</div>

<?php } ?>