<div class="box_container">
     <div class="w_1000">
        <div class="wpb_wrapper"><?=$title_cat?></div>
            <div class="wap_item">
                <?php foreach($tintuc as $v){ ?>
                    <div class="item">
                         <div class="sp_img"><a href="<?=$com?>/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>">
                         <div class="image-shader"></div>
                         <img src="thumb/330x250x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"></a></div>      
                        <h3 class="sp_name"><a href="<?=$com?>/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>      
                    </div>	
                <?php }?>
            </div>
            <div class="clear"></div>
            <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
    </div>
</div>
