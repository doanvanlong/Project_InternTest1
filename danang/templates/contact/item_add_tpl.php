<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li><a href="index.php?com=contact&act=man&type=<?=$_GET['type']?>"><span>Liên hệ</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Nội dung</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=contact&act=save&type=<?=$_GET['type']?><?php if($_REQUEST['curPage']!='') echo'&curPage='.$_REQUEST['curPage'];?>" method="post" enctype="multipart/form-data">
	

     <div class="widget">
         <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Thông tin thư</h6>
        </div>

       <div id="info" class="tab_content">
          <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
            
             
        <div class="formRow <?=(!$config_s['ten'])?'none':''?>">
            <label>Tên:</label>
            <div class="formRight">
                <label><?=@$item['ten']?></label>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow <?=(!$config_s['dienthoai'])?'none':''?>">
            <label>Số điện thoại:</label>
            <div class="formRight">
                <label><?=@$item['dienthoai']?></label>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow <?=(!$config_s['email'])?'none':''?>">
            <label>Email:</label>
            <div class="formRight">
                <label><?=@$item['email']?></label>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow <?=(!$config_s['sanpham'])?'none':''?>">
            <label>Tên sản phẩm:</label>
            <div class="formRight">
                <label><?=@$item['sanpham']?></label>
            </div>
            <div class="clear"></div>
        </div>  

        <div class="formRow <?=(!$config_s['donvi'])?'none':''?>">
            <label>Số lượng:</label>
            <div class="formRight">
                <label><?=@$item['donvi']?></label>
            </div>
            <div class="clear"></div>
        </div>  

        
        <div class="formRow none">
            <label>Ngày giao hàng:</label>
            <div class="formRight">
                <label><?=Date('d-m-Y',$item['ngaygiao'])?></label>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow none">
            <label>Thanh toán:</label>
            <div class="formRight">
                <label><?=($item['ghichu']==0)?'Trả thẳng':'Trả góp'?></label>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow">
            <label>Ngày gửi:</label>
            <div class="formRight">
                <label><?=Date('d-m-Y H:i:s',$item['ngaytao'])?></label>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow <?=(!$config_s['noidung'])?'none':''?>">
            <label>Nội dung:</label>
            <div class="formRight">
                <label><?=$item['noidung']?></label>
            </div>
            <div class="clear"></div>
        </div>
           <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">
            <input type="checkbox" name="hienthi" id="check1" value="1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
            <label for="check1">Đã đọc</label>           
          </div>
          <div class="clear"></div>
        </div>
        

        <div class="formRow">
            <div class="formRight">
                <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
            </div>
            <div class="clear"></div>
        </div>

       </div>
 

    </div>

</form>   
