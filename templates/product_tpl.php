<div class="row pt-5">
  <?php for ($j = 0, $count_product = count($product); $j < $count_product; $j++) {  ?>
    <div class="col-lg-3 col-sm-4 col-md-4 col-6  mb-30 ">
      <div class="item item_sanpham wow fadeIn bg-white w_sanphammoi-hover-shadow" data-wow-duration="1s">
        <div class="item_img">
          <a href="san-pham/<?= $product[$j]['tenkhongdau'] ?>.html">
            <img src="<?= _upload_sanpham_l . $product[$j]['photo'] ?>" alt="<?= $product[$j]['ten'] ?>" onError="this.src='http://placehold.it/400x400';" />
          </a>
          <ul class=" d-flex justify-content-around item_sanpham_hover_show-desc" style="list-style:none">
            <li data-id="<?= $product[$j]['id'] ?>" data-name="<?= $product[$j]['ten'] ?>" class=""><i onclick="return addCart1(<?= $product[$j]['id'] ?>)" data-id="<?= $product[$j]['id'] ?>" data-name="<?= $product[$j]['ten'] ?>" id="addCart1_<?= $product[$j]['id'] ?>" class="fa fa-shopping-cart" aria-hidden="true"></i>

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
<div class="pagination"><?= pagesListLimitadmin($url_link, $totalRows, $pageSize, $offset) ?></div>
<div class="mb-30"></div>