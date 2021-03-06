
<script type="text/javascript">		
	$(document).ready(function() {
		$('.chonngonngu li a').click(function(event) {
			var lang = $(this).attr('href');
			$('.chonngonngu li a').removeClass('active');
			$(this).addClass('active');
			$('.lang_hidden').removeClass('active');
			$('.lang_'+lang).addClass('active');
			return false;
		});
	});
</script>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	    <li><a href="index.php?com=about&act=capnhat&type=<?=$_REQUEST['type']?>"><span>Nội dung</span></a></li>
                <li class="current"><a href="#" onclick="return false;">Cập nhật</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=about&act=save&type=<?=$_REQUEST['type']?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
        
        <ul class="tabs">
           <?php if($config_s['info']){ ?>
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
           <?php } ?>
           <?php foreach ($config['lang'] as $key => $value) { ?>
           <li>
               <a href="#content_lang_<?=$key?>"><?=$value?></a>
           </li>
           <?php } ?>
       </ul>
       
	<?php if($config_s['info']){ ?>
     <div id="info" class="tab_content">
         
		<div class="formRow <?=(!$config_s['hinhanh'])?'none':''?>">
            <label>Hình ảnh đại diện: </label>
            <div class="formRight">
                <?php if ($_REQUEST['act']=='capnhat') { ?>
                    	<img width="100" src="<?=_upload_hinhanh.@$item['photo']?>"><br>
                    <?php }?>
                    
                <input type="file" id="file" name="file" /><img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho sản phẩm (ảnh JPEG, GIF , JPG , PNG)">
                <span class="size_img"><?=$config_s['size_anh']?></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow <?=(!$config_s['link'])?'none':''?>">
            <label>Link liên kết</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['link']?>" name="link" title="Link liên kết" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        <?php if($config_s['seo']){ ?>
         <div class="formRow">
            <label>Title</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="formRow">
            <label>Từ khóa</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho sản phẩm" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="formRow">
            <label>Description:</label>
						<div class="formRight">
                <textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS description_input" name="description" id="description"><?=@$item['description']?></textarea>
                <input readonly="readonly" type="text" style="width:45px; margin-top:10px; text-align:center;" name="des_char" id="des_char" value="160" /> <b>ký tự (Tốt nhất là 68 - 160 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            <input type="checkbox" name="hienthi" id="check1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>           
          </div>
          <div class="clear"></div>
        </div>       
        <div class="formRow">
        <div class="formRight">
         <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
              <input type="hidden" name="type" id="type" value="<?=@$item['type']?>" />
            <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
        </div>
        <div class="clear"></div>
    </div>	
		
       </div>
       <?php } ?>
        
         <!-- End info -->
      <?php foreach ($config['lang'] as $key => $value) { ?>
       <div id="content_lang_<?=$key?>" class="tab_content ">   
            <div class="formRow <?= (!$config_s['ten'])?'none':'' ?>">
                <label>Tiêu đề</label>
                <div class="formRight">
                    <input type="text" class=""  name="ten<?=$key?>" title="Nhập tên sản phẩm" id="ten<?=$key?>" class="tipS" value="<?=@$item['ten'.$key]?>" />
                </div>
                <div class="clear"></div>
            </div>  

            <div class="formRow  <?= (!$config_s['mota'])?'none':'' ?>">
                <label>Mô tả ngắn:</label>
                <div class="formRight">
                    <textarea  rows="8" class="" cols="" title="Viết mô tả ngắn bài viết" class="tipS" name="mota<?=$key?>" id="mota<?=$key?>"><?=@$item['mota'.$key]?></textarea>
                </div>
                <div class="clear"></div>
            </div>  
            <div class="formRow  <?= (!$config_s['noidung'])?'none':'' ?>">
            <label>Nội dung chính: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
            <div class="formRight"><textarea class="ck_editor" name="noidung<?=$key?>" id="noidung<?=$key?>" rows="8" cols="60"><?=@$item['noidung'.$key]?></textarea>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <div class="formRight">
                
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div>
       </div><!-- End content <?=$key?> -->      
     <?php } ?>		
	</div>
    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" /> 
</form>   
