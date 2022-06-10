
<h2 class="tieude_page"><span><b><?=$title_cat?></b></span></h2>
<div class="row">
<?php foreach($tintuc as $v){ ?>
<div class="col-lg-4 col-sm-6 col-12 mb-30">
    <div class="item item_thanhvien">
        <a href="don-vi-thanh-vien/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"></a>
        <div class="item_img phong_to vien_trong">
                <img src="thumb/480x320x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/480x320';" />
        </div>
        <h2 class="item_name"><?=$v['ten']?></h2>
        <div class="item_info">
            <div><b>Người liên hệ</b>: <span><?=$v['daidien']?></span></div>
            <div><b>Số điện thoại</b>: <span><?=$v['dienthoai']?></span></div>
            <div><b>Fax</b>: <span><?=$v['fax']?></span></div>
            <div><b>Email</b>: <span><?=$v['email']?></span></div>
            <div><b>Địa chỉ</b>: <span><?=$v['diachi']?></span></div>
        </div>
    </div><!---END .item-->
</div>
<?php }?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
