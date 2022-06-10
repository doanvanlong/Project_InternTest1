<link href="css/register.css" type="text/css" rel="stylesheet" />
<script language="javascript" src="js/my_script.js"></script>
<script language="javascript">
function js_submit(){

	
	if($('#password').val()!='') 
		{ 
			if(document.dangky.password.value.length<5){
				alert("Mật khẩu phải nhiều hơn 4 ký tự.");
				document.dangky.password.focus();
				return false;
			}
		}
	if($('#txtCaptcha').val()=='') 
	{ 
		alert( "Nhập mã bảo vệ." );
		$('#txtCaptcha').focus();
		return false;
	}
	document.dangky.submit();
}
</script>
 <div class="wapper">
<div class="bg_register">
    <div class="register_left col-md-3 col-sm-4 col-xs-12">
    	<div class="content--full">
            <div class="box box_register box--no-padding">
                <div class="box__header">
                    <h2 class="box__title">Thông tin chung</h2>
                </div>
                <div class="box__body">
                    <div class="sidebar__widget widget widget--profile">
                        <div class="profile clearfix">
                            <div class="profile__avatar">
                                <img class="img-circle img-avatar" src="images/avatar.png" alt="" onclick="">
                            </div>
                            <div class="profile__info">
                                <div class="profile__name"><?=$_SESSION["loginw"]['ten']?></div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__widget widget">
                    	<?php include _template."layout/list_user.php"; ?>
                    </div>
                </div>
            </div>
    
    	</div>
        
    </div>
    
    
    <div class="register_right col-md-9 col-sm-8 col-xs-12">
    	<div class="content--full row">
           <div class="col-md-12 col-xs-12">
              <div class="box_register box--center">
                 <div class="box__header">
                    <h2 class="box__title"><?=$title_tcat?></h2>
                 </div>
                 
                 <?php /*?><div>
				 <?php if(count($res_mucthuong) > 0) {?>
                 Bạn đã đủ điểm tích lũy để đổi quà
                 <?php } ?>
                 </div><?php */?>
                 <div class="box__body">
                 
                    <form method="post" name="dangky" action="" class="form form--general" enctype="multipart/form-data">
                       <div class="row form">
                          <div class="col-md-6 col-sm-8 col-xs-12">
                             <div class="form__inner">
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">E-mail <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-user-secret"></i></div>
                                      <input type="text" readonly="readonly" class="form-control" value="<?=$_SESSION["loginw"]['email']?>" id="email" name="email" placeholder="Nhập email của bạn"/>
                                   </div>
                                </div>
                                <div class="form-group form-group-lg ">
                                   <label for="password" class="control-label">Mật khẩu <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" autocomplete="off" value="" />
                                   </div>
                                </div>
                                
                                
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Họ tên <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-pencil-square-o"></i></div>
                                      <input type="text" class="form-control" value="<?=$_SESSION["loginw"]["ten"]?>" id="ten" name="ten" placeholder="Nhập họ tên của bạn"/>
                                   </div>
                                </div>
                                
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Điện thoại <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                      <input type="text" class="form-control" value="<?=$_SESSION["loginw"]["dienthoai"]?>" id="dienthoai" name="dienthoai" placeholder="Số điện thoại của bạn"/>
                                   </div>
                                </div>
                                
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Địa chỉ <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                      <input type="text" class="form-control" value="<?=$_SESSION["loginw"]["diachi"]?>" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn"/>
                                   </div>
                                </div>
                                
                                <?php /*?><div class="form-group form-group-lg ">
                                   <label for="birthday" class="control-label">Ngày sinh <span class="text-color-red">(*)</span></label>
                                   <div class="input-group datepicker">
                                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                      <input type="text" class="form-control date" id="ngaysinh" name="ngaysinh" placeholder="Ngày / tháng / năm" />
                                   </div>
                                </div><?php */?>
                                
                                <div class="form-group form-group-lg">
                                   <label for="gender" class="control-label">Giới tính <span class="text-color-red">(*)</span></label>
                                   <div class="radio-list">
                                      <label><input type="radio" id="gender_m" <?php if($_SESSION['loginw']['sex']==1){echo 'checked="checked"';} ?>  name="sex" value="1"> Nam</label>
                                      <label><input type="radio" id="gender_f" <?php if($_SESSION['loginw']['sex']==0){echo 'checked="checked"';} ?> name="sex" value="0"> Nữ</label>
                                      
                                      
                        
                                   </div>
                                </div>
                                
                                <?php /*?><div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Điểm tích lũy <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-pencil-square-o"></i></div>
                                      <input type="text" class="form-control" readonly="readonly" value="<?=$dtl['tichluy']?>" id="tichluy" name="tichluy" placeholder="Điểm tích lũy"/>
                                   </div>
                                </div><?php */?>
                                
                                <div class="form-group form-group-lg ">
                                   <label for="email" class="control-label">Mã xác nhận <span class="text-color-red">(*)</span></label>
                                   <div class="input-group">
                                      <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                      <div class="padding_Captcha"><input type="text" name="txtCaptcha" id="txtCaptcha" maxlength="10" size="12" placeholder="Mã xác nhận" class="form-control pull-left input_website"/>
                                      <img src="capcha.php" style="" /></div>
                                      
                                      
                                   </div>
                                </div>
                                
                                
                                
                                
                                <div class="form-group form-group-lg">
                                    <input class="fix-button" onclick="js_submit();" type="button" value="Cập nhật"/>
                           
                                </div>
                             </div>
                          </div>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
        </div>
    </div>

</div>  
</div>
