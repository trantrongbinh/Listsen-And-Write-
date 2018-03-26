<?php
include('../../../model/database.class.php');
include('../../../model/class.tcvn_cap2.php');
include('../../../model/class.tcvn_cap3.php');

$chude = $_GET['data'];
$tcvnc3 = new tcvnc3();
$ds_tccvn3 = $tcvnc3->layTCByCD($chude);
$stt = 1;
foreach ($ds_tccvn3 as $ds) {
	?>
		<tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['Ma']?></td>
            <td style="text-align: left;"><?=$ds['TrichYeu']?></td>
            <td style="text-align: center;"><?=$ds['NgayBanHanh']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-tcvn&id-tcvn3=<?=$ds['idc3']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-tcvn&id-tcvn3=<?=$ds['idc3']?>">Xem</a></td>
            <td style="text-align: center;">
            	<input type="checkbox"  name='num[]' class="other" value='<?=$ds['idc3']?>' >
            </td>
        </tr>
	<?php
}
?>
