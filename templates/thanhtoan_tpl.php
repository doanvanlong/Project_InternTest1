<link href="css/cart.css" type="text/css" rel="stylesheet" />

<style>
	table#tt td
	{
		height:30px;
	}
	table#tt td input.t
	{
		width:300px;
		height:20px;
		margin:3px 0px 5px 0px;
		border:1px solid #DDD;
	}
	table#tt span
	{
		color:red;
	}
</style>

<div class="wapper">
<div class="box_containerlienhe shop">
<div class="tieude_giua" style="margin-bottom:12px;">Giỏ hàng</div>
	<div class="content ">

	<div class="cus-info">
     <form method="post" name="frm_order" id="frm_order" class="form-horizontal from-thanhtoan" action="" enctype="multipart/form-data" role="form">        
	<div class="">
		<div class="bill_form">
			<div class="title"><?=_thongtinthanhtoan?></div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label"><?=_fullname?><span>*</span></label>
				<div class="col-sm-10">
					<input class="t form-control" name="hoten" id="hoten" type="text" value="" />
				
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label"><?=_phone?><span>*</span></label>
				<div class="col-sm-10">
					<input class="t form-control" name="dienthoai" id="dienthoai" type="text" value="" />
				
				</div>
			</div>
			<div class="form-group">
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
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label" ><?=_address?><span>*</span></label>
				<div class="col-sm-10">
					<input class="t form-control" name="diachi"  id="diachi" type="text" value="" />
				
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">E-Mail<span>*</span></label>
				<div class="col-sm-10">
					<input class="t form-control" name="email" id="email" type="email" value="" />
				
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Ghi chú<span>*</span></label>
				<div class="col-sm-10">
					<textarea name="noidung"  class="form-control ax" style="resize:none" cols="50" rows="4" ></textarea>
				
				</div>
			</div>
		</div>
	<div class='clearfix'></div>
	</div>
	<hr />
	
	</div>
	<div class="clear"></div>

	<div class="">
             <table id="giohang" class="table table-bordered " style="margin-top:10px">
                    <?
                    if(is_array($_SESSION['cart'])){
                    echo '<thead><th class="hidden-xs" align="center"></th><th>'._pname.'</th><th align="center">'._price.'</th><th align="center">'._quantity.'</th><th align="center">'._total_price.'</th></thead>';
                    foreach($_SESSION['cart'] as $k=>$v){
					$code  =$k;
                    $pid=$v['productid'];
                    $q=$v['qty'];					
                    $color = $v['color'];
                    $size = $v['size'];
                    $info=getProductInfo($pid);
                    $pname=get_product_name($pid);
                    $image = _upload_sanpham_l.$info['photo'];
                    if($q==0) continue;
                    ?>
                    <tr bgcolor="#FFFFFF"><td class="hidden-xs" width="10%" align="center"><a target="_blank"  href="san-pham/<?= $info['tenkhongdau'] ?>-<?= $info['id'] ?>.html"><img src="<?= $image ?>" class='img-responsive' /></a></td>
                        <td width="35%"><a class="name" target="_blank" href="san-pham/<?= $info['tenkhongdau'] ?>-<?= $info['id'] ?>.html"><?= $pname ?></a>
				<?php
                if ($color) {
                    $colors = getColorByProductId($pid);
                    echo '<div class="product-option"><label>'._mausac.': </label>';
                    
                    foreach ($colors as $k2 => $v2) {
                        if($v2['id_color'] == $color){
                            echo "<strong class='red'>".$v2['ten']."</strong>";
                        }
                    }
                    echo '<div class="clear"></div></div>';
                }
                if ($size) {
                    $sizes = getSizeByProductId($pid);
                    echo '<div class="product-option"><label>Kích thước: </label>';
                   
                    foreach ($sizes as $k2 => $v2) {
                        if($v2['id_size'] == $size){
                            echo "<strong class='red'>".$v2['ten']."</strong>";
                        }
                    }
                    echo '<div class="clear"></div></div>';
                }
                ?>
                        </td>
                        <td width="10%" align="center">
                            <?php
                             echo '<div class="price-real">'.number_format(get_price($pid), 0, ',', '.').'</div>';
                            ?>
							
                        <td width="10%" align="center"><input type="text" name="product[<?=$code?>]" value="<?= $q ?>" maxlength="3" size="2" readonly="readonly" style="text-align:center; border:1px solid #F0F0F0" />&nbsp;</td>                    
                        <td width="18%" align="center" class="price-total"><?= number_format(get_price($pid) * $q, 0, ',', '.')?></td>
                       
                    </tr>
<?php
}
?>	
                    <tr><td colspan="6" style="padding:0" class="total_cart_max">	
							<div class="all-price"><span><?=_tonggia?>: </span><span class="price"><?= number_format(get_order_total(), 0, ',', '.')?> Vnđ</span></div>
                            <?php if($config['phi']!=0){ ?>
							<div class="all-ship"><span>Ship: </span><span class="price">0 Vnđ</span></div>
                            <?php }?>
							<div class="all-price-all"><span><?=_thanhtien?>: </span><span class="price"><?= number_format(get_order_total(), 0, ',', '.') ?> Vnđ</span></div>
                           
                        </td></tr>
                    <?
                    }
                    else{
                    echo "<tr bgColor='#FFFFFF'><td class='empty'>"._giohangrong."</td>";
                    }
                    ?>
                </table>		
				
				</div>
		
		<div class="clearfix"></div>
   <div style="text-align: right; padding-top:20px;">	
        <button title='tiếp tục' class="btn xbtn" type="button" onclick="check();"  value="" style="cursor:pointer;"/><?=_xacnhanthanhtoan?> <i class="fa fa-sign-in"></i></button>
    </div>
		
		</form>
		
 </div>  
 
 </div>
  </div>