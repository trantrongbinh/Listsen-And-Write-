<?php
include('../../model/database.class.php');
include('../../model/class.thongbao.php');

$tb = new thongbao();
if (! isset($_GET['id-tb']) || $tb->checkThongBao($_GET['id-tb']) == false ) {
     echo "<script>  alert('Tin tức không tồn tại!!!');</script>";
    exit();
}
$thongbao  = $tb->layMotThongBao($_GET['id-tb']);
if( isset($_POST['sua']) ) {
    if ( $_POST['tieude'] =="" || $_POST['noidung'] =="" ){
        echo '<div class="alert alert-danger"> Hãy kiểm tra thông tin!!!</div>';
    }else{
        $tbmoi = new thongbao();
        $tbmoi->setTieude($_POST['tieude']);
        $tbmoi->setNoidung($_POST['noidung']);
        $kq = $tbmoi->suaThongBao($_GET['id-tb']);
        if ($kq){
            $_SESSION['suatt']= 'done';
            echo '<script>window.history.go(-2);</script>';
        }else{
            echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
        }
    }
}

?>

<div id="page-wrapper">
    <div class="">
        <h1 style="color: blue;">Thong Bao
            <small style="color: #3C3838; font-size: 16px;">Edit</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_edit" enctype="multipart/form-data">
            <div class="">
                <label>Tiêu đề</label>
                <br>
                <textarea class="text" name="tieude" placeholder="Nhập tiêu đề" rows="3" cols="20"><?php echo $thongbao['TieuDe']?></textarea>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Nội dung</label>
                <br>
                <textarea id="noidung" name="noidung" class="ckeditor" rows="5"><?php echo $thongbao['NoiDung']?></textarea>
            </div>
            <div class="kc"></div>
            <button type="submit" name="sua">Sửa</button>
            <button type="reset" >Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>