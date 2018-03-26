<?php
include('../../../model/database.class.php');
include('../../../model/class.tintuc2.php');

$loai = $_GET['data'];
$tt = new tintuc2();
$dstt = $tt->layTTByLoai($loai);
$stt = 1;
foreach ($dstt as $ds) {
	?>
	<tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['TieuDe']?></td>
            <td style="text-align: center;"><?=$ds['TacGia']?></td>
            <td style="text-align: center;"><?=$ds['Ngay']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-bv&id-tintuc=<?=$ds['idTT']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-bv&id-tintuc=<?=$ds['idTT']?>">Xem</a></td>
            <td style="text-align: center;">
              <input type="checkbox"  name='num[]' class="other" value='<?=$ds['idTT']?>' >
            </td>
      </tr>
	<?php
}
?>
