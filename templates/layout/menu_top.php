<div class="d-flex justify-content-between align-items-center   ">
    <ul class="main_nav">
        <li class="ac <?php if ((!isset($_REQUEST['com'])) or ($_REQUEST['com'] == NULL) or $_REQUEST['com'] == 'index') echo 'active'; ?>"> <a href="index.html"><?= _trangchu ?></a></li>
        <li class="ac <?php if ($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>">
            <a href="gioi-thieu.html"><?= _gioithieu ?></a>
        </li>

        <li class="ac <?php if ($_REQUEST['com'] == 'san-pham') echo 'active'; ?>"><a href="san-pham.html"><?= _sanpham ?> </a>

        </li>
        <li class="ac <?php if ($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>"><a href="tin-tuc.html"><?= _tintuc ?></a>

        </li>
        <li class="ac <?php if ($_REQUEST['com'] == 'du-an') echo 'active'; ?>"><a href="du-an.html"><?= _duan ?></a>

        </li>
        <li class="ac <?php if ($_REQUEST['com'] == 'tuyen-dung') echo 'active'; ?>">
            <a href="tuyen-dung.html">Tuyển dụng</a>
        </li>
        <li class="ac <?php if ($_REQUEST['com'] == 'he-thong-cua-hang') echo 'active'; ?>">
            <a href="he-thong-cua-hang.html">Hệ thống cửa hàng</a>
        </li>


        <li class="ac <?php if ($_REQUEST['com'] == 'lien-he') echo 'active'; ?>">
            <a href="lien-he.html"><?= _lienhe ?></a>
        </li>
    </ul>

    <ul class="main_nav_social">
        <li>
            <a href=""><i class="fa fa-facebook" aria-hidden="true"></i>
               </a>
               <span>Flow on Facebook </span>
        </li>
        <li>
            <a href=""><i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <span>Flow on Instagram </span>
            
        </li>
        <li>
            <a href=""><i class="fa fa-envelope-o" aria-hidden="true"></i>
            </a>
            <span>Send us an Email </span>
        </li>
        <li>
            <a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
                <span >Flow on Youtube</span>
        </li>

    </ul>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>