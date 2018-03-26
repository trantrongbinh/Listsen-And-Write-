<?php
$qcvn_nxd = new qcvn();
$dsqcvn_nxd = $qcvn_nxd->layQCVN();

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


<div class="type">           
    <div>
        <h2 style="margin-top:7px; text-align: center; padding: 10px 0 10px 0;">Quy chuẩn Quốc gia ngành xây dựng</h2>
        <div id="hienthi">
            <fieldset>
                <!-- <label>Lĩnh vực</label>
                <select>
                    <option value="0">-Tất cả-</option>
                    <option value="1">Xây dựng</option>
                    <option value="1">Nông nghiệp</option>
                    <option value="1">Thương mại</option>
                </select>
                <br>
                <br> -->
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
                <a href="index.php?p=quy-chuan-vn-nganh-xay-dung" style="background-color: #E9E4E4; border: 1px solid #8B8787; padding: 2px; margin-left: 30px;">Làm mới</a>
            </div>
        </div>
    </div>
    <div class="bang"  style="text-align: center;">
        <table border="1px" cellpadding="0px" cellspacing="0px">
            <thead>
                <tr style="background-color: #003366; color: white;">
                    <th>Ký hiệu</th>
                    <th>Trích yếu</th>
                </tr>
            </thead>
            <tbody id="danhsach">
                <?php
                    foreach ($dsqcvn_nxd as $ds) {
                        ?>
                        <tr>
                            <td><a href="#"><?=$ds['Ma']?></a></td>
                            <td><?=$ds['TrichYeu']?></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('.timkiem1').keyup(function() {
            var txt = $('.timkiem1').val();
            $.post('views/pages/ajax_qcvn_nganhxd_1.php', {data: txt}, function(data){
                $('#danhsach').html(data);
            })
        });

        $('.timkiem2').keyup(function() {
            var txt = $('.timkiem2').val();
            $.post('views/pages/ajax_qcvn_nganhxd_2.php', {data: txt}, function(data){
                $('#danhsach').html(data);
            })
        })

        $('#ui-datepicker-div').mouseleave(function() {
            var txt = $('.timkiem3').val();
            $.post('views/pages/ajax_qcvn_nganhxd_3.php', {data: txt}, function(data){
                $('#danhsach').html(data);
            })
        })

        // $('.timkiem3').keypress(function(event) {
        // if (event.keyCode == 13 || event.which == 13) {  
        //     var txt = $('.timkiem3').val();  
        //     $.post("views/pages/ajax_qcvn_nganhxd_3.php", {data: txt}, function(data){
        //         $('#danhsach').html(data);
        //     })
        // }
    // });

    });
</script>