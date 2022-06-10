<?php if($_GET['com']=='cong-trinh'){?>
    <div class="tieude_giua"><span><?=$title_cat?></span></div>
    <div class="wap_item">
    <?php foreach($tintuc as $v){ ?>
        <div class="box_congtrinh">
            <div class="img_ct"><a href="<?=$com?>/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>">
            <img src="thumb/380x270x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$product[$i]['ten']?>" /></a></div>
            <div class="desc_nx">
                <div class="w_desc">
                    <h3 class="sp_name"><a href="<?=$com?>/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
                    <p><?=date("d/m/Y",$v['ngaytao'])?></p>
                </div>
            </div>
        </div><!---END .item-->
    <?php } ?>
    </div><!---END .wap_item-->
    <div class="clear"></div>
    <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<?php }else{?>
<div class="box_container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 col-right">
            <div class="tieude_giua"><span><?=$title_cat?></span></div>
            <?php foreach($tintuc as $v){ ?>
                <div class="col-md-8 col-sm-8 col-xs-12  ">
                    <div class="tt-download">
                        <h2 class="title-article"><a href="<?=$com?>/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></h2>
                    </div>
                </div>
                <!-- <hr class="line-blog"> -->
            <?php }?>
            <div class="clear"></div>
            <div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
        </div>
    </div>
</div>
<?php }?>