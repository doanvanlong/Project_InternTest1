
<div class="tieude_gc mb-20"><span><?=$title_cat?></span></div>
<div class="row">
<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){	?>
    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="item">
      <a href="<?=$com?>/<?=$product[$i]['tenkhongdau']?>.html" title="<?=$product[$i]['ten']?>">
        <div class="sp_img hover_sang2">
        <img src="thumb/400x300x1x90/<?=_upload_sanpham_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>"  onError="this.src='http://placehold.it/400x300';"  /></div>
        <h3 class="sp_name"><?=$product[$i]['ten']?></h3>
        <div class="sp_gia">
           <?=_gia?>: 
          <?php 
           	if($product[$i]['giakm']!=0){
           		echo '<span class="del-gia">'.number_format($product[$i]['gia'],0, ',', '.').'<sup>đ</sup></span>';
           		echo '<span class="gia-ban">'.number_format($product[$i]['giakm'],0, ',', '.').'<sup>đ</sup></span>';
           	}else{ 
           		if($product[$i]['gia']!=0){
           			echo '<span class="gia-ban">'.number_format($product[$i]['gia'],0, ',', '.').'<sup>đ</sup></span>';
           		}else{
           			echo '<a href="lien-he.html" class="gia-ban">'._lienhe.'</a>';
           		}
           		
            }?>
        </div>
        <div class="cart"><button class="add-cart" onclick="return addCart1(<?=$product[$i]['id']?>,'<?=$product[$i]['ten']?>')" data-id="<?=$product[$i]['id']?>" data-name="<?=$product[$i]['ten']?>">Đặt hàng</button>  </div>
      </a>
    </div><!---END .item-->
    </div><!---END .col-->
<?php } ?>
<div class="clearfix"></div>
</div><!---END row-->
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="clear"></div>
<br>
