 <div class="wapper">
<div class="content--full">
   <div class="col-md-8 col-md-offset-2 col-xs-12">
      <div class="box_register box--center">
         <div class="box__header">
            <h2 class="box__title text-center"><strong><?=$title_tcat?></strong></h2>
            <br>
         </div>
         <div class="box__body">
         
            <form method="post" name="dangky" action="" class="form form--general" enctype="multipart/form-data">
               <div class="row form">
                  <div class="col-md-10 col-md-offset-1 col-xs-12">
                     <div class="form__inner">
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">E-mail <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user-secret"></i></div>
                              <input type="text" class="form-control" value="" id="email" name="email" placeholder="<?=_nhapemail?>"/>
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label"><?=_matkhau?><span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="password" name="password" placeholder="<?=_nhapmatkhau?>" autocomplete="off" value="" />
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label"><?=_nhaplaimatkhau?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="renew_pass" name="renew_pass" placeholder="<?=_nhaplaimatkhau?>" autocomplete="off" value="" />
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label"><?=_fullname?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-pencil-square-o"></i></div>
                              <input type="text" class="form-control" value="" id="ten" name="ten" placeholder="<?=_nhaphoten?>"/>
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label"><?=_dienthoai?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                              <input type="text" class="form-control" value="" id="dienthoai" name="dienthoai" placeholder="<?=_nhapsodienthoai?>"/>
                           </div>
                        </div>
                         <?php /* ?>
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">Địa chỉ <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                              <input type="text" class="form-control" value="" id="diachi" name="diachi" placeholder="Nhập địa chỉ của bạn"/>
                           </div>
                        </div>
                        <div class="form-group form-group-lg">
                           <label for="gender" class="control-label">Giới tính <span class="text-color-red"></span></label>
                           <div class="radio-list">
                              <label><input type="radio" id="gender_m" checked="checked" name="sex" value="1"> Nam</label>
                              <label><input type="radio" id="gender_f" name="sex" value="0"> Nữ</label>
                           </div>
                        </div>
                        <?php */ ?>
                        <div class="form-group form-group-lg">
                        	<input class="fix-button btn btn-primary" onclick="js_submit();" type="button" value="<?=_dangky?>"/>
                   
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