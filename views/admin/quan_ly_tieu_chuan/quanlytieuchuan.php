<?php
include('../../model/database.class.php');
include('../../model/class.tcvn_cap1.php');
include('../../model/class.tcvn_cap2.php');
include('../../model/class.tcvn_cap3.php');
include('../../controller/pager.php');
$tcvn1 = new tcvnc1();
$tcvn2 = new tcvnc2();
$tcvn3 = new tcvnc3();

$dstcvn1 = $tcvn1->layTieuChuan1();
$dstcvn2 = $tcvn2->layTieuChuan2();
$dstcvn3 = $tcvn3->layTieuChuan3();

// $dsqcvn2 = $qcvn->danhSachQCVN2();
// $danhsachqc2 = $dsqcvn2['danhmucquychuan'];
// $thanhphantrang = $dsqcvn2['thanhphantrang'];

if(isset($_POST['submit1'])){
  $box=$_POST['num'];
  while (list($key, $val) = @each($box)){
    $ketqua = $tcvn3 ->xoaTieuChuan3($val);
  }
  ?>
  <script type="text/javascript">
     window.location.href = window.location.href;
    window.history.go(-1);
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

<h2><strong>Quản lý tiêu chuẩn</strong></h2>        
<form name="form1" action="" method="POST">
<div style="width:600px; height:150px;margin: 15px 10px 10px 10px;"> 
  <label style="margin-left:30px;"> Tiêu Chuẩn: </label>     
  <select name="select1" size="1" id="select1"  
  style="width:370px;height:24px; font-size:14px; margin-bottom:5px; margin-right:20px;">
  <?php
  foreach ($dstcvn1 as $dsc1) {
    echo '<option value='.$dsc1["idc1"].'>'.$dsc1["TenTCVN"].'</option>';
  }
  ?>
  </select>
  <input type="button" value= " DSTC" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them1()">
  <br>
  <label style="margin-left:52px;"> Chủ Đề: </label>     
  <select name="select2" size="1" id="select2"  
  style="width:370px;height:24px; font-size:14px; margin-bottom:5px; margin-right:20px;">
  <?php
  foreach ($dstcvn2 as $dsc2) {
    echo '<option value='.$dsc2["idc2"].'>'.$dsc2["ChuDe"].'</option>';
  }
  ?>
  </select>
  <input type="button" value= " DSCD" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them2()">
  <br>
  <label style="margin-left:40px;"> Trich Yeu: </label>     
  <input type="text" name="trichyeu" value="" style="width:490px; height:24px;margin-bottom:5px;">
  <br>
   <label style="margin-left:78px;"> Ma: </label>     
  <input type="text" name="ma" value="" style="width:240; height:24px;margin-bottom:5px;">
  <label style="margin-left:64px;"> Ngày: </label>  
  <input type="text" class="datepicker" style="width:107px; height:24px;margin-bottom:5px;">
  <br />
  <input type="submit" name="submit1" value=" Gỡ bài"  style="width:80px;height:24px; float:right; margin-left:2px;"/>
  <input type="button" value= " Thêm mới" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them()">
</div>

<div style="width:740px; min-height:580px; border-style:groove; border-width:thin;margin-left:10px;"> 
<table>
  <thead>
    <tr>
      <th width="30">STT</th>
      <th width="70">Ma</th>
      <th width="500">Trich Yeu</th>
      <th width="200">Ngày Ban Hanh</th>
      <th width="20">Sửa</th>
      <th width="20">Xem</th>
      <th width="20">Chọn</th>
    </tr>
  </thead>
  <tbody id="danhsachtc">
    <?php
      $stt = 1;
      foreach ($dstcvn3 as $ds) { 
      ?>
          <tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['Ma']?></td>
            <td style="text-align: left;"><?=$ds['TrichYeu']?></td>
            <td style="text-align: center;"><?=$ds['NgayBanHanh']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-tcvn&id-tcvn3=<?=$ds['idc3']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-tcvn&id-tcvn3=<?=$ds['idc3']?>">Xem</a></td>
            <td style="text-align: center;">
              <input type="checkbox"  name='num[]' class="other" value='<?=$ds['idc3']?>' ></td>
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
  window.location.assign("?p=danh-sach-tieu-chuan");
}

function them2() {
  window.location.assign("?p=danh-sach-chu-de");
}

function them() {
  window.location.assign("?p=them-tieu-chuan-vn");
}

$(document).ready(function() {
  $("#select1").change(function(){
    var tieuchuan = $('#select1').val();
    $.get("quan_ly_tieu_chuan/ajax_tc1.php",{data: tieuchuan},function(data){
        $("#select2").html(data);
          var chude = $('#select2').val();
          $.get("quan_ly_tieu_chuan/ajax_tc2.php",{data: chude},function(data){
          $("#danhsachtc").html(data);
        });
    });
  });

  $("#select2").change(function(){
    var chude = $('#select2').val();
    $.get("quan_ly_tieu_chuan/ajax_tc2.php",{data: chude},function(data){
        $("#danhsachtc").html(data);
    });
  });

});

</script>