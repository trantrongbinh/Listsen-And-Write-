<?php
include('../../model/database.class.php');
include('../../model/m_data.php');
	$m_data = new M_data();
	$key = $_POST['data'];
	$dulieu = $m_data->search2($key);
	foreach ($dulieu as $dl) {
		?>
		<tr>
            <td><a href="#"><?=$dl['Ma']?></a></td>
            <td><?=$dl['TrichYeu']?></td>
        </tr>
		<?php
	}
?>