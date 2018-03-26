<?php
	session_start();
	if(isset($_GET["p"])) $p = $_GET["p"];
	else $p = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
 		<link rel="Shortcut Icon" href="../images/favicon.ico">
 		<title>Tiêu chuẩn và quy chuẩn ngành xây dựng</title>
   	<link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../library/jquery-3.2.1.min.js"/>
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../ckfinder/ckfinder.js"></script>
    <script>CKEDITOR.replace('noidung')</script>

    <!--chèn lịch-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript">
    $(function() {
      $.datepicker.regional['vi'] = {
      closeText: 'Ðóng',
      prevText: '&#x3c;Trước',
      nextText: 'Tiếp&#x3e;',
      currentText: 'Hôm nay',
      monthNames: [' Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Tư', 'Tháng Năm', 'Tháng Sáu',
      'Tháng Bảy', 'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng Mười Một', 'Tháng Mười Hai'],
      monthNamesShort: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
      'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
      dayNamesShort: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
      dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
      weekHeader: 'Tu',
      dateFormat: 'yy-mm-dd',
      firstDay: 0,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''};
      $.datepicker.setDefaults($.datepicker.regional['vi']);
      $(".datepicker").datepicker();
    });
    </script>
    <!--end chen lich-->
</head>
<body>
<div class="main">
    <img src="../images/banner_TCQC.png" width="960" height="118" style="margin-bottom:1px;"/> 
      <div style="height: 32px; background-color:#006;">
        <img src="../images/lich.gif" width="18" height="18" style="float:left; padding-left:10px; padding-top:7px"/>
        <p style="float:left; font-size:14px; color:white; padding:9px 20px;"> <script> document.write("8/7/2017"); </script></p>
        <?php
        if(isset(($_SESSION['user_name']))){
        ?>
          <p style="float:right; font-size:14px; color:white; padding:9px 20px;"> Tên đăng nhập: <?= $_SESSION['user_name']?>(<a href="../blocks/logout.php" style="font-size:14px; color:white;"> Thoát </a>)</p>
                <?php
                if ($_SESSION['per'] == 'quantribaiviet' ) {
                    ?>
                        <script>
                            $(document).ready(function(){
                                $('.disabled').click(function(e){
                                    e.preventDefault();
                                })
                                $('.disabled').css({'background':'#dedede'});
                            });
                        </script>
                    <?php
                }
                if ($_SESSION['per'] == 'quantrixaydung' ) {
                    ?>
                        <script>
                            $(document).ready(function(){
                                $('.disabled2').click(function(e){
                                    e.preventDefault();
                                })
                                $('.disabled2').css({'background':'#dedede'});
                            });
                        </script>
                    <?php
                }
          
              }
            ?>
      </div>
      <div class ="Content">
        <div class="vertical-menu">
                      <a href="admin.php">Hướng dẫn sử dụng</a>
                      <a href="admin.php?p=quanlybaiviet" class="disabled2" id="message">Quản lý tin tức, thông báo</a>
                      <a href="admin.php?p=quanlyquychuan" class="disabled">Quy chuẩn quốc gia</a>
                      <a href="admin.php?p=quanlytieuchuan" class="disabled">Tiêu chuẩn quốc gia</a>
                      <a href="admin.php?p=quanlytieuchuancoso" class="disabled">Tiêu chuẩn cơ sở</a>
                      <a href="admin.php?p=quanlytieuchuannuocngoai" class="disabled">Tiêu chuẩn nước ngoài</a>
                      <a href="admin.php?p=quanlyvbqppl" class="disabled">Quản lý VBQPPL</a>
                      <a href="admin.php?p=quanlynguoidung" class="disabled disabled2">Quản lý người dùng</a>
                      <a href="#" class="disabled disabled2">Backup hệ thống</a>
          </div>
          <div class ="RightMenu">
           <?php
           switch ($p) {
           	case 'quanlybaiviet':
           		require "quan_ly_bai_viet/quanlybaiviet.php";
           		break;
            case 'danh-sach-thong-bao':
              require "quan_ly_bai_viet/thongbao.php";
              break;
            case 'them-tb':
              require "quan_ly_bai_viet/themtb.php";
              break;
            case 'edit-tb':
              require "quan_ly_bai_viet/edittb.php";
              break;
            case 'chi-tiet-tb':
              require "quan_ly_bai_viet/chitiettb.php";
              break;
            case 'them-bai-viet':
              require "quan_ly_bai_viet/them.php";
              break;
           	case 'chi-tiet-bv':
              require "quan_ly_bai_viet/chitiet.php";
              break;
            case 'edit-bv':
              require "quan_ly_bai_viet/edit.php";
              break;

            case 'quanlyquychuan':
              require "quan_ly_quy_chuan/quanlyquychuan.php";
              break;
            case 'danh-sach-quy-chuan-cac-nganh':
              require "quan_ly_quy_chuan/dsqc1.php";
              break;
            case 'them-nganh':
              require "quan_ly_quy_chuan/them1.php";
              break;
            case 'edit1':
              require "quan_ly_quy_chuan/edit1.php";
              break;
            case 'them-quy-chuan':
              require "quan_ly_quy_chuan/them.php";
              break;
            case 'chi-tiet-qc':
              require "quan_ly_quy_chuan/chitiet.php";
              break;
            case 'edit-qc':
              require "quan_ly_quy_chuan/edit.php";
              break;

            case 'quanlytieuchuan':
              require "quan_ly_tieu_chuan/quanlytieuchuan.php";
              break;
            case 'danh-sach-tieu-chuan':
              require "quan_ly_tieu_chuan/dstc.php";
              break;
            case 'them-tieu-chuan':
              require "quan_ly_tieu_chuan/themtc.php";
              break;
            case 'edit-tc':
              require "quan_ly_tieu_chuan/edittc.php";
              break;
            case 'danh-sach-chu-de':
              require "quan_ly_tieu_chuan/dscd.php";
              break;
            case 'them-chu-de':
              require "quan_ly_tieu_chuan/themcd.php";
              break;
            case 'edit-cd':
              require "quan_ly_tieu_chuan/editcd.php";
              break;
            case 'them-tieu-chuan-vn':
              require "quan_ly_tieu_chuan/themtcvn.php";
              break;
            case 'edit-tcvn':
              require "quan_ly_tieu_chuan/edit.php";
              break;

            case 'quanlytieuchuancoso':
              require "quan_ly_tieu_chuan_cs/quanlytieuchuancoso.php";
              break;
            case 'danh-sach-chu-de-tccs':
              require "quan_ly_tieu_chuan_cs/dscd.php";
              break;
            case 'them-chu-de-tccs':
              require "quan_ly_tieu_chuan_cs/themcd.php";
              break;
            case 'edit-cd-tccs':
              require "quan_ly_tieu_chuan_cs/editcd.php";
              break;
            case 'them-tieu-chuan-co-so':
              require "quan_ly_tieu_chuan_cs/them.php";
              break;
            case 'edit-tccs':
              require "quan_ly_tieu_chuan_cs/edit.php";
              break;

            case 'quanlytieuchuannuocngoai':
              require "quan_ly_tieu_chuan_nn/quanlytieuchuannn.php";
              break;
            case 'danh-sach-chu-de-tcnn':
              require "quan_ly_tieu_chuan_nn/dscd.php";
              break;
            case 'them-chu-de-tcnn':
              require "quan_ly_tieu_chuan_nn/themcd.php";
              break;
            case 'edit-cd-tcnn':
              require "quan_ly_tieu_chuan_nn/editcd.php";
              break;
            case 'them-tieu-chuan-nuoc-ngoai':
              require "quan_ly_tieu_chuan_nn/them.php";
              break;
            case 'edit-tcnn':
              require "quan_ly_tieu_chuan_nn/edit.php";
              break;

            case 'quanlyvbqppl':
              require "quan_ly_vbqppl/quanlyvbqppl.php";
              break;
            case 'danh-sach-chu-de-vbqppl':
              require "quan_ly_vbqppl/dscd.php";
              break;
            case 'them-chu-de-vbqppl':
              require "quan_ly_vbqppl/themcd.php";
              break;
            case 'edit-cd-vbqppl':
              require "quan_ly_vbqppl/editcd.php";
              break;
            case 'them-vbqppl':
              require "quan_ly_vbqppl/them.php";
              break;
            // case 'edit-tcnn':
            //   require "quan_ly_vbqppl/edit.php";
            //   break;

           	default:
           		require "huong-dan-su-dung.php";
           		break;
           }
           ?>
         </div>
	  </div>
  </div>
</body>
</html>
