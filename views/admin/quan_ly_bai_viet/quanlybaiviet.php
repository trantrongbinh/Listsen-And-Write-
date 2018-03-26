<?php
include('../../model/database.class.php');
include('../../model/class.tintuc2.php');
$tintuc = new tintuc2();
$dstintuc = $tintuc->layTinTuc();

if(isset($_POST['submit1'])){
  $box=$_POST['num'];
  while (list($key, $val) = @each($box)){
    $ketqua = $tintuc ->xoaTinTuc($val);
  }
  ?>
  <script type="text/javascript">
    window.location.href = window.location.href;
  </script>
  <?php
}

if (isset($_SESSION['suatt']) && $_SESSION['suatt'] == 'done'){
    echo '<div class="alert alert-success"> Cập nhật thành công!!!</div>';
    $_SESSION['suatt'] = "";
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

<h2><strong>Quản lý bài viết</strong></h2>        
<form name="form1" action="" method="POST">
<div style="width:600px; height:120px;margin: 15px 10px 10px 10px;"> 
  <label style="margin-left:30px;"> Loại bài viết: </label>     
  <select name="select" size="1" id="select"  
  style="width:320px;height:24px; font-size:14px; margin-bottom:5px; margin-right:20px;">
  <option value="">Tất cả</option>
  <option value="XD">Xây Dựng</option>
  <option value="KHCN">Khoa Học Công Nghệ</option>
  </select>
  <input type="button" value= "Thong Bao" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them1()">
  <br>
  <label style="margin-left:60px;"> Tiêu đề: </label>     
  <input type="text" name="Tieude" value="" style="width:480px; height:24px;margin-bottom:5px;">
  <br>
   <label style="margin-left:60px;"> Tác giả: </label>     
  <input type="text" name="Tieude" value="" style="width:240px; height:24px;margin-bottom:5px;">
  <label style="margin-left:64px;"> Ngày: </label>  
  <input type="text" class="datepicker" style="width:107px; height:24px;margin-bottom:5px;">
  <br />
  <!-- <input type="submit" value= " Tìm kiếm  " style="width:100px;height:24px;margin-left:110px;"> -->
  <input type="submit" name="submit1" value=" Gỡ bài"  style="width:80px;height:24px; float:right; margin-left:2px;"/>
  <input type="button" value= " Thêm mới" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them()">
</div>

<div style="width:740px; min-height:580px; border-style:groove; border-width:thin;margin-left:10px;"> 
<table>
  <thead>
    <tr>
      <th width="30">STT</th>
      <th width="480">Tiêu đề</th>
      <th width="120">Người viết</th>
      <th width="100">Ngày</th>
      <th width="20">Sửa</th>
      <th width="20">Xem</th>
      <th width="20">Chọn</th>
    </tr>
  </thead>
  <tbody id="danhsach">
    <?php
      $stt = 1;
      foreach ($dstintuc as $ds) { 
      ?>
          <tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td><?=$ds['TieuDe']?></td>
            <td style="text-align: center;"><?=$ds['TacGia']?></td>
            <td style="text-align: center;"><?=$ds['Ngay']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit-bv&id-tintuc=<?=$ds['idTT']?>">Edit</a></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=chi-tiet-bv&id-tintuc=<?=$ds['idTT']?>">Xem</a></td>
            <td style="text-align: center;">
              <input type="checkbox"  name='num[]' class="other" value='<?=$ds['idTT']?>' ></td>
          </tr>
      <?php
      }
      
    ?>
  </tbody>
</table>
</div>
</form> 
<script language="javascript">
  function them() {
    window.location.assign("?p=them-bai-viet")
  }
  function them1() {
    window.location.assign("?p=danh-sach-thong-bao")
  }

$(document).ready(function() {
  $("#select").change(function(){
      var loai = $('#select').val();
      if(loai == ""){
        window.location.assign("?p=quanlybaiviet");
      }else{
        $.get("quan_ly_bai_viet/ajax_tt.php",{data: loai},function(data){
                $("#danhsach").html(data);
            });
      }
  });
});

</script>