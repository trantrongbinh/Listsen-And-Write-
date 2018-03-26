<?php
include('../../model/database.class.php');
include('../../model/class.vbqppl.php');
	$vbqppl = new vbqppl();
	$key = $_POST['data'];
	$ds_vbqppl = $vbqppl->search2($key);
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