<?php
include('../../model/database.class.php');
include('../../model/class.tcvn_cap2.php');
include('../../model/class.tcvn_cap3.php');
$tcvn2 = new tcvnc2();
$tcvn3 = new tcvnc3();
if (! isset($_GET['id-tcvn3']) || $tcvn3->checkTieuChuan3($_GET['id-tcvn3']) == false ) {
     echo "<script>  alert('không tồn tại!!!');</script>";
    exit();
}
$tcvnc3 = $tcvn3->layMotTieuChuan3($_GET['id-tcvn3']);
$tcvnc2 = $tcvn2->layTieuChuan2();
if( isset($_POST['sua']) ) {
    if ( $_POST['chude'] =="" || $_POST['ma'] =="" || $_POST['date'] =="" || $_POST['trichyeu'] =="" || $_POST['tags'] ==""){
        echo '<div class="alert alert-danger"> Hãy kiểm tra thông tin!!!</div>';
    }else{
        $tcvnmoi = new tcvnc3();
        $tcvnmoi->setIdC2($_POST['chude']);
        $tcvnmoi->setMa($_POST['ma']);
        $tcvnmoi->setDate($_POST['date']);
        $tcvnmoi->setTrichYeu($_POST['trichyeu']);
        $tcvnmoi->setTags($_POST['tags']);

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
                    $tcvnmoi->setUrlpdf($name);  
                }
            } else {
                echo 'Tập tin là .pdf hoac .docx';
            }
        } else {
            $tcvnmoi->setUrlpdf($tcvnc3['Urlpdf']); 
        }
        $kq = $tcvnmoi->suaTieuChuan3($_GET['id-tcvn3']);
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
        <h1 style="color: blue;">Tieu Chuan Viet Nam
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
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
                            foreach ($tcvnc2 as $tc2) {
                                echo '<option value="'.$tc2["idc2"].'"';
                                    if(isset($tcvnc3['idc2']) && $tcvnc3['idc2'] == $tc2['idc2']){
                                        echo 'selected';
                                    }
                                    echo '>'.$tc2["ChuDe"].'</option>';
                            }
                            ?>
                  </select>
            </div>
            <br>
            <div class="">
                <label>Mã</label>
                <br>
                <input class="form-control" name="ma" placeholder="Nhap ma" size="40" style=" padding: 2px;" value="<?=$tcvnc3['Ma']?>" />
            </div>
            <br>
            <div>
                <label> Ngày Ban Hành: </label>
                <br> 
                <input type="text" name="date" class="datepicker" style="width:150px; height:20px;margin-bottom:5px;" value="<?=$tcvnc3['NgayBanHanh']?>">
            </div>
            <br>
            <div class="">
                <label>Trích Yếu</label>
                <br>
                <textarea class="text" name="trichyeu" placeholder="Nhập tiêu đề" rows="3" cols="20"><?=$tcvnc3['TrichYeu']?></textarea>
            </div>
            <div class="kc"></div>
            <!-- <div id="btnThemFile" style="float:left">Thêm file</div> -->
            <div id="chonFile">
                <b><?=$tcvnc3['Urlpdf']?></b>
                <input name='uploadFile' type='file' >
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Tags</label>
                <br>
                <textarea class="text" name="tags" placeholder="Nhập từ khóa" rows="2" cols="20"><?=$tcvnc3['Tags']?></textarea>
            </div>
            <div class="kc"></div>
            <button type="submit" name="sua">Sửa</button>
            <button type="reset" >Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>