<div class="row">
<?php foreach($tintuc as $v){ ?>
<div class="col-lg-4 col-sm-6 col-12 mb-30">
    <div class="item item_news">
        <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html""></a>
        <div class="item_img phong_to hover_sang vien_trong">
            <img src="thumb/480x320x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/480x320';"  /> 
        </div>
        <h3 class="item_name text-center"><?=$v['ten']?></h3>
    </div>
</div>
<?php }?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="mb-30"></div>