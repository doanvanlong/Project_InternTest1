 <div class="wapper">
<div class="content--full">
   <div class="col-md-8 col-md-offset-2 col-xs-12">
      <div class="box_register box--center">
         <div class="box__header">
            <h2 class="box__title text-center"><strong><?=_trangcanhan?></strong></h2>
            <br>
         </div>
         <div class="box__body">
         
            <form method="post" name="trangcanhan" action="" class="form form--general" enctype="multipart/form-data">
               <div class="row form">
                  <div class="col-md-10 col-md-offset-1 col-xs-12">
                     <div class="form__inner">
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label">E-mail <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user-secret"></i></div>
                              <input type="text" class="form-control" value="<?=@$user1['email']?>" id="email" name="email" placeholder="<?=_nhapemail?>"/>
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label"><?=_fullname?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-pencil-square-o"></i></div>
                              <input type="text" class="form-control" value="<?=@$user1['ten']?>" id="ten" name="ten" placeholder="<?=_nhaphoten?>"/>
                           </div>
                        </div>
                        
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label"><?=_dienthoai?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                              <input type="text" class="form-control" value="<?=@$user1['dienthoai']?>" id="dienthoai" name="dienthoai" placeholder="<?=_nhapsodienthoai?>"/>
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="email" class="control-label"><?=_diachi?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                              <input type="text" class="form-control" value="<?=@$user1['diachi']?>" id="diachi" name="diachi" placeholder="<?=_nhapdiachi?>"/>
                           </div>
                        </div>
                        <div class="form-group form-group-lg">
                        	<input class="fix-button btn btn-primary" onclick="js_submit();" type="button" value="<?=_capnhat?>"/>
                   
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