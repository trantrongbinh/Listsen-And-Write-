<?php
	session_start();
	if(isset($_GET["p"])) $p = $_GET["p"];
	else $p = "";

    include('model/simple_html_dom.php');
	include('model/database.class.php');
	include('controller/pager.php');
	include('model/class.tintuc.php');
	include('model/class.qcvn_cap2.php');
	include('model/class.vbqppl.php');
	include('model/class.thongbao.php');
	include('model/m_data.php');
	include('controller/c_data.php');
	$c_data = new C_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang Quản Lý - Bộ Xây Dựng</title>
	<base href="http://localhost:1997/trongbinh/BoXD_v8/">
	<link rel="Shortcut Icon" href="views/images/favicon.ico"> 
	<link rel='stylesheet prefetch' href='views/library/fonts.googleapis.css'>
	<link rel='stylesheet prefetch' href='views/library/Font-Awesome/css/font-awesome.min.css'>
    <link rel="stylesheet" type="text/css" href="views/css/layout.css">
    <script src="views/library/jquery-3.2.1.min.js"></script>
    <script src="views/library/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="http://www.maytinhhtl.com/images/code/snowstorm.js"></script>
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

	<script>
		$(document).ready(function() {
			$(".menu li").hover(function(){
				$(this).find("ul:first").css({visibility: "visible", display: "none"}).show(400);
			}, function() {
				$(this).find("ul:first").css({visibility: "hidden"}).show(300);
				});

			$('#txtSearch').keypress(function(event) {
				if (event.keyCode == 13 || event.which == 13) {
			         //event.preventDefault();  //Không cho submit from bạn có thể bỏ nều k cần
			         //Các câu lệnh Logic sẽ thực hiện ở đây    
			         var keyword = $('#txtSearch').val();  
			         $.post("ketqua_search.php", {tukhoa:keyword}, function(data){
			         	$('#datasearch').html(data);
			        })
			    }
			});

		});

	</script>
</head>
<body>
	<div id="wrap-vp">
		<div id="header-vp">
	    	<div id="logo"><img src="views/images/banner_TCQC.png" width="1000px" /></div>
	    </div>
	    <div id="menu-vp">
	    	<!--block/menu.php-->
	    	<?php require "views/blocks/menu.php";?>
	    </div>
	    <div id="midheader-vp">
	    	<div id="left">
	        	<ul class="list_arrow_breakumb">
	            	<li class="start">
	                	<a href="javascript:;">Trang chủ</a>
	                	<span class="arrow_breakumb">&nbsp;</span>
	            	</li>
	           </ul>
	           <div class="txt_timer left" id="clockPC"><img src="views/images/lịch.png" width="22px" height="22px"> Thứ bảy, 4/11/2017 | 00:00 GMT+7</div>	
	        </div>
	        <div id="right">
				<!--blocks/search.php-->
				<?php 
					require "views/blocks/search.php";
				?>
	        </div>
	        <?php
                if(isset(($_SESSION['user_name']))){
                	?>
						<a href="views/pages/dangxuat.php" id="btnLogin"> Thoát </a>
						<div style="float: right; font-size: 14px; margin-top: 5px; margin-bottom: -5px;">Xin chào: <a href="index.php?p=thongtincanhan" style="color: #900;"><?= $_SESSION['user_name']?></a></div>
                	<?php
                }else{
                	?>
                		<a href="index.php?p=login" id="btnLogin">Tài Khoản</a>
                	<?php
                }
            ?>
	        
    	</div>
    	<div class="clear"></div>
		<hr>
		<div class="container">
			<div id="content-vp">
				<?php
					switch ($p) {
						case 'login':
							require "views/pages/login.php";
							break;
						case 'van-ban-quy-pham-phap-luat':
							require "views/pages/vbqppl.php";
							break;
						default:
							?>
								<div id="content-main">
								<!--PAGES-->
									<?php
										switch ($p) {
											case 'tim-kiem':
												require "views/pages/ketqua_search.php";
												break;
											case 'gioi-thieu-quy-chuan-tieu-chuan':
												require "views/pages/gioithieu_qc_tc.php";
												break;
											case 'huong-dan-su-dung':
												require "views/pages/huongdan_sd.php";
												break;
											case 'quy-chuan-vn-nganh-xay-dung':
												require "views/pages/qcvn_nganhxd.php";
												break;
											case 'tin-tuc-xay-dung':
												require "views/pages/tintuc.php";
												break;
											case 'chi-tiet-tin-tuc':
												require "views/pages/chitiet.php";
												break;
											default:
												require "views/pages/trangchu.php";
												break;
										}
									?>
					        	</div>
					        	<div id="content-right">
									<!--blocks/cot_phai.php-->
									<?php require "views/blocks/cot_phai.php";?>
					        	</div>
							<?php
							break;
					}
				?>
    		</div>
		</div>
    	<div class="clear"></div>
    	<div id="lide">
    		<!-- blocks/slide.php -->
    		
    	</div>
    	<div class="clear"></div>
		<div id="footer">
			<!--blocks/footer.php-->
   			<?php require "views/blocks/footer.php";?>
		</div>
	</div>
</body>
<!-- <script>
$(document).ready(function() {
	$('#txtSearch').keypress(function(event) {
		if (event.keyCode == 13 || event.which == 13) {
	         //event.preventDefault();  //Không cho submit from bạn có thể bỏ nều k cần
	         //Các câu lệnh Logic sẽ thực hiện ở đây    
	        var keyword = $('#txtSearch').val();  
	        $.post("views/pages/ketqua_search.php", {tukhoa:keyword}, function(data){
	         	$('#midheader-vp').html(data);
	        })
	    }
	});
});
</script> -->
</html>
