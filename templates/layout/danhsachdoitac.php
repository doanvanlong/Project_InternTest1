<?php
// background 
$d->reset();
$sql_slider = "select ten$lang as ten,link,photo,mota$lang as mota from #_slider where hienthi=1 and type='doi-tac' order by stt,id asc";
$d->query($sql_slider);
$doitacs = $d->result_array();
?>
<div id="w_doitac" style="overflow:hidden">
	<div class="container">
		<ul class="slider_danhsachdoitac" style="list-style:none">
			<?php
			foreach ($doitacs as $doitac) {
			?>
				<li><img width="" src="<?= _upload_hinhanh_l . $doitac['photo']  ?>" alt="<?= $doitac['ten'] ?>" alt=""></li>
			<?php
			}
			?>
		</ul>
	</div>
</div>

