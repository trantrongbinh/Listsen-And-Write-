<?php
$vbqppl = new vbqppl();
$ds_vbqppl = $vbqppl->layVBQPPL();


?>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #bbbbbb;
    text-align: left;
    padding: 8px;
}

th {
    text-align:center;
    background-color:#003366;
    padding: 8px;
    color:white; 
}
tr:nth-child(even) {
    background-color: #eeeeee;
}
</style>

<div>
    <h2 style="margin-top:7px; text-align: center; padding: 10px 0 10px 0;">Văn Bản Quy Phạm Pháp Luật</h2>
    <div id="hienthi">
        <fieldset>
            <label>Lĩnh vực</label>
            <select name="select" id="select">
                <option value="">Tất cả</option>
                    <option value="KHCN">KHCN</option>
                    <option value="Bộ Xây Dựng">Bộ Xây Dựng</option>
                    <option value="Bộ Công Thương">Bộ Công Thương</option>
            </select>
            <br>
            <br>
            <label>Ký hiệu: </label>
            <input type="text" class="timkiem1">
            <br>
            <br>
            <label>Tích yếu: </label>
            <input type="text" class="timkiem2">
            <br>
            <br>
            <label>Ngày ban hành: </label>
            <input type="text" class="datepicker timkiem3">
            <br>
            <br>
        </fieldset>
        <div class="buttons">
           <!--  <input type="submit" value="Hiển thị tất cả" /> -->
            <!-- <input type="submit" value="Làm mới" /> -->
            <a href="index.php?p=van-ban-quy-pham-phap-luat" style="background-color: #E9E4E4; border: 1px solid #8B8787; padding: 2px; margin-left: 30px;">Làm mới</a>
        </div>
    </div>
</div>

<div style="width:800px; height:550px; border-style:groove; border-width:thin;margin-left:100px;"> 
    <table>
        <thead>
            <tr>
                <th width="120">Ký hiệu</th>
                <th width="100">Cơ quan</th>
                <th width="100">Ngày</th>
                <th width="680">Trích yếu</th>
            </tr>
        </thead>
        <tbody id="danhsach">
        <?php
        foreach ($ds_vbqppl as $ds) {
            ?>
                <tr>
                    <td style="text-align:center;"> <a href="#"><?=$ds['KyHieu']?></a></td>
                    <td><?=$ds['CoQuan']?></td>
                    <td><?=$ds['NgayBanHanh']?></td>
                    <td><?=$ds['TrichYeu']?></td>
                </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $("#select").change(function(){
            var coquan = $('#select').val();
            $.get("views/pages/ajax_vbqppl.php",{data: coquan},function(data){
                    $("#danhsach").html(data);
                });
        });

        $('.timkiem1').keyup(function() {
            var txt = $('.timkiem1').val();
            $.post('views/pages/ajax_vbqppl_1.php', {data: txt}, function(data){
                $('#danhsach').html(data);
            })
        });

        $('.timkiem2').keyup(function() {
            var txt = $('.timkiem2').val();
            $.post('views/pages/ajax_vbqppl_2.php', {data: txt}, function(data){
                $('#danhsach').html(data);
            })
        })

        $('#ui-datepicker-div').mouseleave(function() {
            var txt = $('.timkiem3').val();
            $.post('views/pages/ajax_vbqppl_3.php', {data: txt}, function(data){
                $('#danhsach').html(data);
            })
        })

    });
</script>
