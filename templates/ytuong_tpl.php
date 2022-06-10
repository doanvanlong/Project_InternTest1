<?php 
$d->reset();
$sql="select ten$lang as ten,mota$lang as mota, tenkhongdau, icon from #_news_danhmuc where hienthi=1 and type='y-tuong-noi-that' and noibat=1  order by stt,id desc limit 0,5";
$d->query($sql);
$ar_ytuong = $d->result_array();


 ?>
<h2 class="tieude_page text-center"><span><b><?=_ytuongnoithat?></b></span></h2>
<div class="mb-30">
    <div class="list_ytuong">
            <div class="list_ytuong_img <?php if(!isset($_GET['id_danhmuc'])) echo 'active' ;?>">
                <a href="y-tuong-noi-that.html" title="<?=$ar_ytuong[$i]['ten']?>"></a>
                <img src="images/icon_all.png" alt="<?=_ytuongnoithat?>"  height="35" />
                <h2><?=_tatcaytuong?></h2>
            </div>
        <?php for($i = 0,$i_max = count($ar_ytuong) ;$i< $i_max ; $i++){ ?>
            <div class="list_ytuong_img <?php if(isset($_GET['id_danhmuc']) && $_GET['id_danhmuc'] == $ar_ytuong[$i]['tenkhongdau'] ) echo 'active' ;?>">
                <a href="y-tuong-noi-that/<?=$ar_ytuong[$i]['tenkhongdau']?>" title="<?=$ar_ytuong[$i]['ten']?>"></a>
                <img src="<?=_upload_tintuc_l.$ar_ytuong[$i]['icon']?>" alt="<?=$ar_ytuong[$i]['ten']?>"  height="35" />
                <h2><?=$ar_ytuong[$i]['ten']?></h2>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
<?php foreach($tintuc as $v){ ?>
<div class="col-lg-4 col-sm-6 col-12 mb-30">
    <div class="item item_news border_hover bg_new_time">
        <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html""></a>
        <div class="item_img phong_to hover_sang">
            <img src="thumb/480x320x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/480x320';"  /> 
        </div>
        <div class="new_time">
            <span class="day"><?=date('d',$v['ngaytao'])?></span>
            <span class="month"><?=date('M',$v['ngaytao'])?></span>
        </div>
        <h3 class="item_name"><?=$v['ten']?></h3>
        <div class="item_content">
            <?=catchuoi($v['mota'],150)?><span class="day">
        </div>
    </div>
</div>
<?php }?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div class="mb-30"></div>