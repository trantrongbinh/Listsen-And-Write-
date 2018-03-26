<?php
include('../../../model/database.class.php');
include('../../../model/class.qcvn_cap2.php');

$nganh = $_GET['data'];
$qcvn = new qcvn();
$ds_qcvn = $qcvn->layQCVN2ByID1($nganh);
$stt = 1;
foreach ($ds_qcvn as $ds) {
	?>
		<tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['Ma']?></td>
            <td style="text-align: left;"><?=$ds['TrichYeu']?></td>
            <td style="text-align: center;"><?=$ds['NgayBanHanh']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-qc&id-qcvn=<?=$ds['idc2']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-qc&id-qcvn=<?=$ds['idc2']?>">Xem</a></td>
            <td style="text-align: center;">
            	<input type="checkbox"  name='num[]' class="other" value='<?=$ds['idc2']?>' >
            </td>
        </tr>
	<?php
}
?>
