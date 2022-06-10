<script language="javascript"> 
    function doEnter2(evt){
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch2(evt);
	}
	}
	function onSearch2(evt) {
			var keyword2 = document.getElementById("keyword2").value;
			if(keyword2=='' || keyword2=='<?=_nhaptukhoatimkiem?>...')
			{
				alert('<?=_chuanhaptukhoa?>');
			}
			else{
				location.href = "tim-kiem.html&keyword="+keyword2;
				loadPage(document.location);
			}
		}
</script>
<!--Tim kiem-->

<div class="header"><a href="javascript:void(0)" class="action_menu">
    <span class="s1"></span>
    <span class="s2"></span>
    <span class="s3"></span>
</a>
</div>
<nav id="menu_mobi" class="menu_overlay">
    <!-- <div class="text-center caption_menu">Menu</div> -->
    <ul class="pt-4" style="background-color:#f8f8f8">
<!--         
    	<li id="search_mobi">
            <input type="text" name="keyword2" id="keyword2" onKeyPress="doEnter2(event,'keyword2');" value="<?=_nhaptukhoatimkiem?>..." onclick="if(this.value=='<?=_nhaptukhoatimkiem?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?=_nhaptukhoatimkiem?>...'}">
            <i class="fa fa-search" aria-hidden="true" onclick="onSearch2(event,'keyword2');"></i>
    	</li> -->
        <!---END #search-->
        
        <li class="no-border">
            <a class="pl-4 a_menu_mobile ac <?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href="index.html"><?=_trangchu?></a>
            
            <?php /* ?>
            <div class="lienket_nn">
                <a href="index.php?com=ngonngu&lang="><img src="images/vi.png" alt="Tiếng Việt" /></a>
                <a href="index.php?com=ngonngu&lang=en"><img src="images/en.png" alt="Tiếng Anh" class="mr-0" /></a>
            </div>
            <?php */ ?>
        </li>
        
       <li><a class="pl-4 a_menu_mobile ac <?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html"><?=_gioithieu?></a></li>

        <li><a class="pl-4 a_menu_mobile ac <?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?></a></li>

        <li><a class="pl-4 a_menu_mobile ac <?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc.html">Tin tức</a></li>

        <li><a class="pl-4 a_menu_mobile ac <?php if($_REQUEST['com'] == 'tuyen-dung') echo 'active'; ?>" href="tuyen-dung.html">Tuyển dụng</a></li>
         <li><a class="pl-4 a_menu_mobile ac <?php if($_REQUEST['com'] == 'he-thong-cua-hang') echo 'active'; ?>" href="he-thong-cua-hang.html">Hệ thống cửa hàng</a></li>
        
        <li class="last"><a class="pl-4 a_menu_mobile ac <?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html"><?=_lienhe?></a></li>
    </ul>
</nav>