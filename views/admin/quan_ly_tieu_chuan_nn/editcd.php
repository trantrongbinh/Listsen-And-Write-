<?php
include('../../model/database.class.php');
include('../../model/class.tcnn1.php');

$tcnn1 = new tcnn1();
if (! isset($_GET['id-tcnn1']) || $tcnn1->checkTieuChuanNN1($_GET['id-tcnn1']) == false ) {
     echo "<script>  alert('không tồn tại!!!');</script>";
    exit();
}
$tccnn1  = $tcnn1->layMotTieuChuanNN1($_GET['id-tcnn1']);
if( isset($_POST['sua']) ) {
    if ( $_POST['chude'] ==""){
        echo '<div class="alert alert-danger"> Hãy kiểm tra thông tin!!!</div>';
    }else{
        $tcnn1moi = new tcnn1();
        $tcnn1moi->setChuDe($_POST['chude']);
        $kq = $tcnn1moi->suaTieuChuanNN1($_GET['id-tcnn1']);
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
        <h1 style="color: blue;">Chu De TCNN
            <small style="color: #3C3838; font-size: 16px;">Sua</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_edit">
            <div class="">
                <label>Chu De</label>
                <br>
                <textarea class="text" name="chude" placeholder="Nhập chu de" rows="2" cols="20"><?=$tccnn1['ChuDe']?></textarea>
            </div>
            <div class="kc"></div>
            <input name="sua" type="submit" value="Sua" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>