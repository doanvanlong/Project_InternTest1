<?php	

	/*$d->reset();
	$sql_contact = "select noidung$lang as noidung,mota$lang as mota from #_about where type='footer' limit 0,1";
	$d->query($sql_contact);
	$company_contact = $d->fetch_array();*/

	$d->reset();
    $sql="select ten$lang as ten,tenkhongdau,id from #_news where type='ho-tro-khach-hang' and hienthi=1 order by stt,id desc"; 
    $d->query($sql);
    $hotro=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,tenkhongdau,id from #_news where type='dich-vu-khach-hang' and hienthi=1 order by stt,id desc"; 
    $d->query($sql);
    $dichvu=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,link from #_slider where type='tag-seo' and hienthi=1 order by stt,id desc"; 
    $d->query($sql);
    $tagseo=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,link,id,photo from #_slider where hienthi=1 and type='social' order by stt,id desc";
    $d->query($sql);
    $social=$d->result_array();
?>
<div id="footer">
	<div class="container">
        <div class="row">
           
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="tt_footer">
                    <?=_hotrokhachhang?>
                     <span class="chan_footer"></span>   
                </div>
                <ul class="list-footer">
                    <?php foreach ($hotro as $k => $v) {?>
                        <li><a href="ho-tro-khach-hang/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp; <?=$v['ten']?></a></li>
                    <?php }?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="tt_footer">
                    <?=_dichvukhachhang?>
                     <span class="chan_footer"></span>    
                </div>
                <ul class="list-footer">
                    <?php foreach ($dichvu as $k => $v) {?>
                        <li><a href="dich-vu-khach-hang/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp; <?=$v['ten']?></a></li>
                    <?php }?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="tt_footer">
                    Tags SEO
                     <span class="chan_footer"></span>    
                </div>
                <ul class="list-footer">
                    <?php foreach ($tagseo as $k => $v) {?>
                        <li><a href="<?=$v['link']?>" title="<?=$v['ten']?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp; <?=$v['ten']?></a></li>
                    <?php }?>
                </ul>
            </div>
             <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="tt_footer">
                    <?=_dangkynhantin?>
                 <span class="chan_footer"></span>    
                </div>
                <div class="form_nhantin">
                    <?php include _template."layout/dangkynhantin.php";?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="container_mapweb">
            <ul class="map_web">
                <li><a  href="index.html">Trang chủ</a></li>
                 <li><a  href="gioi-thieu.html"><?=_gioithieu?></a></li>
                <li><a  href="san-pham.html"><?=_sanpham?></a>
                </li>
                
                <li><a  href="khuyen-mai.html"><?=_khuyenmai?></a></li>
                <li><a href="album.html">Album</a></li>
                
                <li><a href="tin-tuc.html"><?=_tintuc?></a></li> 
                <li><a href="bang-gia.html"><?=_banggia?></a></li>
                <li ><a href="lien-he.html"><?=_lienhe?></a></li>
            </ul> 
            <div class="clearfix"></div>
        </div>
        <span class="chan_footer2"></span>
        <div class="text-center contact_footer">
            <div class="row">
                <div class="col-lg-4  col-md-4 col-sm-4 col-xs-12 vh-center">
                    <div class="tenct_footer"><?=$company['ten']?></div>
                </div>
                <div class="bor col-lg-5  col-md-5 col-sm-5 col-xs-12">
                    <div class="itemf"><i class="fa fa-map-marker"></i><span>Địa chỉ: <?=$company['diachi']?></span></div>
                    <div class="itemf"><i class="fa fa-phone"></i><span>Điện thoại: <?=$company['dienthoai']?></span></div>
                    <div class="itemf"><i class="fa fa-envelope"></i><span>Email: <?=$company['email']?></span></div>
                    <div class="itemf"><i class="fa fa-globe"></i><span>Website: <?=$company['website']?></span></div>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-3 col-xs-12" id="social_footer">
                    <?php foreach($social as $k=>$v){?>
                      <a href="<?=$v['link']?>" title="<?=$v['ten']?>"><img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>"></a>
                  <?php }?>
                </div>
            </div>
        </div>
	</div>  
</div><!---END #footer-->    
 <div class="copy">Copyright 2018 by <span><?=$company['copyright']?></span>. All rights reserved.</div>


