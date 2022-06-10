<div class="item_news_detail">
    <h2 class="tieude_detail  text-center"><?=$tintuc_detail['ten']?></h2>
    <div class="addthis_native_toolbox"></div>
    
    <div>
        <div class="slider-main">
            <div class="main_img">
                <img src="thumb/1170x600x1x90/<?=_upload_tintuc_l.$tintuc_detail['photo']?>" alt="<?=$tintuc_detail['ten']?>" onError="this.src='http://placehold.it/1170x600';" />
            </div>
            
            <?php foreach ($hinhkhac as $value) { ?>
                <div class="main_img">
                    <img src="thumb/1170x600x1x90/<?=_upload_hinhthem_l.$value['photo']?>" alt="<?=$tintuc_detail['ten']?>" onError="this.src='http://placehold.it/1170x600';" />
                </div>
            <?php } ?>
        </div>
        <div class="slider-sub">
            <div class="sub_img">
                <img src="thumb/200x100x1x90/<?=_upload_tintuc_l.$tintuc_detail['photo']?>" alt="<?=$tintuc_detail['ten']?>" />
            </div>
            <?php foreach ($hinhkhac as $value) { ?>
                <div class="sub_img">
                    <img src="thumb/200x100x1x90/<?=_upload_hinhthem_l.$value['photo']?>" alt="<?=$tintuc_detail['ten']?>" />
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="content">
        <?=$tintuc_detail['noidung']?>
    </div>
    
</div>   
<div class="mb-30">
    <div class="tieude_gc "><span class="text-dark"><?=_cacbaivietkhac?></span></div>
    <div class="row">
    <?php foreach($tintuc as $v){ ?>
    <div class="col-lg-4 col-sm-6 col-12 mb-30">
        <div class="item item_congtrinh">
            <a href="cong-trinh/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"></a>
            <div class="item_img phong_to vien_trong">
                    <img src="thumb/585x300x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/585x300';" />
            </div>
            <h2 class="item_name"><?=$v['ten']?></h2>
            <div class="item_info">
                <div><b><?=_ngayhoanthanh?></b>: <span><?=date('d-m-Y',$v['ngaytao'])?></span></div>
            </div>
        </div><!---END .item-->
    </div>
    <?php }?>
    </div>
</div>

