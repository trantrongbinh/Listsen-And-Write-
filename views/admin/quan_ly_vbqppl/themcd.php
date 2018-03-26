<?php
include('../../model/database.class.php');
include('../../model/class.vbqppl1.php');

if(isset($_POST["submit"])){
    //xu lý them
    if ( $_POST['chude'] ==""){
        echo '<div class="alert alert-danger"> Hãy điền đầy đủ thông tin!!!</div>';
    }
    else{
        $chudemoi = new vbqppl1();
        $chudemoi->setChuDe($_POST['chude']);
        $kq = $chudemoi->themVBQPPL1();
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
        <h1 style="color: blue;">Loại VBQPPL
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_them">
            <div class="">
                <label>Loại VB:</label>
                <br>
                <textarea class="text" name="chude" placeholder="Nhập tên quy chuan nganh" rows="2" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <input name="submit" type="submit" value="Thêm" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>