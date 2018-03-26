<?php
include('../../../model/database.class.php');
include('../../../model/class.tccs2.php');

$chude = $_GET['data'];
$tccs = new tccs2();
$dstccs = $tccs->layTCCSByID1($chude);
$stt = 1;
foreach ($dstccs as $ds) {
	?>
		<tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['KyHieu']?></td>
            <td style="text-align: left;"><?=$ds['TrichYeu']?></td>
            <td style="text-align: center;"><?=$ds['NgayBanHanh']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-tccs&id-tccs=<?=$ds['id']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-tccs&id-tccs=<?=$ds['id']?>">Xem</a></td>
            <td style="text-align: center;">
            	<input type="checkbox"  name='num[]' class="other" value='<?=$ds['id']?>' >
            </td>
        </tr>
	<?php
}
?>
