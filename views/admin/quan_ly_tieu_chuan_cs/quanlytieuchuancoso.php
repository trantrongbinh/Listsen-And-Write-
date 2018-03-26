<?php
include('../../model/database.class.php');
include('../../model/class.tccs1.php');
include('../../model/class.tccs2.php');
include('../../controller/pager.php');
$tccs2 = new tccs2();
$tccs1 = new tccs1();

$dstccs2 = $tccs2->layTieuChuanCS();
$dstccs1 = $tccs1->layTieuChuanCS1();

if(isset($_POST['submit1'])){
  $box=$_POST['num'];
  while (list($key, $val) = @each($box)){
    $ketqua = $tccs2 ->xoaTieuChuanCS($val);
  }
  ?>
  <script type="text/javascript">
    window.location.href = window.location.href;
    // window.history.go(-1);
  </script>
  <?php
}
?>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #bbbbbb;
    text-align: left;
    padding: 8px;
}

th {
    text-align:center;
	background-color:#003366;
	padding: 8px;
	color:white;
		
}
tr:nth-child(even) {
    background-color: #eeeeee;
}
</style>

<h2><strong>Quản lý tieu chuan co so</strong></h2>        
<form name="form1" action="" method="POST">
<div style="width:600px; height:120px; margin: 15px 10px 10px 10px;"> 
  <label style="margin-left:45px"> Chu de: </label>     
  <select name="select" size="1" id="select"  
  style="width:320px;height:24px; font-size:14px; margin-bottom:5px; margin-right:20px;">
  <option value="">Tất cả</option>
  <?php
  foreach ($dstccs1 as $dsc1) {
    echo '<option value='.$dsc1["idc1"].'>'.$dsc1["ChuDe"].'</option>';
  }
  ?>
  </select>
  <input type="button" value= " DSCD" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them1()">
  <br>
  <label style="margin-left:67px;"> Ma: </label>     
  <input type="text" name="Ma" value="" style="width:480px; height:24px;margin-bottom:5px;">
  <br>
   <label style="margin-left:30px;"> Trich Yeu: </label>     
  <input type="text" name="TrichYeu" value="" style="width:240px; height:24px;margin-bottom:5px;">
  <label style="margin-left:64px;"> Ngày: </label>  
  <input type="text" class="datepicker" style="width:107px; height:24px;margin-bottom:5px;">
  <br />
  <input type="submit" name="submit1" value=" Gỡ bài"  style="width:80px;height:24px; float:right; margin-left:2px;"/>
  <input type="button" value= " Thêm mới" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them()">
</div>
<div class="kc"></div>
<div style="width:740px; min-height:580px; border-style:groove; border-width:thin;margin-left:10px;"> 
<table>
  <thead>
    <tr>
      <th width="30">STT</th>
      <th width="70">Ky Hieu</th>
      <th width="500">Trich Yeu</th>
      <th width="200">Ngày Ban Hanh</th>
      <th width="20">Sửa</th>
      <th width="20">Xem</th>
      <th width="20">Chọn</th>
    </tr>
  </thead>
  <tbody id="danhsach">
    <?php
      $stt = 1;
      foreach ($dstccs2 as $ds) { 
      ?>
          <tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['KyHieu']?></td>
            <td style="text-align: left;"><?=$ds['TrichYeu']?></td>
            <td style="text-align: center;"><?=$ds['NgayBanHanh']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-tccs&id-tccs=<?=$ds['id']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-tccs&id-tccs=<?=$ds['id']?>">Xem</a></td>
            <td style="text-align: center;">
              <input type="checkbox"  name='num[]' class="other" value='<?=$ds['id']?>' ></td>
          </tr>
      <?php
      }
    ?>
  </tbody>
</table>
</div>
</form>

<style>
.pagination>li{
    float: left;
    padding: 10px;
}
</style>

<div class="kc"></div>
<div style="margin-top: 50px;"></div>

<script language="javascript">
  function them1() {
    window.location.assign("?p=danh-sach-chu-de-tccs");
}

  function them() {
    window.location.assign("?p=them-tieu-chuan-co-so");
}

$(document).ready(function() {
  $("#select").change(function(){
      var chude = $('#select').val();
      if(chude == ""){
        window.location.assign("?p=quanlytieuchuancoso");
      }else{
        $.get("quan_ly_tieu_chuan_cs/ajax_tccs.php",{data: chude},function(data){
                $("#danhsach").html(data);
            });
      }
  });
});
</script>