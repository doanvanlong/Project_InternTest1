<?php
  $d->reset();
  $sql_banner = "select photo$lang as photo from #_background where type='logo-desktop' limit 0,1";
  $d->query($sql_banner);
  $row_logo = $d->fetch_array();
?>
<div class="logo" style="padding:20px 5px"> <a href="#" target="_blank" onclick="return false;"> <img src="<?=_upload_hinhanh.$row_logo['photo']?>" style="max-width:100%;" alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav"> 
  <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>
  <li class="categories_li product_li <?php if($_GET['com']=='order' || $_GET['com']=='product') echo ' activemenu' ?>" id="menu1"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
   <ul class="sub">
      <?php phanquyen_menu('Danh mục cấp 1','product','man_danhmuc','san-pham'); ?>
      <?php phanquyen_menu('Danh mục cấp 2','product','man_list','san-pham'); ?>
      <?php phanquyen_menu('Quản lý sản phẩm','product','man','san-pham'); ?>
      <?php phanquyen_menu('Quản lý đơn hàng','order','man',''); ?>
    </ul>
  </li>
  
  <li class="categories_li news_li <?php if($_GET['com']=='news' && in_array($_GET['type'], array('tin-tuc'))) echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Tin tức</span><strong></strong></a>
        <ul class="sub">
            <?php //phanquyen_menu('Danh mục Tin tức','news','man_danhmuc','tin-tuc'); ?>
            <?php phanquyen_menu('Bài viết Tin tức','news','man','tin-tuc'); ?>
        </ul>
  </li>
  <li class="categories_li news_li <?php if($_GET['com']=='news' && in_array($_GET['type'], array('du-an'))) echo ' activemenu' ?>" id="menu_duan"><a href="" title="" class="exp"><span>Dự án</span><strong></strong></a>
        <ul class="sub">
            <?php //phanquyen_menu('Danh mục Tin tức','news','man_danhmuc','tin-tuc'); ?>
            <?php phanquyen_menu('Bài viết dự án','news','man','du-an'); ?>
        </ul>
  </li>
  <li class="categories_li news_li <?php if($_GET['com']=='news' && in_array($_GET['type'], array('tuyen-dung'))) echo ' activemenu' ?>" id="menu_duan"><a href="" title="" class="exp"><span>Tuyển dụng</span><strong></strong></a>
        <ul class="sub">
            <?php //phanquyen_menu('Danh mục Tin tức','news','man_danhmuc','tin-tuc'); ?>
            <?php phanquyen_menu('Bài viết tuyển dụng','news','man','tuyen-dung'); ?>
        </ul>
  </li>
  
  <li class="categories_li news_li <?php if($_GET['com']=='news' && in_array($_GET['type'], array('ho-tro-khach-hang','tuyen-dung','du-an'))) echo ' activemenu' ?>" id="menu_tt1"><a href="" title="" class="exp"><span>Bài viết khác</span><strong></strong></a>
        <ul class="sub">
            <?php //phanquyen_menu('Dự án','news','man','du-an'); ?>
            <?php phanquyen_menu('Hỗ trợ khách hàng','news','man','ho-tro-khach-hang'); ?>
            
            <?php //phanquyen_menu('Hỗ trợ khách hàng','news','man','ho-tro-khach-hang'); ?>
            <?php //phanquyen_menu('Lấy tin từ Vnexpress','vnexpress','man',''); ?>
        </ul>
  </li>
      <li class="categories_li gallery_li <?php if($_GET['com']=='anhnen' || $_GET['com']=='background' || $_GET['type']=='slider') echo ' activemenu' ?>" id="menu_qc"><a href="" title="" class="exp"><span>Hình ảnh - Banner</span><strong></strong></a>
           <ul class="sub">
            <?php phanquyen_menu('Logo desktop','background','capnhat','logo-desktop'); ?>
            <?php phanquyen_menu('Logo Mobile','background','capnhat','logo-mobile'); ?>
            <?php phanquyen_menu('Quản lý Slider','slider','man_photo','slider'); ?>
            <?php phanquyen_menu('Quản lý Slider đối tác','slider','man_photo','doi-tac'); ?>
            <?php phanquyen_menu('Banner Giới thiệu ','background','capnhat','gioi-thieu'); ?> 
            <?php phanquyen_menu('Banner Sản phẩm','background','capnhat','san-pham'); ?>
            <?php phanquyen_menu('Banner Hệ thống cửa hàng','background','capnhat','he-thong-cua-hang'); ?>
            <?php //phanquyen_menu('Banner Dự án','background','capnhat','du-an'); ?>
            <?php phanquyen_menu('Banner Tin tức ','background','capnhat','tin-tuc'); ?>
            <?php //phanquyen_menu('Banner Tuyển dụng ','background','capnhat','tuyen-dung'); ?>
            <?php phanquyen_menu('Banner Liên hệ','background','capnhat','lien-he'); ?>
            <?php //phanquyen_menu('Banner Hỗ trợ khách hàng','background','capnhat','ho-tro-khach-hang'); ?>
            <?php //phanquyen_menu('Banner Giỏ hàng','background','capnhat','giohang'); ?>
            <?php //phanquyen_menu('Banner Video','background','capnhat','video'); ?>
            <?php //phanquyen_menu('Cập nhật background','anhnen','capnhat','background'); ?>
     </ul>
    </li>
     <li class="categories_li about_li <?php if($_GET['com']=='about'  ||$_GET['com']=='video'  || (($_GET['com']=='slider') && (  $_GET['type']!='slider'|| $_GET['type'] == 'quang-cao' )) || $_GET['type'] == 'hinh-thuc-thanh-toan') echo ' activemenu' ?>" id="menu_t"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
    <ul class="sub">
      <?php phanquyen_menu('Giới thiệu','about','capnhat','gioi-thieu'); ?>
      <?php phanquyen_menu('Hệ thống cửa hàng','about','capnhat','he-thong-cua-hang'); ?>
      <?php // phanquyen_menu('Text footer','about','capnhat','text-footer'); ?>
      <?php phanquyen_menu('Liên hệ','about','capnhat','lien-he'); ?>
      <?php //phanquyen_menu('Quản lý list khuyến mãi','slider','man_text','khuyen-mai'); ?>
      <?php phanquyen_menu('Text liên hệ footer ','slider','man_text','text-lien-he'); ?>
      <?php phanquyen_menu('Text chính sách footer','slider','man_text','text-chinh-sach'); ?>
      <?php //phanquyen_menu('Quản lý Xưởng sản xuất','slider','man_text','xuong-sx'); ?>
      <?php phanquyen_menu('Quản lý Về chúng tôi','slider','man_photo','ve-chung-toi'); ?>
      <?php phanquyen_menu('Quản lý lựa chọn chúng tôi','slider','man_photo','lua-chon-chung-toi'); ?>

      <?php //phanquyen_menu('Quản lý Mạng xã hội','slider','man_photo','social'); ?>
      <?php //phanquyen_menu('Quản lý Video','video','man','video'); ?>
      <?php //phanquyen_menu('Hình thức thanh toán','news','man','hinh-thuc-thanh-toan'); ?> 
      <?php // phanquyen_menu('Quản lý Ý kiến khách hàng','slider','man_photo','y-kien-khach-hang'); ?>
      <?php //phanquyen_menu('Quản lý đối tác','slider','man_photo','doitac'); ?>
      
      <?php //phanquyen_menu('Quản lý khách hàng ','slider','man_photo','khach-hang'); ?>
      <?php phanquyen_menu('Text về chúng tôi index','about','capnhat','text-ve-chung-toi'); ?>
      <?php phanquyen_menu('Text lựa chọn chúng tôi index','about','capnhat','text-lua-chon-chung-toi'); ?>
      <?php phanquyen_menu('Text dự án chúng tôi index','about','capnhat','text-du-an-chung-toi'); ?>
      <?php phanquyen_menu('Text sản phẩm mới nhất index','about','capnhat','text-san-pham-moi'); ?>
      <?php phanquyen_menu('Text tin nổi bật index','about','capnhat','text-tin-noi-bat'); ?>

        </ul>
  </li>
  <li class="categories_li newsletter_li <?= ($_GET['com']=='contact' || $_GET['com']=='newsletter')?'activemenu':'' ?>" id="menu_nt"><a href="" title="" class="exp"><span>Đăng ký </span><strong></strong></a>
    <ul class="sub">
        <?php //phanquyen_menu('Quản lý Đặt hàng theo yêu cầu','contact','man','theo-yeu-cau'); ?>     
        <?php phanquyen_menu('Quản lý Đăng ký thành viên','contact','man','nhantin'); ?>     
        <?php phanquyen_menu('Quản lý Yêu cầu gọi lại','contact','man','goi-dien'); ?>     
        <?php phanquyen_menu('Quản lý Gửi tin nhắn','contact','man','gui-tin'); ?>     
        <?php phanquyen_menu('Quản lý Liên hệ','contact','man','lien-he'); ?>     
         <?php //phanquyen_menu('Quản lý Đăng ký nhận tin','newsletter','man','nhantin'); ?>     
    </ul>
  </li> 
 <li class="categories_li setting_li 
     <?php if ($_GET['com']=='yahoo' ||  $_GET['com']=='company' || $_GET['com']=='user')  echo ' activemenu' ?>" id="menu_cp"><a href="" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
    <ul class="sub">
        
        
        <?php //phanquyen_menu('Quản lý hỗ trợ trực tuyến','yahoo','man',''); ?>
        <?php phanquyen_menu('Cập nhật thông tin công ty','company','capnhat',''); ?>
        <?php //phanquyen_menu('Quản lý Nhân viên','user','man',''); ?>
         <li<?php if($_GET['act']=='admin_edit') echo ' class="this"' ?>><a href="index.php?com=user&act=admin_edit">Quản lý Tài Khoản</a></li>
         
    </ul>
  </li>
</ul>




