<?php
include('../../model/database.class.php');
include('../../model/class.thongbao.php');

$thongbao = new thongbao();
if (!isset($_GET['id-tb']) || $thongbao->checkThongBao($_GET['id-tb']) == false ) {
    echo "<script>  alert('Tin tức không tồn tại!!!');</script>";
    exit();
}
$tt  = $thongbao->layMotThongBao($_GET['id-tb']);

?>

<br>
<h1 class="title"><?=$tt['TieuDe']?></h1>
<br>
<div class="noidung">
  <br>
  <div><?=$tt['NoiDung']?></div>
</div>
