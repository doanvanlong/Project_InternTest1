<style>
    body{
    -webkit-touch-callout: unset!important;
    -webkit-user-select: unset!important;
    -moz-user-select: unset!important;
    -ms-user-select: unset!important;
    -o-user-select: unset!important;
    user-select: unset!important;
    }
</style>
        <div class="mt-40"></div>
        <div class="w_dichvu ">
            <div id="donhang_ht">
                <div class="img_thanhcong">
                    <img src="images/cart_thanhcong.jpg" alt="Thành công" height="100" />
                    <h2><?=_dathangthanhcong?>!</h2>
                </div>
                <h3><?=_camonquykhachdadathangtai?> <a href="index.html" target="_blank"><?= $config_url ?></a></h3>
                <div><?=_thongtindonhangduocguivemail?></div>
                <div><?=_masodonhangcuabanla?> :</div>
                <div class="btn_madonhang"><?=$_SESSION['thanhcong']?></div>
                <div><?=_dienthoaihotromuahang?> : <span class="text-danger"><i class="fa fa-phone"></i> <?=$company['dienthoai']?></span> </div>
                <div><a href="index.html" class="muatiep"><?=_tieptucmuahang?><i class="fa fa-tranfer"></i></a></div>
            </div>
        </div>
        <div class="min-height"></div>
    <?php 
    unset($_SESSION['thanhcong']);
    ?>
