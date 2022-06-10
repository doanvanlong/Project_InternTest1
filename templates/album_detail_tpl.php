<?php /* ?>
<div class="item_news_detail">
    <h2 class="tieude_detail"><?=$title_cat?></h2>
    <div class="addthis_native_toolbox"></div>
    <div class="content">
    	<div class="myrow">
            <?php for($i= 0;$i<count($hinhkhac);$i++){ ?>
                <div class="mycol colx3">
                    <a class="album_item" data-fancybox="group" data-caption="<?=$hinhkhac[$i]['ten']?>" href="<?=_upload_hinhthem_l.$hinhkhac[$i]['photo']?>" title="<?=$hinhkhac[$i]['ten']?>"><img src="thumb/480x320x1x90/<?=_upload_hinhthem_l.$hinhkhac[$i]['photo']?>" alt="<?=$hinhkhac[$i]['ten']?>" /></a>
                </div>
            <?php }?>
    	</div>
    </div><!--.content-->
</div> 
<?php */ ?>
<div class="mb-30"></div>
<h2 class="tieude_detail text-center mb-4"><?=$tintuc_detail['ten']?></h2>
<div>
    <div class="main_img">
        <img src="thumb/1170x600x1x90/<?=_upload_tintuc_l.$tintuc_detail['photo']?>" alt="<?=$tintuc_detail['ten']?>" onError="this.src='http://placehold.it/1170x600';" />
    </div>
</div>
<?php 
    $d->reset();
    $sql = "select p.id,p.ten$lang as ten,p.tenkhongdau,p.photo,p.masp,p.gia,p.giakm 
                from #_product as p 
                inner join #_news_sanpham_condition as c on c.id_product = p.id
                where p.hienthi=1 and  c.id_news = ".$tintuc_detail['id']." order by p.stt,p.id desc";      
    $d->query($sql);
    $product = $d->result_array();    
 ?> 

<h2 class="tieude_page text-center mt-4"><span><?=_sanphamdikem?></span></h2>
<div class="row">
<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){  ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-30">
        <div class="item item_sanpham">
            <div class="item_img phong_to ">
                <a href="san-pham/<?=$product[$i]['tenkhongdau']?>.html">
                  <img src="thumb/350x350x1x90/<?=_upload_sanpham_l.$product[$i]['photo']?>" alt="<?=$product[$i]['ten']?>"  onError="this.src='http://placehold.it/350x350';"  />
                </a>
               <div class="bg_xanh">
                    <div class="cart">
                        <button class="add-cart" onclick="return addCart1(<?=$product[$i]['id']?>,'<?=$product[$i]['ten']?>')" data-id="<?=$product[$i]['id']?>" data-name="<?=$product[$i]['ten']?>">
                            <i class="fa fa-cart-plus"></i>
                        </button> 
                    </div>
                    <div class="eye">
                        <a href="san-pham/<?=$product[$i]['tenkhongdau']?>.html"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
            <h3 class="item_name">
              <a href="san-pham/<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten']?></a>
            </h3>
            <div class="item_gia">
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
                }
              ?>
            </div>
            
        </div><!---END .item-->
    </div><!---END .col-->
<?php } ?>
</div><!---END row-->