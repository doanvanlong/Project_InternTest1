<div class="row">
<?php foreach($product as $v){ ?>
<div class="col-lg-4 col-sm-4 col-12 mb-30">
    <div class="item item_video">
        <div class="item_img phong_to">
            <a data-fancybox="video" href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($v['link'])?>" rel="video" title="<?=$v['ten']?>"><img src="http://img.youtube.com/vi/<?=getYoutubeIdFromUrl($v['link'])?>/0.jpg" alt="<?=$v['ten']?>"></a>
        </div>
        <h3 class="item_name"><a data-fancybox="video" href="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($v['link'])?>" rel="video" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
    </div>
</div>
<?php }?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="mb-30"></div>