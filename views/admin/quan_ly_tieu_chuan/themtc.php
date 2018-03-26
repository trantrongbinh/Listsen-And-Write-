<?php
include('../../model/database.class.php');
include('../../model/class.tcvn_cap1.php');

if(isset($_POST["submit"])){
    //xu lý them
    if ( $_POST['tentc'] ==""){
        echo '<div class="alert alert-danger"> Hãy điền đầy đủ thông tin!!!</div>';
    }
    else{
        $tc1moi = new tcvnc1();
        $tc1moi->setTenTCVN($_POST['tentc']);
        $kq = $tc1moi->themTieuChuan1();
        if ($kq){
            echo "<script>  alert('Thêm mới thành công'); window.history.go(-1);</script>";
            //echo '<div class="alert alert-success"> Thêm mới thành công</div>';
        }
        else{
            echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
        }
        
    } 
}
?>

<div id="page-wrapper">
    <div class="">
        <h1 style="color: blue;">Tieu Chuan
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_them">
            <div class="">
                <label>Ten Tieu Chuan</label>
                <br>
                <textarea class="text" name="tentc" placeholder="Nhập tên quy chuan nganh" rows="2" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <input name="submit" type="submit" value="Thêm" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>