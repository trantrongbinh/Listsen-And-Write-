<?php
include('../../model/database.class.php');
include('../../model/class.vbqppl.php');

$coquan = $_GET['data'];
$vbqppl = new vbqppl();
$ds_vbqppl = $vbqppl->layVBQPPLByCoQuan($coquan);
foreach ($ds_vbqppl as $ds) {
	?>
		<tr>
            <td style="text-align:center;"> <a href="#"><?=$ds['KyHieu']?></a></td>
            <td><?=$ds['CoQuan']?></td>
            <td><?=$ds['NgayBanHanh']?></td>
            <td><?=$ds['TrichYeu']?></td>
        </tr>
	<?php
}
?>
