<?php
	
	$d->reset();
	$sql="select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='doitac' order by stt,id desc";
	$d->query($sql);
	$doitac=$d->result_array();

    $d->reset();
    $sql="select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='khach-hang' order by stt,id desc limit 0,20";
    $d->query($sql);
    $khachhang=$d->result_array();

?>
<div class="w_dichvu" id="w_doitac">
    <div class="container">
        <div class="tieude_gc mt-0"><span>Đối tác và khách hàng</span></div>
        <div class="slick_marquee">
            <?php for($i=0;$i<count($doitac);$i++){ ?>
                <div>
                    <div class="item_dtac">
                        <a href="<?=$doitac[$i]['link']?>" title="<?=$doitac[$i]['link']?>" target="_blank">
                            <img src="<?=_upload_hinhanh_l.$doitac[$i]['photo']?>" alt="<?= $doitac[$i]['ten']?>"  onError="this.src='http://placehold.it/150x90';" />
                        </a>
                    </div>
                </div>
            <?php } ?>
             <?php for($i=0;$i<count($khachhang);$i++){ ?>
                <div>
                    <div class="item_dtac">
                        <a href="<?=$khachhang[$i]['link']?>" title="<?=$khachhang[$i]['link']?>" target="_blank">
                            <img src="<?=_upload_hinhanh_l.$khachhang[$i]['photo']?>" alt="<?= $khachhang[$i]['ten']?>"  onError="this.src='http://placehold.it/150x90';" />
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

