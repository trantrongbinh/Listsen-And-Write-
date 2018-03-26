<?php
include('../../model/database.class.php');
include('../../model/class.qcvn_cap1.php');

if(isset($_POST["submit"])){
    //xu lý them
    if ( $_POST['tennganh'] =="" || $_POST['cap'] ==""){
        echo '<div class="alert alert-danger"> Hãy điền đầy đủ thông tin!!!</div>';
    }
    else{
        $qcmoi = new qcvnc1();
        $qcmoi->setTenNganh($_POST['tennganh']);
        $qcmoi->setCap($_POST['cap']);
        $kq = $qcmoi->themQuyChuan1();
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
        <h1 style="color: blue;">Quy Chuan Cap I
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_them">
            <div class="">
                <label>Ten Nganh</label>
                <br>
                <textarea class="text" name="tennganh" placeholder="Nhập tên quy chuan nganh" rows="2" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Cap</label>
                <br>
                <input class="form-control" name="cap" placeholder="Cap hien thi tren menu" size="20" style=" padding: 2px;" />
            </div>
            <div class="kc"></div>
            <input name="submit" type="submit" value="Thêm" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>