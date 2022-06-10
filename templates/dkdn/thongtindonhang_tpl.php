<link href="css/register.css" type="text/css" rel="stylesheet" />
<link href="css/cart.css" type="text/css" rel="stylesheet" />

<div class="wapper">
<div class="bg_register">
    <div class="register_left col-md-3 col-sm-4 col-xs-12">
    	<div class="content--full">
            <div class="box box_register box--no-padding">
                <div class="box__header">
                    <h2 class="box__title">Thông tin chung</h2>
                </div>
                <div class="box__body">
                    <div class="sidebar__widget widget widget--profile">
                        <div class="profile clearfix">
                            <div class="profile__avatar">
                                <img class="img-circle img-avatar" src="images/avatar.png" alt="" onclick="">
                            </div>
                            <div class="profile__info">
                                <div class="profile__name"><?=$_SESSION["loginw"]['ten']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__widget widget">
                    	<?php include _template."layout/list_user.php"?>
                    </div>
                </div>
            </div>
    
    	</div>
        
    </div>
    
    
    <div class="register_right col-md-9 col-sm-8 col-xs-12">
    	<div class="content--full row">
           <div class="col-md-12 col-xs-12">
              <div class="box_register box--center">
                 <div class="box__header">
                    <h2 class="box__title">Thông tin đơn hàng</h2>
                 </div>
                 <div class="box__body">
                 
                    <div class="main_content">
        
 
                            
                    <?php  for($i=0;$i<count($order);$i++){
                        $d->reset();
                        $sql= "select * from #_chitietdonhang where madonhang='".$order[$i]['madonhang']."'";
                        $d->query($sql);
                        $result_ctdonhang = $d->result_array();
						
						$d->reset();
                        $sql= "select * from #_tinhtrang where id='".$order[$i]['tinhtrang']."'";
                        $d->query($sql);
                        $tinhtrang = $d->fetch_array();
						
                    ?>
                    <div class="widget">
                        <div class="title">
                                <h6 style="text-transform:uppercase;">
                                	<span>ĐƠN HÀNG: <?=$i+1?> &nbsp;&nbsp;&nbsp;&nbsp; </span>
                                    <span>Mã đơn hàng: <b style="text-decoration:underline;"><?=$order[$i]['madonhang']?></b> &nbsp;&nbsp;&nbsp;&nbsp; </span>
                                    <span>NGÀY ĐẶT: <b style="text-decoration:underline;"><?=date("d/m/Y",$order[$i]["ngaytao"])?></b> &nbsp;&nbsp;&nbsp;&nbsp; </span>
                                    
                                    <span>Tình trạng đơn hàng: <b style="text-decoration:underline;"><?=$tinhtrang["trangthai"]?></b> &nbsp;&nbsp;&nbsp;&nbsp; </span></h6>
                            </div>
                            
                          <div class="">
             <table id="giohang" class="table table-bordered " style="margin-top:10px">
                    <?
                    if(is_array($result_ctdonhang)){
                    echo '<thead><th class="hidden-xs" align="center"></th><th>'._pname.'</th><th align="center">'._price.'</th><th align="center">'._quantity.'</th><th align="center">'._total_price.'</th></thead>';
                    foreach($result_ctdonhang as $k=>$v){
					$code  =$k;
                    $pid=$v['id_sanpham'];
                    $q=$v['soluong'];					
                    $color = $v['mausac'];
                    $size = $v['size'];
                    $info=getProductInfo($pid);
                    $pname=get_product_name($pid);
                    $image = _upload_sanpham_l.$info['photo'];
					$tongtien += get_price($pid)*$v['soluong'];	
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
							<div class="all-price"><span><?=_tonggia?>: </span><span class="price"><?= number_format($tongtien, 0, ',', '.')?> Vnđ</span></div>
							
							<div class="all-price-all"><span><?=_thanhtien?>: </span><span class="price"><?= number_format($tongtien, 0, ',', '.') ?> Vnđ</span></div>
                           
                        </td></tr>
                    <?
                    }
                    else{
                    echo "<tr bgColor='#FFFFFF'><td class='empty'>"._giohangrong."</td>";
                    }
                    ?>
                </table>		
				
				</div>  
                            
                    </div>
                    <?php }?>
                    </div>
                    

                 </div>
              </div>
           </div>
        </div>
    </div>

</div></div>






