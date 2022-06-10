
<div class="w_duan pb-0">
  <div class="container">
    <?php
    $d->reset();
    $sql = "select *,ten$lang as ten,id,mota$lang as mota,noidung$lang as noidung ,ngaytao$lang ngaytao from #_news where    type= 'du-an' and ngaytao <=" . time() . "  limit 0,8";
    $d->query($sql);
    $duan = $d->result_array();
    // text-duanchungtoi

    $d->reset();
    $sql = "select noidung  from #_about where type='text-du-an-chung-toi' and hienthi=1 ";
    $d->query($sql);
    $text_duanchungtoi = $d->result_array();
    // text-sp mới
    $d->reset();
    $sql = "select noidung  from #_about where type='text-san-pham-moi' and hienthi=1 ";
    $d->query($sql);
    $text_sanphammoi = $d->result_array();
    // text-tin noi bat 
    $d->reset();
    $sql = "select noidung  from #_about where type='text-tin-noi-bat' and hienthi=1 ";
    $d->query($sql);
    $text_tinnoibat = $d->result_array();
    ?>
    <h4 class="tieude_gc">
      <p class="mb-0">Dự án của chúng tôi</p>
      <div class="mh-separator-outer">
        <div class="mh-separator style-square"> <span class="separator-left bg-separator"></span><br> <span class="separator-right bg-separator"></span></div>
      </div>
    </h4>
    <div class="row offset-2">
      <div class="col-12 col-sm-12 col-md-12 col-lg-10">
        <p class="py-2 text-center "><?php echo strip_tags($text_duanchungtoi[0]['noidung']) ?>

        </p>
      </div>
    </div>
    <div class="row pt-5">
      <?php for ($j = 0, $count_product = count($duan); $j < $count_product; $j++) {  ?>
        <div class="col-lg-4 col-sm-6 col-md-6 col-12 mb-30 ">
          <div class="item item_sanpham wow fadeIn" data-wow-duration="1s">
            <div class="item_img hover_sang ">
              <a href="du-an/<?= $duan[$j]['tenkhongdau'] ?>.html">
                <img src="<?= _upload_tintuc . $duan[$j]['photo'] ?>" alt="<?= $duan[$j]['ten'] ?>" onError="this.src='http://placehold.it/400x400';" />
              </a>

            </div>
            <div class="p-3">
              <h6 class="pb-1 text-tile-tintuc text-overflow">
                <a class="text-overflow" href="du-an/<?= $duan[$j]['tenkhongdau'] ?>.html"><?= $duan[$j]['ten'] ?></a>
              </h6>
              <span class="pb-2 text-secondary">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php
                if (isset($duan[$j]['ngaytao'])) {
                  echo date("m-d-Y", $duan[$j]['ngaytao']);
                } else {
                  echo date("m-d-Y");
                }
                ?>
              </span>
              <div class="text-overflow">
                <p class="mb-0 "><?= $duan[$j]['mota'] ?></p>
              </div>
            </div>
          </div>
          <!---END .item-->
        </div>
        <!---END .col-->
      <?php } ?>
    </div>
    <!---END row-->

    <?php ?>

  </div>
</div>
<div class="bg-sanphammoi">

</div>
<div class="w_sanphammoi pb-4">
  <div class="container">
    <?php
    $d->reset();
    $sql = "select *,ten$lang as ten from table_product where hienthi=1  and type='san-pham' and noibat=1 order by stt,id desc limit 0,8";
    $d->query($sql);
    $product = $d->result_array();

    ?>
    <h4 class="tieude_gc">
      <p class="mb-0">Sản phẩm mới nhất</p>
      <div class="mh-separator-outer">
        <div class="mh-separator style-square"> <span class="separator-left bg-separator"></span><br> <span class="separator-right bg-separator"></span></div>
      </div>
    </h4>
    <div class="row offset-2">
				<div class="col-12 col-sm-12 col-md-12 col-lg-10">
    <p class="py-2 text-center "><?php echo strip_tags($text_sanphammoi[0]['noidung']) ?>
    </p>
        </div>
    </div>
    <div class="row pt-5">
      <?php for ($j = 0, $count_product = count($product); $j < $count_product; $j++) {  ?>
        <div class="col-lg-3 col-sm-4 col-md-4 col-6  mb-30 ">
          <div class="item item_sanpham wow fadeIn bg-white w_sanphammoi-hover-shadow" data-wow-duration="1s">
            <div class="item_img">
              <a href="san-pham/<?= $product[$j]['tenkhongdau'] ?>.html">
                <img src="<?= _upload_sanpham_l . $product[$j]['photo'] ?>" alt="<?= $product[$j]['ten'] ?>" onError="this.src='http://placehold.it/400x400';" />
              </a>
              <ul class=" d-flex justify-content-around item_sanpham_hover_show-desc" style="list-style:none">
                <li  data-id="<?= $product[$j]['id'] ?>" data-name="<?= $product[$j]['ten'] ?>"  class=""><i onclick="return addCart1(<?= $product[$j]['id'] ?>)"  data-id="<?= $product[$j]['id'] ?>" data-name="<?= $product[$j]['ten'] ?>" id="addCart1_<?=$product[$j]['id']?>" class="fa fa-shopping-cart" aria-hidden="true"></i>

                  <span class="show-text-addcart">Thêm vào giỏ hàng</span>
                </li>
               
              </ul>
            </div>
            <h5 class="item_name pl-4">
              <a class="text-overflow" style="font-weight:400" href="san-pham/<?= $product[$j]['tenkhongdau'] ?>.html"><?= $product[$j]['ten'] ?></a>
            </h5>
            <div class="item_gia pl-4">
              <?php
              if ($product[$j]['giakm'] != 0) {
                echo '<span class="del-gia">' . number_format($product[$j]['gia'], 0, ',', '.') . '<sup>đ</sup>  <span></span></span>';
                echo '<span class="gia-ban">' . number_format($product[$j]['giakm'], 0, ',', '.') . '<sup>đ</sup></span>  <span class="txt_xanh"></span>';
              } else {
                if ($product[$j]['gia'] != 0) {
                  echo '<span class="gia-ban">' . number_format($product[$j]['gia'], 0, ',', '.') . '<sup>đ</sup></span>  <span class="txt_xanh"></span>';
                } else {
                  echo '<a href="lien-he.html" class="gia-ban">' . _lienhe . '</a>';
                }
              }
              ?>
            </div>
            <?php /* ?><div class="item_button">
                <div class="cart">
                    <button class="add-cart active" onclick="return addCart1(<?=$product[$j]['id']?>,'<?=$product[$j]['ten']?>')" data-id="<?=$product[$j]['id']?>" data-name="<?=$product[$j]['ten']?>">
                        <i class="fa fa-cart-plus"></i><span class="mobi_none"> <?=_themvaogio?></span>
                    </button> 
                </div>
            </div><?php */ ?>
          </div>
          <!---END .item-->
        </div>
        <!---END .col-->
      <?php } ?>
    </div>
    <!---END row-->

    <?php ?>

  </div>
</div>
<div class="w_dichvu pb-20">
  <div class="container">
    <?php
    $d->reset();
    $sql = "select *,ten$lang as ten,id,mota$lang as mota,noidung$lang as noidung,ngaytao$lang as ngaytao from #_news where    type= 'tin-tuc' and ngaytao <=" . time() . " order by id desc limit 0,3";
    $d->query($sql);
    $tinnoibat = $d->result_array();
    $d->reset();
    $sql = "select *,ten$lang as ten,id,mota$lang as mota,noidung$lang as noidung,ngaytao$lang as ngaytao from #_news where    type= 'tin-tuc' and ngaytao <=" . time() . " order by id desc  limit 1";
    $d->query($sql);
    $tinmoinhat1 = $d->result_array();
    ?>
    <h4 class="tieude_gc">
      <p class="mb-0">Tin nổi bật</p>
      <div class="mh-separator-outer">
        <div class="mh-separator style-square"> <span class="separator-left bg-separator"></span><br> <span class="separator-right bg-separator"></span></div>
      </div>
    </h4>
    <div class="row offset-2">
      <div class="col-12 col-sm-12 col-md-12 col-lg-10">
    <p class="py-2 text-center "><?php echo strip_tags($text_tinnoibat[0]['noidung']) ?>
    </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-6">
        <div class="box-tinmoi_1">
          <a href="tin-tuc/<?= $tinmoinhat1[0]['tenkhongdau'] ?>.html">
            <img width="100%" height="100%" src="<?= _upload_tintuc . $tinmoinhat1[0]['photo'] ?>" alt="<?= $tinmoinhat1[0]['ten'] ?>" onError="this.src='http://placehold.it/400x400';" />
            <div class="box-tinmoi_1_text">
              <h5 class="item_name">
                <a class="" style="color:#fff;" href="tin-tuc/<?= $tinmoinhat1[0]['tenkhongdau'] ?>.html"><?= $tinmoinhat1[0]['ten'] ?></a>
              </h5>
              <span class="pb-2 text-white " style="opacity:.9;font-size:14px">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php
                if (isset($tinmoinhat1[$j]['ngaytao'])) {
                  echo date("m-d-Y", $tinmoinhat1[$j]['ngaytao']);
                } else {
                  echo date("m-d-Y");
                }
                ?>
              </span>
              <div>
                <p class="text-overflow pt-2" style="color:#f2f2f2;"><?= $tinmoinhat1[0]['mota'] ?></p>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-6">
        <div class="row row-tintuc-mobile">
          <?php for ($j = 0, $count_tinnoibat = count($tinnoibat); $j < $count_tinnoibat; $j++) {  ?>
            <div class="col-lg-12 col-sm-12 col-12 mb-30">
              <a href="tin-tuc/<?= $tinnoibat[$j]['tenkhongdau'] ?>.html" class="box-tinnoibat-right d-flex">
                <img width="180px" height="auto" src="<?= _upload_tintuc . $tinnoibat[$j]['photo'] ?>" alt="<?= $tinnoibat[$j]['ten'] ?>" onError="this.src='http://placehold.it/400x400';" />
                <div class="box-tinnoibat-right-text p-3">
                  <div class="content_title-tintuc text-overflow pb-2">
                    <?= $tinnoibat[$j]['ten'] ?>
                  </div>
                  <span class="pb-2 text-secondary" style="font-size:14px">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php
                    if (isset($tinnoibat[$j]['ngaytao'])) {
                      echo date("m-d-Y", $tinnoibat[$j]['ngaytao']);
                    } else {
                      echo date("m-d-Y");
                    }
                    ?>
                  </span>
                  <div class="content_desc-tintuc text-secondary text-overflow pt-2">
                    <?= $tinnoibat[$j]['mota'] ?>
                  </div>
                </div>
              </a>
            </div>
            <!---END .col-->
          <?php } ?>
        </div>
      </div>
      <!---END row-->
    </div>


    <?php ?>

  </div>
</div>