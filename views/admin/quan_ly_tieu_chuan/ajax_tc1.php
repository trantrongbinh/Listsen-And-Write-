<?php
include('../../../model/database.class.php');
include('../../../model/class.tcvn_cap1.php');
include('../../../model/class.tcvn_cap2.php');

$tieuchuan = $_GET['data'];
$tcvnc2 = new tcvnc2();
$dstcvnc2 = $tcvnc2->layCDByTC($tieuchuan);
foreach ($dstcvnc2 as $ds) {
      ?>
            <option value="<?=$ds['idc2']?>"><?php echo $ds['ChuDe']?></option>
      <?php
}
?>
