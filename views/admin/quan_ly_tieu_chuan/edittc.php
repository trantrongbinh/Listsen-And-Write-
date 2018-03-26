<?php
include('../../model/database.class.php');
include('../../model/class.tcvn_cap1.php');

$tcvnc1 = new tcvnc1();
if (! isset($_GET['id-tc']) || $tcvnc1->checkTieuChuan1($_GET['id-tc']) == false ) {
     echo "<script>  alert('không tồn tại!!!');</script>";
    exit();
}
$tcvn1  = $tcvnc1->layMotTieuChuan1($_GET['id-tc']);
if( isset($_POST['sua']) ) {
    if ( $_POST['tentc'] ==""){
        echo '<div class="alert alert-danger"> Hãy kiểm tra thông tin!!!</div>';
    }else{
        $tcvn1moi = new tcvnc1();
        $tcvn1moi->setTenTCVN($_POST['tentc']);
        $kq = $tcvn1moi->suaTieuChuan1($_GET['id-tc']);
        if ($kq){
            $_SESSION['sua']= 'done';
            echo '<script>window.history.go(-2);</script>';
        }else{
            echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
        }
    }
}
?>

<div id="page-wrapper">
    <div class="">
        <h1 style="color: blue;">Tieu Chuan
            <small style="color: #3C3838; font-size: 16px;">Sua</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_edit">
            <div class="">
                <label>Ten Tieu Chuan</label>
                <br>
                <textarea class="text" name="tentc" placeholder="Nhập tên tieu chuan" rows="2" cols="20"><?=$tcvn1['TenTCVN']?></textarea>
            </div>
            <div class="kc"></div>
            <input name="sua" type="submit" value="Sua" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>