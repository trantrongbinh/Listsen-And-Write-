<?php
include('../../model/database.class.php');
include('../../model/class.tcnn1.php');
include('../../model/class.tcnn2.php');
$tcnn1 = new tcnn1();
$tcnn2 = new tcnn2();
$dstcnn1 = $tcnn1->layTieuChuanNN1();

if(isset($_POST["submit"])){
    //xu lý them
    if ( $_POST['chude'] =="" || $_POST['ma'] =="" || $_POST['date'] =="" || $_POST['trichyeu'] =="" || $_POST['tags'] ==""){
        echo '<div class="alert alert-danger"> Hãy điền đầy đủ thông tin!!!</div>';
    }
    else{
        $tcnnmoi = new tcnn2();
        $tcnnmoi->setIdc1($_POST['chude']);
        $tcnnmoi->setMa($_POST['ma']);
        $tcnnmoi->setDate($_POST['date']);
        $tcnnmoi->setTrichYeu($_POST['trichyeu']);
        $tcnnmoi->setTags($_POST['tags']);

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
                    $tcnnmoi->setUrlpdf($name);
                    echo 'Tải tập tin thành công !<br />';
                    echo 'Tên Tập tin: '.$name.'<br />';
                    echo 'Định dạng: '.$type.'<br />';
                    echo 'Dung lượng: '.$size;
                    $kq = $tcnnmoi->themTieuChuanNN2();
                    if ($kq){
                        echo "<script>  alert('Thêm mới thành công'); window.history.go(-1);</script>";
                        //echo '<div class="alert alert-success"> Thêm mới thành công</div>';
                    }
                    else{
                        echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
                    }
                }
            } else {
                echo 'Tập tin là .pdf hoac .docx';
            }
        } else {
            echo 'Vui lòng chọn tập tin';
        }
    }
    
}

?>

<div id="page-wrapper">
    <div class="">
        <h1 style="color: blue;">Tieu Chuan Co So
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_them" enctype="multipart/form-data">
            <div>
                <label> Chu De: </label>
                <br>  
                  <select name="chude" size="1" id="select"  
                  style="width:320px;height:24px; font-size:14px; margin-bottom:5px; margin-right:20px;">
                  <option value="">Tất cả</option>
                  <?php
                  foreach ($dstcnn1 as $ds) {
                    ?>
                    <option value="<?=$ds['idc1']?>"><?=$ds['ChuDe']?></option>
                    <?php
                  }
                  ?>
                  </select>
            </div>
            <br>
            <div class="">
                <label>Mã</label>
                <br>
                <input class="form-control" name="ma" placeholder="Nhap ma" size="40" style=" padding: 2px;" />
            </div>
            <br>
            <div>
                <label> Ngày Ban Hành: </label>
                <br> 
                <input type="text" name="date" class="datepicker" style="width:150px; height:20px;margin-bottom:5px;">
            </div>
            <br>
            <div class="">
                <label>Trích Yếu</label>
                <br>
                <textarea class="text" name="trichyeu" placeholder="Nhập tiêu đề" rows="3" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <!-- <div id="btnThemFile" style="float:left">Thêm file</div> -->
            <div id="chonFile">
                <input name='uploadFile' type='file' >
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Tags</label>
                <br>
                <textarea class="text" name="tags" placeholder="Nhập từ khóa" rows="2" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <input name="submit" type="submit" value="Thêm" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>