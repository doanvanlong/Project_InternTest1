<ul class="breadcrumb1"> 
	<?php for($i= 0 ; $i < count($breadcumbs)-1; $i++){ ?>
	<li> <a href="<?= $breadcumbs[$i][0] ?>" title="<?= $breadcumbs[$i][1] ?>"><?= $breadcumbs[$i][1] ?></a> </li>
	<?php } ?>

	<li><span><?= $breadcumbs[count($breadcumbs)-1][1] ?></span></li>
</ul >
