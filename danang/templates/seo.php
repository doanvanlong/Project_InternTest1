<?php 
	include "templates/url.php";
	$seo_time = time() - 60*60*24*90;
 ?>
		<div class="widget" style="margin:10px">
	        <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
	          <b style="float: left;margin: 8px 0 0 8px">Nội dung SEO</b>
	          <b style="float: right;margin: 8px 10px 0 8px">SEO GOOGLE được chuyên gia SEO Công ty Đà Nẵng WEB update ngày : <?=date('d/m/Y',$seo_time)?></b>
	        </div>
	        <div class="formRow">
			    <p class="button blueB nhapnhay button_huongdan" onclick="return viewModal('modal-huongdan')">Xem hướng dẫn</p>
			    <b class="txt1" > Xem hướng dẫn để hiểu cách cập nhật nội dung cho phần SEO. Để website quý khách có kết quả SEO trên Google tốt nhất!</b>
	        </div>
	        <div class="formRow">
			      <p class="button blueB nhapnhay button_taoseo" onclick="return taoSEO()">Tạo SEO TỰ ĐỘNG</p>
			    <b class="txt1"> Nếu bạn không am hiểu về SEO có thể nhấn nút TẠO SEO để có kết quả lên TOP từ khóa tốt hơn !</b>
	        </div>
		    <div class="formRow">
	            <label>Tên bài viết</label>
	            <div class="formRight" id="tenbaiviet">
	                <?=@$item['ten']?>
	            </div>
	            <div class="clear"></div>
	        </div>
		    <div class="formRow">
	            <label>Link url</label>
	            <div class="formRight mr-5 d-flex justify-space-between align-item-center" >
                	<div id="url_txt"><span id="url_start"></span><span id="url_middle"><?=(isset($item['tenkhongdau']))?$item['tenkhongdau']:'ten-bai-viet'?></span><span id="url_middle_input"><input type="text" value="<?=@$item['tenkhongdau']?>"  name ="link_url" title="Nội dung link dùng để SEO"  placeholder="dinh-dang-ten-khong-dau"  /></span><span id="url_end" ></span></div>
                	<div class="w-bt">
                		<span class="button border-none" id="fixUrl"  onclick="fixUrl()">Chỉnh sửa</span>
	                	<span class="button border-none d-none" id="okUrl" onclick="okUrl()">ok</span>
	                	<?php if(isset($item)){ ?>
			            	<a href="<?=$web.$com.'/'.$item['tenkhongdau'].$duoi ?>" target="_blank" class="button blueB border-none" >Xem</a>
			            <?php } ?>
                	</div>
	            </div>
	            <div class="clear"></div>
	        </div>
	 		<div class="formRow">
	            <label>Title</label>
	            <div class="formRight mr-5 d-flex justify-space-between align-item-center">
	                <input type="text" value="<?=@$item['title']?>" id="title" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" /><input readonly="readonly" type="text" style="width:45px; text-align:center;" name="des_char_tt" id="des_char_tt" value="70" /> 
	            </div>
	            <div class="clear"></div>
	        </div>
	        
	        <div class="formRow">
	            <label>Từ khóa</label>
	            <div class="formRight">
	                <input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho bài viết" class="tipS" />
	            </div>
	            <div class="clear"></div>
	        </div>
	        
	        <div class="formRow">
	            <label>Description:</label>
				<div class="formRight">
	                <textarea rows="4" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS description_input" name="description" id="description"><?=@$item['description']?></textarea>
	                <input readonly="readonly" type="text" style="width:45px; margin-top:10px; text-align:center;" name="des_char" id="des_char" value="160" /> <b>ký tự (Tốt nhất là 68 - 160 ký tự)</b>
	            </div>
	            <div class="clear"></div>
	        </div>
	    </div>
	    <div class="modal" id="modal-huongdan">
	    	<div class="modal-bg">
	    		<div class="modal-content">
	    			<div class="modal-close">&times;</div>
	    			<div class="modal-img">
	    				<img src="images/hd-seo.png" alt="">
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <style>
			.modal{
				position: fixed;
				left: 0;
				top: 0;
				right: 0;
				bottom: 0;
				z-index: 9999999;
				display: none;
			}
			.modal.active{
				display: block;
				animation-name: fadeIn;
				animation-duration: 1s; 
			}
			.modal-bg{
				background: rgba(0,0,0,0.3);
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.modal-content{
				width: 90%;
			}
			.modal-close{
				position: absolute;
				top: 0;
				right: 0;
				color:#fff;
				font-size: 60px;
				padding: 30px;
				background: rgba(0,0,0,0.3);   
				border-radius: 0 0 0 50px;
				cursor: pointer;
			}
			.modal-img{
				width: 100%;
				height: 100%; 
				text-align: center;
			}
			.modal-img img{
				max-width: 100%;
				max-height:  100%;
			}
	    	#tenbaiviet{
	    		padding: 4px 0px;
	    	}
	    	.d-flex{
	    		display: flex !important;
	    	}
	    	.justify-space-between{
	    		justify-content: space-between;
	    	}
	    	.align-item-center{
	    		align-items: center;
	    	}
	    	#url_txt{
	    		display: inline-block;
	    		width: calc(100% - 155px);
	    	}
	    	#url_txt span{
	    	}
	    	.w-bt{
	    		width: 155px;
	    		text-align:right;
	    		margin-right: -12px;
	    	}
	    	#des_char_tt{
	    		margin-right: -12px;
	    	}
	    	#url_middle_input{
				width: 600px !important;
				padding:0 15px 0 5px;
				display: none;
	    	}
    	 	.txt1{
			    color: #b80000;margin: 8px 10px 0px 0px;
			}
			.button_huongdan,.button_taoseo{
				margin-right: 4px;
			    width: 142px;
			    text-align: center;
			    padding: 7px 10px !important;
			}
			.border-none{border:none;}
			.inline-block{display: inline-block;}
			.d-block{display: block;}
			.d-none{
				display: none;
			}
			.mr-5{}
	    </style>
	    <script>
	    	$(document).ready(function(){
	    		$('.modal .modal-close').click(function () {
	    			$('.modal').removeClass('active');
	    		});
	    		$('.modal .modal-bg').click(function () {
	    			$('.modal').removeClass('active');
	    		});
	    	});
	    	function viewModal(id){
	    		if(!$('#'+id).hasClass('active')){
	    			$('#'+id).addClass('active');
	    		}
	    	}
	    </script>