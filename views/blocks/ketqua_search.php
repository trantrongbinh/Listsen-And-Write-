<?php
if(isset($_POST['tukhoa'])){
	$key = $_POST['tukhoa'];
	$ds_tintuc = $c_data->timkiem($key);
	$data = $ds_tintuc['data'];
	print_r($ds_tintuc);
	$thanhphantrang3 = $ds_tintuc['thanhphantrang'];

	foreach ($data as $ds) {
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
    <div id="phantrang" style = "text-align: center;"><?=$thanhphantrang3?></div>
	<style>
		.pagination>li{
			float: left;
			padding: 10px;
		}
	</style>
    <?php
}
?>


