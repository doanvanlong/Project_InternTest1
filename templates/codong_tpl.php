<?php 

    $d->reset();
    $sql = "select photo from #_background where type='logo-list'";
    $d->query($sql);
    $logo_list = $d->fetch_array();
 ?>
<h2 class="tieude_page"><span><b><?=$title_cat?></b></span></h2>
<div class="">
<?php foreach($tintuc as $v){ ?>
    <div class="item_codong">
        <a href="<?=_upload_files_l.$v['file_tl']?>">
            <span><img src="<?=_upload_hinhanh_l.$logo_list['photo']?>" alt="<?=$company['ten']?>"></span>
            <b><?=date('d.m.Y',$v['ngaytao'])?></b>
            <span>&nbsp;<?=$v['ten']?></span>
        </a>
    </div>
<?php }?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
