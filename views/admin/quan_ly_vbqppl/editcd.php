<?php
include('../../model/database.class.php');
include('../../model/class.vbqppl1.php');

$vbqppl1 = new vbqppl1();
if (! isset($_GET['id-vbqppl1']) || $vbqppl1->checkVBQPPL1($_GET['id-vbqppl1']) == false ) {
     echo "<script>  alert('không tồn tại!!!');</script>";
    exit();
}
$vbqpplc1  = $vbqppl1->layMotVBQPPL1($_GET['id-vbqppl1']);
if( isset($_POST['sua']) ) {
    if ( $_POST['chude'] ==""){
        echo '<div class="alert alert-danger"> Hãy kiểm tra thông tin!!!</div>';
    }else{
        $vbqppl1moi = new vbqppl1();
        $vbqppl1moi->setChuDe($_POST['chude']);
        $kq = $vbqppl1moi->suaVBQPPL1($_GET['id-vbqppl1']);
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
        <h1 style="color: blue;">Loại VBQPPL
            <small style="color: #3C3838; font-size: 16px;">Sua</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_edit">
            <div class="">
                <label>Loại</label>
                <br>
                <textarea class="text" name="chude" placeholder="Nhập chu de" rows="2" cols="20"><?=$vbqpplc1['ChuDe']?></textarea>
            </div>
            <div class="kc"></div>
            <input name="sua" type="submit" value="Sua" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>