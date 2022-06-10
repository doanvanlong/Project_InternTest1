
<?php	
	function get_main_danhmuc()
	{
		$sql_huyen="select * from table_product_danhmuc where type='".$_REQUEST['type']."' order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" data-placeholder="Chọn danh mục" class="main_select select_danhmuc chzn-select">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_danhmuc"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li><a href="index.php?com=product&act=man_list<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Danh mục</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_list<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

   <div class="widget">
     <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Nhập dữ liệu</h6>
      </div>
       <ul class="tabs">
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
           <?php foreach ($config['lang'] as $key => $value) { ?>
           <li>
               <a href="#content_lang_<?=$key?>"><?=$value?></a>
           </li>
           <?php } ?>
       </ul>

       <div id="info" class="tab_content">
          
		<div class="formRow">
			<label>Chọn danh mục 1</label>
			<div class="formRight">
			<?=get_main_danhmuc()?>
			</div>
			<div class="clear"></div>
		</div>
         
    <div class="formRow <?= (!$config_s['hinhanh'])?'none':'' ?>">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> <?=$config_s['size_anh']?>  <?=_format_duoihinh_l?> </div>
			</div>
			<div class="clear"></div>
		</div>
         <?php if($_GET['act']=='edit_list'){?>
		<div class="formRow <?= (!$config_s['hinhanh'])?'none':'' ?>">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_sanpham.$item['photo']?>"  alt="NO PHOTO" width="400" /></div>

			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>

    <div class="formRow">
      <label>Nổi bật : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>

      <div class="formRight">
        <input type="checkbox" name="noibat" id="check1" <?=(!isset($item['noibat']) || $item['noibat']==1)?'checked="checked"':''?> />
        </div>
		  <div class="clear"></div>
    </div>
          
    <div class="formRow">
      <label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
      <div class="formRight">
        <input type="checkbox" name="hienthi" id="check1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
        <label>Số thứ tự: </label>
        <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" original-title="Số thứ tự của danh mục, chỉ nhập số">
      </div>
      <div class="clear"></div>
    </div>

<?php include "templates/seo.php";?> 
        <div class="formRow">
            <div class="formRight">
                
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
                <a href="index.php?com=product&act=man_list<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='.$_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
            </div>
            <div class="clear"></div>
        </div>

       </div>
       <!-- End info -->
        <?php foreach ($config['lang'] as $key => $value) {
        ?>

       <div id="content_lang_<?=$key?>" class="tab_content">        
            <div class="formRow">
            <label>Tên bài viết</label>
            <div class="formRight">
                <input type="text" name="ten<?=$key?>" title="Nhập tên bài viết" id="ten<?=$key?>" class="tipS" value="<?=@$item['ten'.$key]?>" />
            </div>
            <div class="clear"></div>
        </div>  

         <div class="formRow ">
            <label>Mô tả:</label>
            <div class="formRight">
                <textarea  rows="8" cols="" title="Viết giới thiệu" class="tipS" name="mota<?=$key?>" id="mota<?=$key?>" placeholder="Bạn bắt buộc phải nhập phần mô tả này để SEO tốt hơn"><?=@$item['mota'.$key]?></textarea>
                <input readonly="readonly" type="text" style="width:45px; margin-top:10px; text-align:center;" name="des_char2" id="des_char2" value="300" /> <b>ký tự (Tốt nhất là 250 - 300 ký tự)</b><b style="color:#b80000"> - Chú ý : Bạn phải nhập phần Mô tả để có kết quả SEO tốt nhất trên Google </b>
            </div>
            <div class="clear"></div>
        </div>   

        <div class="formRow">
            <div class="formRight">
            	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
                 <a href="index.php?com=product&act=man_list<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='.$_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
            </div>
            <div class="clear"></div>
        </div>
       </div><!-- End content <?=$key?> -->
      
     <?php } ?>
 

    </div>
<input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
</form>   
