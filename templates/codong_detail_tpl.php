<div class="item_news_detail">
    <h2 class="tieude_detail"><?=$tintuc_detail['ten']?></h2>
    <div class="info">
        <span class="date"><?=_ngaydang?>: <?=make_date($tintuc_detail['ngaytao'],'/')?></span>
        <span class="date"><?=_luotxem?>: <?=$tintuc_detail['luotxem']?></span>
    </div>
    <div class="addthis_native_toolbox"></div>
    <div class="content">
        <?php if($tintuc_detail['file_tl'] != ''){ ?>
        Xem nội dung trong <a href="<?=_upload_files_l.$tintuc_detail['file_tl']?>">link đính kèm. </a>
        <?php } ?>
    </div>
    
</div>   
<div class="mb-30">
    <div class="tieude_gc"><span><?=_cacbaivietkhac?></span></div>
    <ul class="list_tin_khac">
        <?php foreach($tintuc as $v){ ?>
        <li>
            <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?=$v['ten']?></a>
        </li>
        <?php }?>
    </ul>
</div>


