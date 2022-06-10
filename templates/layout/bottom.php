<?php 
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo,mota$lang as mota from #_news where hienthi=1 and type='tuvan' and noibat=1 order by stt,id desc";
	$d->query($sql);
	$m_tuvan=$d->result_array();
?>


<div class="w_tuvan">
	<div class="wapper">
       <div class="tt_title"><h2>Tư vấn dịch vụ</h2></div>
            <div class="sl_tuvan">   
                <?php foreach($m_tuvan as $k=>$v){?>
                    <div>    
                        <div class="big_tt wow fadeIn" data-wow-delay="0.<?=($k+1)?>s">
                            <div class="img_tt"><a class="link"></a><a href="tu-van/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><img src="thumb/275x165x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"></a></div>
                            <h3><a href="tu-van/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
                            <div class="mta_tt"><?=catchuoi($v['mota'],130)?></div>
                            <a class="xt" href="tu-van/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>">XEM THÊM</a>
                        </div>
                     </div>
                 <?php }?>
            </div>
    </div>
</div>