<?php
   //  require_once('model/autoloader.php');
   //  $feed = new SimplePie();

   //  $feed->set_feed_url('https://www.most.gov.vn/rss/492/tin_tuc_su_kien.rss');
   //  //set up cache
   //  $feed->enable_cache(true);
   //  $feed->set_cache_duration(3600);
   //  $feed->set_cache_location('cache');

   //  $feed->init();
   //  $feed->handle_content_type();

   // $content = file_get_contents('https://www.most.gov.vn/vn/chuyen-muc/570/diem-bao-ve-khcn.aspx');

   // $pattern ='#<div class="listnews_item">(.*)</div>\s*</div>#imsU';
   // preg_match_all($pattern, $content, $matches);

   // $result = array();
   // foreach ($matches[0] as $key => $value) {

   //    //link
   //    $pattern = '#href=\'(.*)\'#imsU';
   //    preg_match($pattern, $value, $link);
   //    $result[$key]['link'] = $link[1];

   //    //image
   //    $pattern ='#src=\'(.*)\'#imsU';
   //    preg_match($pattern, $value, $image);
   //    $result[$key]['image'] = "https://www.most.gov.vn".$image[1];
     
   //   //title
   //    $pattern ='#<div class="listnews_item_title">\s*<a .*>(.*)</a>\s*</div>#imsU';
   //    preg_match($pattern, $value, $title);
   //    $result[$key]['title'] = $title[1];

   //    //description
   //    $pattern ='#<div class="listnews_item_des">(.*)</div>#imsU';
   //    preg_match($pattern, $value, $des);
   //    $result[$key]['description'] = trim($des[1]);

   //    //date
   //    $pattern ='#<div class="listnews_item_date">\s*<span>(.*)&nbsp;&nbsp;#imsU';
   //    preg_match($pattern, $value, $date);
   //    $result[$key]['date'] = trim($date[1]);
   //    // $db = new database();
   //    // $qr1 = "INSERT INTO tintuc VALUES(null, '$title', '$desc', '$tenFile', '$time', '$href', N'XD')";
   //    // $db->query($qr1);
   // }
   //  $db = new database();
   //  foreach ($result as $key => $value) {
   //      $title = $value['title'];
   //      $description = $value['description'];
   //      $image = $value['image'];
   //      $date = $value['date'];
   //      $link = $value['link'];
   //      $sql = "INSERT INTO tintuc VALUES(null, N'$title', N'$description', N'$image', N'$date', N'$link', N'KHCN')";
   //      $db->query($sql);
   //  }

    $tintuc = new tintuc();
    $dsttkhcn = $tintuc->danhsachtintuckhcn();
    $danhsachtinkhcn = $dsttkhcn['danhmuctintuc'];
    $thanhphantrang1 = $dsttkhcn['thanhphantrang'];
    $dsttxdtop = $tintuc->layTinTucXDTop();
?>

<script src="views/library/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="views/library/jquery-ui-1.7.2.custom.min.js" ></script>
<script type="text/javascript" src="views/library/jquery-ui-tabs-rotate.js" ></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
    });
</script>
<div id="featured" >
    <ul class="ui-tabs-nav">
      <?php
        $count = 1;
        foreach ($dsttxdtop as $ds) {
        ?>
        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?=$count?>"><a href="#fragment-<?=$count?>"><img src="views/upload/images/<?=$ds['image']?>" alt="" ></a></li>
        <?php
        $count++;
        }
      ?>
    </ul>
    
    <?php
     $count = 1;
    foreach ($dsttxdtop as $ds) {
    ?>
    <div id="fragment-<?=$count?>" class="ui-tabs-panel" style="">
        <img src="views/upload/images/<?=$ds['image']?>" alt="">
        <div class="info" >
            <h2><a href="<?=$ds['link_noidung']?>" ><?=$ds['tieude']?></a></h2>
            <p><?=$ds['mota']?><a href="<?=$ds['link_noidung']?>" >... read more</a></p>
        </div>
    </div>
    <?php
    $count++;
    }
    ?>
    <!-- <div id="fragment-1" class="ui-tabs-panel" style="">
        <img src="views/upload/images/180926baoxaydung_image001.jpg" alt="">
        <div class="info" >
            <h2><a href="#" >Công đoàn Xây dựng Việt Nam ký Thỏa thuận hợp tác“Vì lợi ích đoàn viên công đoàn” với một số đơn vị ngành Xây dựng</a></h2>
            <p>Ngày 3/11/2017 tại Trụ sở cơ quan Bộ Xây dựng đã diễn ra Lễ ký kết thỏa thuận hợp tác“Vì lợi ích đoàn viên công đoàn”<a href="#" > read more</a></p>
        </div>
    </div>

    <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
        <img src="views/upload/images/180958baoxaydung_image001.jpg" alt="" >
        <div class="info" >
            <h2><a href="#" >Công đoàn Xây dựng Việt Nam ký Thỏa thuận hợp tác“Vì lợi ích đoàn viên công đoàn” với một số đơn vị ngành Xây dựng</a></h2>
            <p>Ngày 3/11/2017 tại Trụ sở cơ quan Bộ Xây dựng đã diễn ra Lễ ký kết thỏa thuận hợp tác“Vì lợi ích đoàn viên công đoàn”giữa Công đoàn Xây dựng Việt Namvới các bệnh viện, trung tâm điều dưỡng phục hồi chức năng ngành Xây dựng về hỗ trợ khám chữa bệnh, chăm sóc sức khỏe, nghỉ dưỡng giá ưu đãi cho đoàn viên công đoàn thuộc Công đoàn Xây dựng Việt Nam. <a href="#" > read more</a></p>
        </div>
    </div>

    <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
        <img src="views/upload/images/a.jpg" alt="" >
        <div class="info" >
            <h2><a href="#" >Công đoàn Xây dựng Việt Nam ký Thỏa thuận hợp tác</a></h2>
            <p>Ngày 3/11/2017 tại Trụ sở cơ quan Bộ Xây dựng đã diễn ra Lễ ký kết thỏa thuận hợp tác“Vì lợi ích đoàn viên công đoàn”<a href="#" > read more</a></p>
        </div>
    </div>

    <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
        <img src="views/upload/images/101346baoxaydung_image001.jpg" alt="" >
        <div class="info" >
            <h2><a href="#" >Công đoàn Xây dựng Việt Nam ký Thỏa thuận hợp tác</a></h2>
            <p>Ngày 3/11/2017 tại Trụ sở cơ quan Bộ Xây dựng đã diễn ra Lễ ký kết thỏa thuận hợp tác“Vì lợi ích đoàn viên công đoàn”<a href="#" > read more</a></p>
        </div>
    </div> -->
</div>

<div class="ds_tt" style="text-align: left; font-size: 16px; margin-top: 5px; color: blue;"><a href="index.php?p=tin-tuc-xay-dung">Xem tất cả <li class="fa fa-angle-double-right"></li></a></div>
<div class="clear"></div>
<div style="border-top: 2px solid #cccccc; margin-bottom: 10px;"></div>
<!-- box cat-->
<div class="box-cat" style="margin-top: 25px;">
    <div class="cat">
        <div class="main-cat">
            <a href="#">Tin khoa học, công nghệ</a>
        </div>
        <div class="child-cat">
        </div>
        <div class="tinkhoahoc" id="kq">
            <?php
                foreach ($danhsachtinkhcn as $ds) {
                    ?>
                    <div class="cat-content">
                        <div class="col1">
                            <div class="news">
                                <div class="clear"></div>
                                <img class="images_news2" src="<?=$ds['image']?>" align="left" />
                                <h3 class="title" ><a href="<?=$ds['link_noidung']?>"><?=$ds['tieude']?></a></h3>
                                <p><small><?=$ds['date']?></small></p>
                                <br>
                                <div class="des"><?=$ds['mota']?></div>
                            </div>
                        </div>
                        <div class="col2"></div>
                    </div>
                    <div class="clear"></div>
                    <?php
                }
            ?>
            <!-- <div style = "text-align: center; "><?=$thanhphantrang1?></div> -->
        </div>
    </div>
</div>
<div class="clear"></div>