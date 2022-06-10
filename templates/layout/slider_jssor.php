

<div class="">
    <?php 
        $d->reset();
        $sql_slider = "select ten$lang as ten,link,photo,mota$lang as mota from #_slider where hienthi=1 and type='slider' order by stt,id desc";
        $d->query($sql_slider);
        $slider=$d->result_array();
    ?>
    <div class="div_slider">
        <div id="slider">
            <?php for($i=0;$i<count($slider);$i++){ ?>
                 <a href="<?=$slider[$i]['link']?>" target="_blank">
                    <div class="slider-img">
                        <img src="thumb/1920x640x1x90/<?= _upload_hinhanh_l.$slider[$i]['photo']  ?>" alt="<?=$slider[$i]['ten']?>" />
                    </div>
                 </a>
            <?php } ?>
        </div> 
    </div>
</div>
