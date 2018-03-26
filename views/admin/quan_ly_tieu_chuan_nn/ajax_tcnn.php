<?php
include('../../../model/database.class.php');
include('../../../model/class.tcnn2.php');

$chude = $_GET['data'];
$tcnn = new tcnn2();
$dstcnn = $tcnn->layTCNNByID1($chude);
$stt = 1;
foreach ($dstcnn as $ds) {
	?>
		<tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['KyHieu']?></td>
            <td style="text-align: left;"><?=$ds['TrichYeu']?></td>
            <td style="text-align: center;"><?=$ds['NgayBanHanh']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-tcnn&id-tcnn=<?=$ds['id']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-tcnn&id-tcnn=<?=$ds['id']?>">Xem</a></td>
            <td style="text-align: center;">
            	<input type="checkbox"  name='num[]' class="other" value='<?=$ds['id']?>' >
            </td>
        </tr>
	<?php
}
?>
