<div class="tieude_gc">
	<span><?=_cuahang?></span> 
</div> 
<div class="row">
	<?php  for($i=0,$count  = count($sp_noibat); $i< $count; $i++){  ?>
		<div class="col-lg-3  col-md-4 col-sm-6 col-6 mb-30">
			<div class="item item_sanpham">
	            <div class="item_img phong_to">
	            	<a href="san-pham/<?=$sp_noibat[$i]['tenkhongdau']?>.html" title="<?=$sp_noibat[$i]['ten']?>">
	            		<img src="thumb/350x350x1x90/<?=_upload_sanpham_l.$sp_noibat[$i]['photo']?>" alt="<?=$sp_noibat[$i]['ten']?>"  onError="this.src='http://placehold.it/350x350';" />
	            	</a>
		            <div class="bg_xanh">
		            	<div class="cart">
				        	<button class="add-cart" onclick="return addCart1(<?=$sp_noibat[$i]['id']?>,'<?=$sp_noibat[$i]['ten']?>')" data-id="<?=$sp_noibat[$i]['id']?>" data-name="<?=$sp_noibat[$i]['ten']?>">
				        		<i class="fa fa-cart-plus"></i>
			        		</button> 
				        </div>
				        <div class="eye">
				        	<a href="san-pham/<?=$sp_noibat[$i]['tenkhongdau']?>.html"><i class="fa fa-eye"></i></a>
				        </div>
		            </div>
	            </div>
	            <h2 class="item_name"><a href="san-pham/<?=$sp_noibat[$i]['tenkhongdau']?>.html" title="<?=$sp_noibat[$i]['ten']?>"><?=$sp_noibat[$i]['ten']?></a></h2>
	            <div class="item_gia">
		          <?php 
		           	if($sp_noibat[$i]['giakm']!=0){
		           		echo '<span class="del-gia">'.number_format($sp_noibat[$i]['gia'],0, ',', '.').'<sup>đ</sup></span>';
		           		echo '<span class="gia-ban">'.number_format($sp_noibat[$i]['giakm'],0, ',', '.').'<sup>đ</sup></span>';
		           	}else{ 
		           		if($sp_noibat[$i]['gia']!=0){
		           			echo '<span class="gia-ban">'.number_format($sp_noibat[$i]['gia'],0, ',', '.').'<sup>đ</sup></span>';
		           		}else{
		           			echo '<a href="lien-he.html" class="gia-ban">'._lienhe.'</a>';
		           		}
		            }?>
		        </div>
		        
	        </div><!---END .item-->
		</div>
	<?php } ?>
</div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
