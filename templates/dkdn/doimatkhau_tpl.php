  <div class="wapper">
<div class="content--full">
   <div class="col-md-8 col-md-offset-2 col-xs-12">
      <div class="box_register box--center">
          <div class="box__header">
            <h2 class="box__title text-center"><strong><?=_doimatkhau?></strong></h2>
            <br>
         </div>
         <div class="box__body">
            <form method="post" name="doimatkhau" action="" class="form form--general" enctype="multipart/form-data">
               <div class="row form">
                  <div class="col-md-10 col-md-offset-1 col-xs-12">
                     <div class="form__inner">
                     	<div class="form-group form-group-lg ">
                           <label for="password" class="control-label"><?=_matkhaucu?><span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="<?=_nhapmatkhaucu?>" autocomplete="off" value="" />
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label"><?=_matkhaumoi?><span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="password" name="password" placeholder="<?=_nhapmatkhaumoi?>" autocomplete="off" value="" />
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label"><?=_nhaplaimatkhaumoi?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="renew_pass" name="renew_pass" placeholder="<?=_nhaplaimatkhaumoi?>" autocomplete="off" value="" />
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