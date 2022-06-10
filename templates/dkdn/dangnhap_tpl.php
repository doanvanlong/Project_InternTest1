<link href="css/register.css" type="text/css" rel="stylesheet" />
<script src="js/my_script.js" type="text/javascript"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty($('#username').val(), "<?=_nhapemail?>"))
	{
		$('#username').focus();
		return false;
	}
	
	if(isEmpty($('#password').val(), "<?=_nhapmatkhau?>"))
	{
		$('#password').focus();
		return false;
	}
	document.dangky.submit();
}
</script>


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
                              <input type="text" class="form-control" value="" id="username" name="username" placeholder="<?=_nhapemail?>"/>
                           </div>
                        </div>
                        <div class="form-group form-group-lg ">
                           <label for="password" class="control-label"><?=_matkhau?> <span class="text-color-red">(*)</span></label>
                           <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="password" class="form-control" id="password" name="password" placeholder="<?=_nhapmatkhau?>" autocomplete="off" value="" />
                           </div>
                        </div>
                        
                        
                        <div class="form-group form-group-lg">
                        	<input class="fix-button  btn btn-primary" onclick="js_submit();" type="button" value="<?=_dangnhap?>"/>
                   
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
      