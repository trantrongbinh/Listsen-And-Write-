<?php
include('../../model/database.class.php');
include('../../model/class.thongbao.php');

if(isset($_POST["submit"])){
    //xu lý them
    if ( $_POST['tieude'] =="" || $_POST['noidung'] ==""){
        echo '<div class="alert alert-danger"> Hãy điền đầy đủ thông tin!!!</div>';
    }
    else{
        $thongbaomoi = new thongbao();
        $thongbaomoi->setTieude($_POST['tieude']);
        $thongbaomoi->setNoidung($_POST['noidung']);
        $kq = $thongbaomoi->themThongBao();
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
        <h1 style="color: blue;">Thông Báo
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_them" enctype="multipart/form-data">
            <div class="">
                <label>Tiêu đề</label>
                <br>
                <textarea class="text" name="tieude" placeholder="Nhập tiêu đề" rows="3" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Nội dung</label>
                <br>
                <textarea id="noidung" name="noidung" class="ckeditor" rows="5"></textarea>
            </div>
            <div class="kc"></div>
            <input name="submit" type="submit" value="Thêm" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>