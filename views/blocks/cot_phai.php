<?php
$thongbao = new thongbao();
$dstb = $thongbao->layThongBao();
$m_data = new M_data();
$qctcmoi = $m_data->QcTcMoi();

?>

<!--box cat -->
<div class="box-cat" style="margin-top: -7px;">
    <div class="cat">
        <div class="main-cat">
            <a href="#">Thông báo</a>
        </div>
    </div>
</div>
<div id="news-container">
    <ul>
        <?php
        foreach ($dstb as $ds) {
            ?>
            <li>
                <div>
                    <h3 class="tlq2" ><a href="#"><?=$ds['TieuDe']?></a></h3>
                    <div style="text-align: right; font-size: 11px; color: #A97C7C; margin-right: 10px;"><i><?=$ds['Ngay']?></i></div>
                </div>
            </li> 
            <?php
        }
        ?>
        
        <!-- <li>
            <div>
                <h3 class="tlq2" ><a href="#"> Đề xuất danh mục các dự án kêu gọi đầu tư nước ngoài năm 2018 </a></h3>
                <div style="text-align: right; font-size: 11px; color: #A97C7C; margin-right: 10px;"><i>(10/27/17 5:03 PM)</i></div>
            </div>
        </li> -->
    </ul>
</div>
<div class="clear"></div>

<!--box cat -->
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#">Quy chuan, tieu chuan moi</a>
        </div>
        <div class="cat-content">
        	<div class="col2" style="border: 1px solid blue; border-top: none; margin-left: -10px; margin-top: -8px; padding: 10px 10px 0 10px;">
            	<div class="news">
                    <?php
                    foreach ($qctcmoi as $ds) {
                        ?>
                        <h3 class="tlq2" ><a href="#"> <?=$ds['TrichYeu']?></a></h3>
                        <div style="text-align: right; font-size: 11px; color: #A97C7C; border-bottom: 1px solid #dedede"><i><?=$ds['NgayBanHanh']?></i></div>
                        <?php
                    }
                    ?>
                    <div class="clear"></div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>

<!-- box cat -->
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#">Video</a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
            <div class="col2">
                <video width="104%" controls style="margin-left:-10px; margin-top: -17px;">
                    <source src="views/upload/video/EDM.mp4" type="video/mp4">
                </video>
            </div> 
        </div>
    </div>
</div>
<div class="clear"></div>

<!-- box cat -->
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#">Thống kê</a>
        </div>
        <div class="clear"></div>
        <div class="cat-content">
            <div class="col2" id="thongke">
               <div class="Statistics">
                    <p style="padding:5px 0 5px 0"> <h4> Lượt truy cập: <b>4.543.567</b></h4></p>
                    <p style="padding:5px 0 5px 0"> <h4> Trực tuyến: <b>3.243</b></h4></p>
                </div>
            </div> 
        </div>
    </div>
</div>
<div class="clear"></div>

<!-- box cat -->
<div class="box-cat">
    <div class="cat">
        <div class="main-cat">
            <a href="#">Liên kết ngoài</a>
        </div>
        <div class="clear"></div>
        <div class="cat-content">
            <div class="col2" id="link">
                <form method="post" action="">
                    <label for="select"></label>
                    <select name="select" size="1" id="select" style="width:270px; height:32px; font-size:12px;" onchange="location=this.value;">
                        <option value="">--Tổ chức trong nước--</option>
                        <option value=http://moc.gov.vn>Bộ xây dựng </option>
                        <option value=http://most.gov.vn>Bộ khoa học và công nghệ</option>
                    </select>
                </form>
                <form method="post" action="">
                    <label for="select"></label>
                    <select name="select" size="1" id="select" style="width:270px; height:32px; font-size:12px;" onchange="location=this.value;">
                        <option value="">-- Tổ chức Quốc tế --</option>
                        <option value=http://iaea.org>IAEA </option>
                        <option value=http://most.gov.vn>Bo Khoa hoc</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<script src="views/library/vTicker-v1.21.js"></script>
<script>
    $(document).ready(function(e) {
        
         $('#news-container').vTicker({ 
            speed: 1000,
            pause: 1000,
            animation: 'fade',
            showItems: 7
        });
    });
</script>
