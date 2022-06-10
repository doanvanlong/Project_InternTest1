<link href="css/order_detail.css" type="text/css" rel="stylesheet" />
<div id="yith-wacp-popup">
    <div class="yith-wacp-content">
    	<div class="yith-wacp-message"><span>Sản phẩm đã được cho vào giỏ!</span></div>
        <div class="col-md-3 col-sm-12 col-xs-12 pull-left product-thumb">
        	<a href="<?=$com?>/<?=$row_detail['tenkhongdau']?>.html" title="<?=$row_detail['ten']?>"><img  src="thumb/170x170x1x90/<?=_upload_sanpham_l.$row_detail['photo'];?>" alt="<?=$row_detail['ten']?>" /></a>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12 pull-right info-box">
        	<div class="product-info">
                <h3 class="product-title"><a href="<?=$com?>/<?=$row_detail['tenkhongdau']?>.html" title="<?=$row_detail['ten']?>"><?=$row_detail['ten']?></a></h3>
                <div class="product-price"><?=number_format($row_detail['gia'],0, ',', '.').' <sup>đ</sup>';?></div>
            </div>
            <div class="cart-info">
                <div class="cart-totals">Tạm tính: <span class="cart-cost"><?=number_format($row_detail['gia'],0, ',', '.').' <sup>đ</sup>';?></span></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="popup-actions">
            <a class="button go-cart" href="gio-hang.html">Xem giỏ hàng</a>
            <a class="button go-checkout" href="gio-hang.html">Thanh toán</a>
            <a class="button continue-shopping" href="#">Tiếp tục mua hàng</a> 
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12 product-orther">
            <?php if(count($product)>0) { ?>
                <h3>Sản phẩm thường mua kèm</h3>
                <div class="wap_item sl_khac">
                <?php for($i=0,$count_product=count($product);$i<$count_product;$i++){ ?>
                    <div class="item">
                    <div class="sp_img"><a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html" title="<?=$product[$i]['ten']?>">
                    <img src="thumb/260x270x2x90/<?=_upload_sanpham_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>" /></a></div>
                    <div class="sp_desc">
                        <?php /*?><h3 class="sp_name"><a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html" title="<?=$product[$i]['ten']?>"><?=$product[$i]['ten']?></a></h3><?php */?>
                       <div class="sp_gia">
                            <?php if($product[$i]['giakm']!=0){?>
                                <div class="giakm"><?=number_format($product[$i]['giakm'],0, ',', '.').'VNĐ'; ?></div>
                                <div class="gia"> <?=number_format($product[$i]['gia'],0, ',', '.').'VNĐ'; ?></div>
                                 
                                 <div class="clear"></div>
                            <?php } else{?>
                                <div class="motgia">
                                   <?php if($product[$i]['gia']!=0){echo number_format($product[$i]['gia'],0, ',', '.').' VNĐ';}else{ echo '<a href="lien-he.html">'._lienhe.'</a>'; }?>
                                </div>
                            <?php }?>
                        </div>
                        <a class="muanhanh"  onclick="addnhanh('<?=$product[$i]['ten']?>',<?=$product[$i]['id']?>,1,'','')"><img src="images/muanhanh.png" /></a>
                        <div class="clear"></div>
                    </div>
                </div><!---END .item-->
                <?php } ?>
                <div class="clear"></div>
                </div><!---END .wap_item-->
            <?php } ?>
        </div>
    </div>
</div><!--.yith-wacp-popup-->