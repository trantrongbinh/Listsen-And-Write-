<?php
include('../../model/database.class.php');
include('../../model/class.qcvn_cap1.php');
include('../../model/class.qcvn_cap2.php');
include('../../controller/pager.php');
$qcvn = new qcvn();
$qcvn1 = new qcvnc1();

$dsqcvn1 = $qcvn1->layQuyChuan1();
$dsqc2 = $qcvn->layQuyChuan2();

$dsqcvn2 = $qcvn->danhSachQCVN2();
$danhsachqc2 = $dsqcvn2['danhmucquychuan'];
$thanhphantrang = $dsqcvn2['thanhphantrang'];

if(isset($_POST['submit1'])){
  $box=$_POST['num'];
  while (list($key, $val) = @each($box)){
    $ketqua = $qcvn ->xoaQuyChuan2($val);
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

<h2><strong>Quản lý quy chuẩn</strong></h2>        
<form name="form1" action="" method="POST">
<div style="width:600px; height:120px; margin: 15px 10px 10px 10px;"> 
  <label> Loại quy chuẩn: </label>     
  <select name="select" size="1" id="select"  
  style="width:320px;height:24px; font-size:14px; margin-bottom:5px; margin-right:20px;">
  <option value="">Tất cả</option>
  <?php
  foreach ($dsqcvn1 as $dsc1) {
    echo '<option value='.$dsc1["idc1"].'>'.$dsc1["TenNganh"].'</option>';
  }
  ?>
  <!-- <option value="">Quy Chuẩn Bộ Xây Dựng</option>
  <option value="">Quy Chuẩn Bộ Khoa Học Công Nghệ</option>
  <option value="">Quy Chuẩn Bộ Tài Nguyên Môi Trường</option>
  <option value="">Quy Chuẩn Bộ Công Thương</option> -->
  </select>
  <input type="button" value= " DSLQC" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them1()">
  <br>
  <label style="margin-left:68px;"> Ma: </label>     
  <input type="text" name="Ma" value="" style="width:480px; height:24px;margin-bottom:5px;">
  <br>
   <label style="margin-left:30px;"> Trich Yeu: </label>     
  <input type="text" name="TrichYeu" value="" style="width:240px; height:24px;margin-bottom:5px;">
  <label style="margin-left:64px;"> Ngày: </label>  
  <input type="text" class="datepicker" style="width:107px; height:24px;margin-bottom:5px;">
  <br />
  <!-- <input type="submit" value= " Tìm kiếm  " style="width:100px;height:24px;margin-left:110px;"> -->
  <input type="submit" name="submit1" value=" Gỡ bài"  style="width:80px;height:24px; float:right; margin-left:2px;"/>
  <input type="button" value= " Thêm mới" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them()">
</div>
<div class="kc"></div>
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
  <tbody id="danhsachqc">
    <?php
      $stt = 1;
      foreach ($danhsachqc2 as $ds) { 
      ?>
          <tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['Ma']?></td>
            <td style="text-align: left;"><?=$ds['TrichYeu']?></td>
            <td style="text-align: center;"><?=$ds['NgayBanHanh']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-qc&id-qcvn=<?=$ds['idc2']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-qc&id-qcvn=<?=$ds['idc2']?>">Xem</a></td>
            <td style="text-align: center;">
              <input type="checkbox"  name='num[]' class="other" value='<?=$ds['idc2']?>' ></td>
          </tr>
      <?php
      }
    ?>
  </tbody>
</table>
</div>
</form>
<div id="phantrang" style = "text-align: center;"><?=$thanhphantrang?></div>

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
    window.location.assign("?p=danh-sach-quy-chuan-cac-nganh");
}

  function them() {
    window.location.assign("?p=them-quy-chuan");
}

$(document).ready(function() {
  $("#select").change(function(){
      var nganh = $('#select').val();
      if(nganh == ""){
        window.location.assign("?p=quanlyquychuan");
      }else{
        $.get("quan_ly_quy_chuan/ajax_qc.php",{data: nganh},function(data){
                $("#danhsachqc").html(data);
            });
      }
  });
});
</script>