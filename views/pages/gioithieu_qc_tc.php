<?php
	include('model/class.gioithieu.php');

	$gioithieu = new gioithieu();
	$ds_gt = $gioithieu->layGioiThieu();
?>
<div class ="gioithieu">
<h2 align="center"><strong>Giới thiệu về tiêu chuẩn, quy chuẩn Bộ Xây Dựng</strong></h2>
<br>

<?php
	foreach ($ds_gt as $ds) {
		?>
			<div class="gt">
				<h3><?=$ds['ChuDe']?></h3>
				<br>
				<p><?=$ds['NoiDung']?></p>
			</div>
			<br>
			<hr>
			<br>
		<?php
	}
?>
<p>................</p>
</div>