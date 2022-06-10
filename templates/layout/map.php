<!--bado mini--->
<script>
	<?php $arr=explode(",",$company['toado']); ?>
	function initialize1() {
		var myLatlng = new google.maps.LatLng(<?=$arr[0]?>,<?=$arr[1]?>);
		var mapOptions = {
			zoom: 17,
			center: myLatlng
		};

		var map = new google.maps.Map(document.getElementById('map_canvas1'), mapOptions);

		var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#ff0000; font-weight:bold; text-transform: uppercase;'><?=$company['ten']?></th></tr><tr><th>Địa chỉ : <?=$company['diachi']?></th></tr><tr><th>Điện thoại : <?=$company['dienthoai']?></th></tr><tr><th>Email : <?=$company['email']?></th></tr></table>";

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: "<?=$company['ten']?>"
		});
		infowindow.open(map, marker);
	}

	google.maps.event.addDomListener(window, 'load', initialize1);


</script>
<!--bado mini--->
<div class="bando1">
           <div id="map_canvas1"></div> 
    </div><!--.bando-->
            
<style>
	#map_canvas1 img{max-width:none !important;}
</style>		  