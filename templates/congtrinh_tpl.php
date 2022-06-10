
<h2 class="tieude_page text-center"><span><b><?=$title_cat?></b></span></h2>
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
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="mb-30"></div>