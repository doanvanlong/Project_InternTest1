<h2 class="tieude_page text-center"><span><b><?=$title_cat?></b></span></h2>
<div class="row">
<?php foreach($tintuc as $v){ ?>
<div class="col-lg-4 col-sm-6 col-12 mb-30">
    <div class="item item_news border_hover bg_new_time">
        <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html""></a>
        <div class="item_img phong_to hover_sang">
            <img src="thumb/585x300x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/585x300';"  /> 
        </div>
        <div class="new_time">
            <span class="day"><?=date('d',$v['ngaytao'])?></span>
            <span class="month"><?=date('M',$v['ngaytao'])?></span>
        </div>
        <h3 class="item_name text-center"><?=$v['ten']?></h3>
    </div>
</div>
<?php }?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
 <div class="mb-30"></div>
 