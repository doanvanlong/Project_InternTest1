<div class="row">
<?php foreach($tintuc as $v){ ?>
<div class="col-lg-4 col-sm-6 col-12 mb-30">
    <div class="item item_news border_hover bg_new_time " >
        <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html""></a>
        <div class="item_img hover_sang">
            <img src="thumb/480x320x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/480x320';"  /> 
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
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="mb-30"></div>