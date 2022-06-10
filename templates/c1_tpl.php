<?php 
	$d->reset();
	$sql="select ten$lang as ten,id,tenkhongdau from #_product_danhmuc where hienthi=1 and type='sanpham' and noibat=1 order by stt,id desc";
	$d->query($sql);
	$rs_cate=$d->result_array();
?>
 <div id="in_video"></div>
<?php foreach($rs_cate as $k=>$v){?>
<div class="w_danhmuc" >
    <div class="wapper">
        <div class="tieude_giua"><h2><?=$v['ten']?></h2></div>
       
        <div class="bx_ww_content load_page_<?=$v['id']?>" data-rel="<?=$v['id']?>" ></div>
    </div>
</div>
<?php }?>
