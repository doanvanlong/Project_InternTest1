<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js" ></script>
<script src="bootstrap4/js/bootstrap.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/all_js.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>

<!--Gio hang-->
<script type="text/javascript" src="js/giohang.js"></script>
<script type="text/javascript" src="js/my_script.js"></script>
<!--animate hiệu ứng-->
<link href="css/animate.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/wow.min.js"></script> 
<script type="text/javascript">
 	 $().ready(function () {
       if ($(window).width() > 767) {
           new WOW().init();
       }
    });
</script>
<!--animate hiệu ứng-->
<script src="js/lobibox.min.js" type="text/javascript" ></script>
<script src="js/nprogress.js" type="text/javascript" ></script>
<!---->
<!-- Slider danh sách đối tác -->

<script>
	$('.slick_sanpham_cungloai').slick({
		dots: false,
		infinite: false,
		speed: 300,
	    arrows: false,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
					infinite: true,
					dots: false
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow:3,
					slidesToScroll:3
				}
			},
			
			{
				breakpoint: 300,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}
		
		]
	});
</script>
<script>
	$('.slider_danhsachdoitac').slick({
		dots: false,
		infinite: false,
		speed: 300,
	    arrows: false,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
					infinite: true,
					dots: false
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow:3,
					slidesToScroll:3
				}
			},
			
			{
				breakpoint: 300,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}
		
		]
	});
</script>
<?php if($template=='product_detail'){?>
<link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script>
	$('#sl_hinhthem').slick({
        autoplay: false,
	    arrows: true,
	    dots: false, 
	    slidesToShow: 5,
	    speed: 2000,
	    autoplaySpeed: 2000,
    });
</script>

<?php } ?>
<!--Thêm alt cho hình ảnh-->
<script type="text/javascript">
	$(document).ready(function(e) {
        $('img').each(function(index, element) {
			if(!$(this).attr('alt') || $(this).attr('alt')=='')
			{
				$(this).attr('alt','<?=$company['ten']?>');
			}
        });
    });
</script>
<?php if($com=='video'){ ?>
	<script src="js/fancybox/jquery.fancybox.min.js"></script>
<?php } ?>
<!--Thêm alt cho hình ảnh-->
<script>
	function sb_nhantin() {
		
		if(isEmpty($('#email_nhantin').val(),"<?=_nhapemail?>")){
			$('#email_nhantin').focus();
			return false;
		}
		if(isEmail($('#email_nhantin').val(),"<?=_emailkhonghople?>")){
			$('#email_nhantin').focus();
			return false;
		}
		
		document.frm_nhantin.submit();
	}
</script>
<?php if($_GET['com'] == 'lien-he') { ?>
<script>
	function sb_contact() {
		if(isEmpty($('#ten_contact').val(),"<?=_nhaphoten?>")){
			$('#name_contact').focus();
			return false;
		}
		
		if(isEmpty($('#email_contact').val(),"<?=_nhapemail?>")){
			$('#email_contact').focus();
			return false;
		}
		if(isEmail($('#email_contact').val(),"<?=_emailkhonghople?>")){
			$('#email_contact').focus();
			return false;
		}
		if(isEmpty($('#dienthoai_contact').val(),"<?=_nhapsodienthoai?>")){
			$('#dienthoai_contact').focus();
			return false;
		}
		if(isPhone($('#dienthoai_contact').val(),"<?=_sodienthoaikhonghople?>")){
			$('#dienthoai_contact').focus();
			return false;
		}
		if(isEmpty($('#noidung_contact').val(),"<?=_nhapnoidung?>")){
			$('#noidung_contact').focus();
			return false;
		}
		document.frm_contact.submit();
	}
</script>
<?php } ?>
<?php if($_GET['com'] == 'dat-hang-theo-yeu-cau' || $_GET['com'] == 'index' || $_GET['com'] == '' ) { ?>
<script>
	$(document).ready(function($) {
		$('#sanpham_yeucau').change(function(event) {
			var id=$(this).find(':selected').data('id');
			$.ajax({
				url:'ajax/loaisanpham.php',
				data:{id:id}, 
				type:'GET',
				async:true,
				success: function(res){
					$('#divloaisanpham_yeucau').html(res);
				}
			});
		});
	});
	function sb_yeucau() {
		if(isEmpty($('#ten_yeucau').val(),"<?=_nhaphoten?>")){
			$('#name_yeucau').focus();
			return false;
		}
		if(isEmpty($('#email_yeucau').val(),"<?=_nhapemail?>")){
			$('#email_yeucau').focus();
			return false;
		}
		if(isEmail($('#email_yeucau').val(),"<?=_emailkhonghople?>")){
			$('#email_yeucau').focus();
			return false;
		}
		if(isEmpty($('#dienthoai_yeucau').val(),"<?=_nhapsodienthoai?>")){
			$('#dienthoai_yeucau').focus();
			return false;
		}
		if(isPhone($('#dienthoai_yeucau').val(),"<?=_sodienthoaikhonghople?>")){
			$('#dienthoai_yeucau').focus();
			return false;
		}
		if(isEmpty($('#sanpham_yeucau').val(),"Chọn sản phẩm")){
			$('#sanpham_yeucau').focus();
			return false;
		}
		if(isEmpty($('#loaisanpham_yeucau').val(),"Chọn loại sản phẩm")){
			$('#loaisanpham_yeucau').focus();
			return false;
		}
		if($('#soluong_yeucau').val() < 1){
			alert('Chọn số lượng sản phẩm');
			$('#soluong_yeucau').focus();
			return false;
		}
		if(isEmpty($('#noidung_yeucau').val(),"<?=_nhapnoidung?>")){
			$('#noidung_yeucau').focus();
			return false;
		}
		document.frm_yeucau.submit();
	}
</script>
<?php } ?>
<?php if($_GET['com'] == 'gio-hang'){ ?>

<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
	function quaylai()
	{
		history.go(-1);
	}

</script>
<script type="text/javascript">
	$(document).ready(function(e) {

		 $('.httt').click(function(){
		 	var stt = $(this).data('stt');
		 	$('.noidung-httt').css('display','none');
		 	$('.noidung-httt-'+stt).css('display','block');
		 });
         $('#thanhpho').change(function(e) {
           var loadajax = "ajax/quan.php?id="+$(this).val();
			setTimeout(function(){$('#quan').load(loadajax)},0);
        });

		<?php if($config['phi']==1){ ?>
		$('#thanhpho').change(function(e) {
            NProgress.start();
			$.ajax({
				url:"ajax/update-ship.html",
				data:{id:$(this).val()},
				type:"post",
				dataType:"json",
				success:function(data){
					$(".total_cart_max .all-price .price").html(data.price);
					$(".total_cart_max .all-ship .price").html(data.ship);
					$(".total_cart_max .all-price-all .price").html(data.all);
					NProgress.done();
					
				}
			})
        });
		<?php } elseif($config['phi']==2){?>
		$('#quan').change(function(e) {
            NProgress.start();
			$.ajax({
				url:"ajax/update-ship.html",
				data:{id:$(this).val()},
				type:"post",
				dataType:"json",
				success:function(data){
					$(".total_cart_max .all-price .price").html(data.price);
					$(".total_cart_max .all-ship .price").html(data.ship);
					$(".total_cart_max .all-price-all .price").html(data.all);
					NProgress.done();
					
				}
			})
        });
		<?php }?>
    });
	
function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
		if (s.charAt(i)==" "){
			return false;
		}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;
	if (elem[0].length==0 || elem[1].length==0)return false;
	if (elem[1].indexOf(".")==-1)	return false;
	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
		if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email
function IsNumeric(sText)
{
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;
	for (i = 0; i < sText.length && IsNumber == true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;
}//Kiem tra dang so

function check()
		{	
			var frm = document.frm_order;
			if(frm.hoten.value=='') 
			{ 
				alert( "<?=_nhaphoten?>." );
				frm.hoten.focus();
				return false;
			}
			if(frm.dienthoai.value=='') 
			{ 
				alert( "<?=_nhapsodienthoai?>." );
				frm.dienthoai.focus();
				return false;
			}
			sodienthoai = frm.dienthoai.value;
			if(isPhone(sodienthoai,"<?=_sodienthoaikhonghople?>")) 
			{
					frm.dienthoai.focus();
					return false;
			}
			if(frm.thanhpho.value=='') 
			{ 
				alert( "<?=_chontinhthanhpho?>." );
				frm.thanhpho.focus();
				return false;
			}
			if(frm.quan.value=='') 
			{ 
				alert( "<?=_chonquanhuyen?>." );
				frm.quan.focus();
				return false;
			}
			if(frm.diachi.value=='') 
			{ 
				alert( "<?=_nhapdiachi?>." );
				frm.diachi.focus();
				return false;
			}
			if(isEmpty($('#email').val(), "<?=_emailkhonghople?>"))
			{
				$('#email').focus();
				return false;
			}
			if(isEmail($('#email').val(), "<?=_emailkhonghople?>"))
			{
				$('#email').focus();
				return false;
			}										
			frm.submit();	
		}
</script> 
<script>
		$().ready(function(){
			
			
			$(".trans-type input").click(function(){
				NProgress.start();
				$price = $(this).data("price");
				$.ajax({
					url:"ajax/update-transtype.html",
					data:{price:$price,id:$(this).val()},
					type:"post",
					dataType:"json",
					success:function(data){
						$(".total_cart_max .all-price .price").html(data.price);
						//$(".total_cart_max .all-ship .price").html(data.ship);
						$(".total_cart_max .all-price-all .price").html(data.all);
						NProgress.done();
						
					}
				})
			})
			$(".trans-type input").first().trigger("click");
			
		})
	
	</script>
<?php } ?>