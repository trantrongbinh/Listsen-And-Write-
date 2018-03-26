<?php

    // error_reporting(0);
    // function getDaTa($url){
    //     $html = file_get_html($url);

    //     $tins = $html->find('div.small_news');

    //     foreach ($tins as $t) {
    //         $a = $t->find("a", 0);
    //         $title =  $a->attr["title"];
    //         $href = $a->href;

    //         $img = $a->find("img", 0)->src;
    //         $u = 'views/upload/images/'.basename($img);
    //         file_put_contents($u, file_get_contents($img));

    //         $time = $t->find("div.list_content span", 0);
    //         $desc = $t->find("div.list_content h3", 0)->plaintext;
    //         $tenFile = basename($img);
    //         $title = htmlentities($title, ENT_QUOTES, "UTF-8");
    //         $desc = htmlentities($desc, ENT_QUOTES, "UTF-8");

    //         $db = new database();
    //         $qr1 = "INSERT INTO tintuc VALUES(null, '$title', '$desc', '$tenFile', '$time', '$href', N'XD')";
    //         $db->query($qr1);
    //     }
    // }

    // $mangURL = array("http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc&BRSR=0", "http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc&BRSR=15", "http://www.baoxaydung.com.vn/news/vn/quy-hoach-kien-truc&BRSR=30");

    // foreach ($mangURL as $url) {
    //     getDaTa($url);
    // }

    $tintuc = new tintuc();
    $dsttxd = $tintuc->danhsachtintucxd();
    $danhsachtinxd = $dsttxd['danhmuctintuc'];
    $thanhphantrang2 = $dsttxd['thanhphantrang'];

?>


<?php
    foreach ($danhsachtinxd as $ds) {
        ?>
            <div class="cat-content" style="margin-top: -7px;">
                <div class="col1">
                    <div class="news">
                        <div class="clear"></div>
                        <img class="images_news2" src="views/upload/images/<?=$ds['image']?>" align="left" />
                        <h3 class="title" style="margin-top: 10px;" ><a href="<?=$ds['link_noidung']?>"><?=$ds['tieude']?></a></h3>
                        <span><?=$ds['date']?></span>
                        <br>
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
<div id="phantrang" style = "text-align: center;"><?=$thanhphantrang2?></div>

<style>
.pagination>li{
    float: left;
    padding: 10px;
}
</style>