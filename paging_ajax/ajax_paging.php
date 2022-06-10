<?php
	include ("../ajax/ajax_config.php");	
	include_once "class_paging_ajax.php";
	
	if(isset($_POST["page"]))
    {
		
		$paging = new paging_ajax();
		$paging->class_pagination = "pagination";
		$paging->class_active = "active";
		$paging->class_inactive = "inactive";
		$paging->class_go_button = "go_button";
		$paging->class_text_total = "total";
		$paging->class_txt_goto = "txt_go_button";
		$paging->page = $_POST["page"];
		$paging->per_page = 8; 		
		$paging->text_sql = "select id,ten$lang as ten,tenkhongdau,gia,photo,giakm from table_product where hienthi=1 and id_danhmuc=".$_POST["id_danhmuc"]." and type='sanpham' and noibat=1 order by stt asc";
		$product = $paging->GetResult();
		$message = '';
		$paging->data = "".$message."";
    } 
?>
	<div class="wap_item">
	<?php foreach($product as $k=>$v){ ?>
    	<div class="item wow fadeIn" data-wow-delay="0.<?=($k+1)?>s" >
            <div class="sp_img"><a href="san-pham/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>">
            <img src="thumb/270x270x2x90/<?php if($v['photo']!=NULL) echo _upload_sanpham_l.$v['photo']; else echo 'images/noimage.png';?>" alt="<?=$v['ten']?>" /></a>
            </div>
            <h3 class="sp_name"><a href="san-pham/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
            <div class="sp_gia">
				<?php if($v['giakm']!=0){?>
                     <div class="gia"> <?=number_format($v['gia'],0, ',', '.').'VNĐ'; ?></div>
                     <div class="giakm"><?=number_format($v['giakm'],0, ',', '.').'VNĐ'; ?></div>
                     <div class="clear"></div>
                <?php } elseif($v['giakm']==0 && $v['gia']!=0){?>
                    <div class="motgia">Giá: <span><?=number_format($v['gia'],0, ',', '.').'VNĐ'; ?></span></div>
                <?php }else{?>
                    <div class="motgia">
                      Giá liên hệ: <span><?=$company['fax']?></span>
                    </div>
                <?php }?>
            </div>
    </div><!---END .item-->   
    <?php }?>
	</div>

<?=$paging->Load(); ?>