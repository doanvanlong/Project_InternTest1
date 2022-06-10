<div class="tieude_giua"><h2><?=$title_cat?></h2></div>
<div id="tabs" class="tab_product">   
            <ul id="ultabs1" class="ulcate">
            	<?php 
					$d->reset();
					$sql="select ten$lang as ten,tenkhongdau,id from #_news_danhmuc where hienthi=1  and type='duan'order by stt asc";
					$d->query($sql);
					$danhmuc_nb=$d->result_array();
					for($i=0;$i<count($danhmuc_nb);$i++){
				?>				 
                <li class="li_cate" data-vitri="<?=$i?>"><?=$danhmuc_nb[$i]['ten']?></li>
                <?php }?>
            </ul>
            <div style="clear:both"></div>             
            <div id="content_tabs1">
            	<?php for($i=0;$i<count($danhmuc_nb);$i++){?>
				<div class="tab1" data-vitri="<?=$danhmuc_nb[$i]['id']?>">
					<div class="wap_item">
						<?php
					$d->reset();
					$sql = "select id,ten$lang as ten,tenkhongdau,photo,id_danhmuc from #_news where hienthi=1 and type='duan' and id_danhmuc='".$danhmuc_nb[$i]['id']."' order by stt,id desc";		
					$d->query($sql);
					$tintuc = $d->result_array();
					for($j=0;$j<count($tintuc);$j++){
						$d->reset();
						$sql="select ten$lang as ten,id from #_news_danhmuc where hienthi=1 and type='duan' and id='".$tintuc[$j]['id_danhmuc']."' order by stt,id desc";
						$d->query($sql);
						$da1=$d->fetch_array();
					?>
						<div class="box_duan wow fadeIn" data-wow-delay="0.<?=($j+1)?>s">
                            <div class="img_duan"><a href="<?=$com?>/<?=$tintuc[$j]['tenkhongdau']?>.html" title="<?=$tintuc[$j]['ten']?>"><img src="thumb/370x260x1x90/<?php if($tintuc[$j]['photo']!=NULL)echo _upload_tintuc_l.$tintuc[$j]['photo'];else echo 'images/noimage.png';?>" alt="<?=$tintuc[$j]['ten']?>" /></a></div>
                            <div class="overlay-box">
                                <div class="line-box"></div>
                                <div class="over-content">
                                    <div class="subtitle"><?=$da1['ten']?></div>
                                    <h4><a href="<?=$com?>/<?=$tintuc[$j]['tenkhongdau']?>.html" title="<?=$tintuc[$j]['ten']?>"><?=$tintuc[$j]['ten']?></a></h4>
                                    <div class="link-box"><a href="<?=$com?>/<?=$tintuc[$j]['tenkhongdau']?>.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                                </div>
                                
                                
                            </div>
                        </div>
					<?php }?>
					<div class="clear"></div>
					</div>
                </div> 
				<?php }?>   
	</div><!---END #tabs-->	
</div>



