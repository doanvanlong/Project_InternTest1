<?php
    $d->reset();
    $sql="select ten$lang as ten,id,tenkhongdau from #_product_danhmuc where hienthi=1 and type='san-pham' order by stt,id desc"; 
    $d->query($sql);
    $danhmuc_sp_left=$d->result_array();

    $d->reset(); 
    $sql="select ten$lang as ten,mota$lang as mota,tenkhongdau,id,photo from #_news where hienthi=1 and type='tin-tuc' and ngaytao<=".time()." order by ngaytao desc limit 0,5";
    $d->query($sql);
    $tinmoi=$d->result_array();

?>
<div class="div_left">
    <div class="tieude_left"><span><?=_sanpham?></span></div>
    <div class="ar_left">
        <?php for($i = 0;$i<count($danhmuc_sp_left); $i++){ ?>
            <div class="item_left item_sp_left">
                <h3><a href="san-pham/<?=$danhmuc_sp_left[$i]['tenkhongdau']?>">
                    <i class="fa fa-angle-double-right"></i> &nbsp;
                    <?=$danhmuc_sp_left[$i]['ten']?>
                </a></h3>
            </div>
        <?php }?>
    </div>
</div> 
<div class="div_left">
    <div class="tieude_left"><span><?=_tintuc?></span></div>
    <div class="ar_left">
        <?php for($i = 0;$i<count($tinmoi); $i++){ ?>
            <div class="item_left border-bottom">
                <a href="tin-tuc/<?=$tinmoi[$i]['tenkhongdau']?>.html"></a>
                <div class="item_img phong_to hover_sang">
                    <img src="thumb/300x200x1x90/<?=_upload_tintuc_l.$tinmoi[$i]['photo']?>"  onError="this.src='http://placehold.it/300x200';"  />
                </div>
                <div class="item_content">
                    <h3><?=catchuoi($tinmoi[$i]['ten'],60)?></h3>
                </div>
                <div class="clear"></div>
            </div>
        <?php }?>
    </div>
</div> 

<div class="div_left">
    <div class="tieude_left mb-25"><span>Fanpage</span></div>
    <div class="nd_fb">
         <div class="fb-page" data-href="<?=$company['fanpage']?>" data-tabs="timeline"  data-height="420" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
     </div>
</div>
