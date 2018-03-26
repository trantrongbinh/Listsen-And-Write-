<?php
include('../../model/database.class.php');
include('../../model/class.qcvn_cap1.php');

$qc = new qcvnc1();
if (! isset($_GET['id-qcvn']) || $qc->checkQuyChuan1($_GET['id-qcvn']) == false ) {
     echo "<script>  alert('không tồn tại!!!');</script>";
    exit();
}
$qcvn1  = $qc->layMotQuyChuan1($_GET['id-qcvn']);
if( isset($_POST['sua']) ) {
    if ( $_POST['tennganh'] =="" || $_POST['cap'] ==""){
        echo '<div class="alert alert-danger"> Hãy kiểm tra thông tin!!!</div>';
    }else{
        $qcvn1moi = new qcvnc1();
        $qcvn1moi->setTenNganh($_POST['tennganh']);
        $qcvn1moi->setCap($_POST['cap']);
        $kq = $qcvn1moi->suaQuyChuan1($_GET['id-qcvn']);
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
        <h1 style="color: blue;">Quy Chuan Cap I
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_edit">
            <div class="">
                <label>Ten Nganh</label>
                <br>
                <textarea class="text" name="tennganh" placeholder="Nhập tên quy chuan nganh" rows="2" cols="20"><?=$qcvn1['TenNganh']?></textarea>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Cap</label>
                <br>
                <input class="form-control" name="cap" placeholder="Cap hien thi tren menu" size="20" style=" padding: 2px;" value="<?=$qcvn1['cap']?>" />
            </div>
            <div class="kc"></div>
            <input name="sua" type="submit" value="Sua" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>