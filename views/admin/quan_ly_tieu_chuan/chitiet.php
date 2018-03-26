<?php
include('../../model/database.class.php');
include('../../model/class.tintuc2.php');

$tintuc = new tintuc2();
if (!isset($_GET['id-tintuc']) || $tintuc->checkTinTuc($_GET['id-tintuc']) == false ) {
    echo "<script>  alert('Tin tức không tồn tại!!!');</script>";
    exit();
}
$tt  = $tintuc->layMotTinTuc($_GET['id-tintuc']);

?>

<br>
<h1 class="title"><?=$tt['TieuDe']?></h1>
<br>
<div class="des"><i><?=$tt['TomTat']?></i></div>
<br>
<div class="chitiet">
<!--noi dung-->
  <table align="center" border="0" cellpadding="3" cellspacing="0">
    <tbody>
      <tr>
        <td style="text-align: center;display: block; margin-left: auto; margin-right: auto;""><img alt="ảnh" src="../upload/images/<?=$tt['urlHinh']?>" width="470" height="350"></td>
      </tr>
      <tr>
        <td style="text-align: center"><p>Ảnh: <em>...</em></p></td>
      </tr>
    </tbody>
  </table>
  <br>
  <div><?=$tt['NoiDung']?></div>
</div>
