<?php
include('../../model/database.class.php');
include('../../model/class.tintuc2.php');

if(isset($_POST["submit"])){
    //xu lý them
    if ( $_POST['tieude'] =="" || $_POST['tomtat'] =="" || $_POST['noidung'] =="" || $_POST['tags'] =="" || $_POST['tacgia'] =="" || $_POST['loai'] =="" || $_POST['noibat'] =="" ){
        echo '<div class="alert alert-danger"> Hãy điền đầy đủ thông tin!!!</div>';
    }
    else{
        $tintucmoi = new tintuc2();
        $tintucmoi->setTieude($_POST['tieude']);
        $tintucmoi->setTomtat($_POST['tomtat']);
        $tintucmoi->setNoidung($_POST['noidung']);
        $tintucmoi->setTags($_POST['tags']);
        $tintucmoi->setTacgia($_POST['tacgia']);
        $tintucmoi->setLoai($_POST['loai']);
        $tintucmoi->setNoibat($_POST['noibat']);

        if($_FILES['uploadFile']['name'] != NULL){ // Đã chọn file
            //Kiểm tra định dạng tệp tin
            if($_FILES['uploadFile']['type'] == "image/jpeg" || $_FILES['uploadFile']['type'] == "image/png" || $_FILES['uploadFile']['type'] == "image/gif"){
                //Tiếp tục kiểm tra dung lượng
                $maxFileSize = 10 * 1000 * 1000; //MB
                if($_FILES['uploadFile']['size'] > ($maxFileSize * 1000 * 1000)){
                    echo 'Tập tin không được vượt quá: '.$maxFileSize.' MB';
                } else {
                    //Hợp lệ tiếp tục xử lý Upload
                    $path = '../upload/images/'; //Lưu trữ tập tin vào thư mục: images
                    $tmp_name = $_FILES['uploadFile']['tmp_name'];
                    $name = $_FILES['uploadFile']['name'];
                    $type = $_FILES['uploadFile']['type']; 
                    $size = $_FILES['uploadFile']['size']; 
                    //Upload file
                    move_uploaded_file($tmp_name,$path.$name);
                    $tintucmoi->setUrlhinh($name);  
                    $kq = $tintucmoi->themTinTuc();
                    if ($kq){
                        echo "<script>  alert('Thêm mới thành công'); window.history.go(-1);</script>";
                        //echo '<div class="alert alert-success"> Thêm mới thành công</div>';
                    }
                    else{
                        echo '<div class="alert alert-error"> Có lỗi xảy ra, hãy kiểm tra lại dữ liệu!!!</div>';
                    }
                    // echo 'Tải tập tin thành công !<br />';
                    // echo 'Tên Tập tin: '.$name.'<br />';
                    // echo 'Định dạng: '.$type.'<br />';
                    // echo 'Dung lượng: '.$size;
                }
            } else {
                echo 'Tập tin phải là hình ảnh';
            }
        } else {
            echo 'Vui lòng chọn tập tin';
        }
    }
    
}

?>

<div id="page-wrapper">
    <div class="">
        <h1 style="color: blue;">Tin tức
            <small style="color: #3C3838; font-size: 16px;">Thêm</small>
        </h1>
    </div>
    <div class="content">
        <br>
        <form action="" method="POST" name="form_them" enctype="multipart/form-data">
            <div class="">
                <label>Tiêu đề</label>
                <br>
                <textarea class="text" name="tieude" placeholder="Nhập tiêu đề" rows="3" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Tóm tắt</label>
                <br>
                <textarea class="text" name="tomtat" placeholder="Nhập tóm tắt" rows="3" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Nội dung</label>
                <br>
                <textarea id="noidung" name="noidung" class="ckeditor" rows="5"></textarea>
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
            <div class="">
                <label>Tác giả</label>
                <br>
                <textarea class="text" name="tacgia" placeholder="Nhập tên tác giả" rows="2" cols="20"></textarea>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Loại:</label>
                <br>
                <label class="radio-inline">
                    <input name="loai" value="XD" checked="" type="radio">Tin Xây Dựng
                </label>
                <label class="radio-inline">
                    <input name="loai" value="KHCN" type="radio">Tin Khoa Học Công Nghệ
                </label>
            </div>
            <div class="kc"></div>
            <div class="">
                <label>Nổi bật:</label>
                <br>
                <label class="radio-inline">
                    <input name="noibat" value="0" checked="" type="radio">Tin thường
                </label>
                <label class="radio-inline">
                    <input name="noibat" value="1" type="radio">Tin nổi bật
                </label>
            </div>
            <div class="kc"></div>
            <input name="submit" type="submit" value="Thêm" />
            <button type="reset">Exit</button>
        </form>
    </div>
</div>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>