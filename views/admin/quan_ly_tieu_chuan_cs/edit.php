<?php
include('../../model/database.class.php');
include('../../model/class.tccs1.php');
include('../../model/class.tccs2.php');
$tccs1 = new tccs1();
$tccs2 = new tccs2();
if (! isset($_GET['id-tccs']) || $tccs2->checkTieuChuanCS($_GET['id-tccs']) == false ) {
     echo "<script>  alert('không tồn tại!!!');</script>";
    exit();
}
$tccs = $tccs2->layMotTieuChuanCS($_GET['id-tccs']);
$chude = $tccs1->layTieuChuanCS1();
if( isset($_POST['sua']) ) {
    if ( $_POST['chude'] =="" || $_POST['ma'] =="" || $_POST['date'] =="" || $_POST['trichyeu'] =="" || $_POST['tags'] ==""){
        echo '<div class="alert alert-danger"> Hãy kiểm tra thông tin!!!</div>';
    }else{
        $tccsmoi = new tccs2();
        $tccsmoi->setIdC1($_POST['chude']);
        $tccsmoi->setMa($_POST['ma']);
        $tccsmoi->setDate($_POST['date']);
        $tccsmoi->setTrichYeu($_POST['trichyeu']);
        $tccsmoi->setTags($_POST['tags']);

        if($_FILES['uploadFile']['name'] != NULL){ // Đã chọn file
            //Kiểm tra định dạng tệp tin
            if($_FILES['uploadFile']['type'] == "application/pdf" || $_FILES['uploadFile']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                //Tiếp tục kiểm tra dung lượng
                $maxFileSize = 10 * 1000 * 1000; //MB
                if($_FILES['uploadFile']['size'] > ($maxFileSize * 1000 * 1000)){
                    echo 'Tập tin không được vượt quá: '.$maxFileSize.' MB';
                } else {
                    //Hợp lệ tiếp tục xử lý Upload
                    $path = '../upload/files/'; //Lưu trữ tập tin vào thư mục: images
                    $tmp_name = $_FILES['uploadFile']['tmp_name'];
                    $name = $_FILES['uploadFile']['name'];
                    $type = $_FILES['uploadFile']['type']; 
                    $size = $_FILES['uploadFile']['size']; 
                    //Upload file
                    move_uploaded_file($tmp_name,$path.$name);
                    $tccsmoi->setUrlpdf($name);  
                }
            } else {
                echo 'Tập tin là .pdf hoac .docx';
            }
        } else {
            $tccsmoi->setUrlpdf($tccs['Urlpdf']); 
        }
        $kq = $tccsmoi->suaTieuChuanCS($_GET['id-tccs']);
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
        <h1 style="color: blue;">Tieu Chuan Co So
            <small style="color: #3C3838; font-size: 16px;">Sua</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_edit" enctype="multipart/form-data">
            <div>
                <label> Chu de: </label>
                <br>  
                  <select name="chude" size="1" id="select"  
                  style="width:350px;height:24px; font-size:14px; margin-bottom:5px; margin-right:20px;">
                        <option value="0">---Select---</option>
                            <?php
                            foreach ($chude as $cd) {
                                echo '<option value="'.$cd["idc1"].'"';
                                    if(isset($tccs['idc1']) && $tccs['idc1'] == $cd['idc1']){
                                        echo 'selected';
                                    }
                                    echo '>'.$cd["ChuDe"].'</option>';
                            }
                            ?>
                  </select>
            </div>
            <br>
            <div class="">
                <label>Ky Hieu</label>
                <br>
                <input class="form-control" name="ma" placeholder="Nhap ma" size="40" style=" padding: 2px;" value="<?=$tccs['KyHieu']?>" />
            </div>
            <br>
            <div>
                <label> Ngày Ban Hành: </label>
                <br> 
                <input type="text" name="date" class="datepicker" style="width:150px; height:20px;margin-bottom:5px;" value="<?=$tccs['NgayBanHanh']?>">
            </div>
            <br>
            <div class="">
                <label>Trích Yếu</label>
                <br>
                <textarea class="text" name="trichyeu" placeholder="Nhập tiêu đề" rows="3" cols="20"><?=$tccs['TrichYeu']?></textarea>
            </div>
            <div class="kc"></div>
            <!-- <div id="btnThemFile" style="float:left">Thêm file</div> -->
            <div id="chonFile">
                <b><?=$tccs['Urlpdf']?></b>
                <input name='uploadFile' type='file' >
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Tags</label>
                <br>
                <textarea class="text" name="tags" placeholder="Nhập từ khóa" rows="2" cols="20"><?=$tccs['Tags']?></textarea>
            </div>
            <div class="kc"></div>
            <button type="submit" name="sua">Sửa</button>
            <button type="reset" >Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>