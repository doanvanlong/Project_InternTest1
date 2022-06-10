<div class="item_news_detail">
    <h2 class="tieude_detail"><?=$tintuc_detail['ten']?></h2>
    <?php if($_GET['com'] == 'tin-tuc'){ ?>
    <div class="info">
        <span class="date"><?=_ngaydang?>: <?=make_date($tintuc_detail['ngaytao'],'/')?></span>
        <span class="date"><?=_luotxem?>: <?=$tintuc_detail['luotxem']?></span>
    </div>
    <?php } ?>
    <div class="content">
        <?=$tintuc_detail['noidung']?>
    </div>
    <div class="addthis_native_toolbox"></div>
    <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-numposts="5" data-width="100%"></div>
</div>
<br />
<?php if(count($tintuc)){ ?>
<div class="">
    <div class="tieude_detail mb-4"><span><?=_cacbaivietkhac?></span></div>
    <div class="row">
        <?php foreach($tintuc as $v){ ?>
        <div class="col-lg-4 col-sm-6 col-12 mb-30">
            <div class="item item_news border_hover bg_new_time">

                <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html""></a>
                <div class="item_img  hover_sang">
                    <img src="thumb/400x200x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/400x200';"  /> 
                </div>
                <div class="new_time">
                    <span class="day"><?=date('d',$v['ngaytao'])?></span>
                    <span class="month"><?=date('M',$v['ngaytao'])?></span>
                </div>
                <h3 class="item_name"><?=$v['ten']?></h3>
                <div class="item_content">
                    
                    <?=catchuoi($v['mota'],150)?>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php } ?>
<div class="mb-30"></div>

