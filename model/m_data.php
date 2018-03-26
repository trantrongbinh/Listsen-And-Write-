<?php
class M_data extends database{
	function search($key, $vitri = -1, $limit = -1){
		$sql = "SELECT * FROM tintuc WHERE MATCH (tieude,mota,date) AGAINST ('$key' IN NATURAL LANGUAGE MODE)";
		if($vitri > -1 && $limit > 1){
			$sql .=" limit $vitri,$limit";//nối tiếp câu lệnh truy vấn trên. 
		}
		$this->query($sql);
		return $this->fetchAll(array($key));
	}

	function search2($key){
		$sql = "SELECT * FROM qcvn_cap2 WHERE Ma like '%$key%'";
		$this->query($sql);
		return $this->fetchAll(array($key));
	}

	function search3($key){
		$sql = "SELECT * FROM qcvn_cap2 WHERE MATCH (Ma, TrichYeu, Tags) AGAINST ('$key' IN NATURAL LANGUAGE MODE)";
		$this->query($sql);
		return $this->fetchAll(array($key));
	}
	
	function search4($key){
		$sql = "SELECT * FROM qcvn_cap2 WHERE NgayBanHanh like '%$key%'";
		$this->query($sql);
		return $this->fetchAll(array($key));
	}

	function dangnhapbandoc($email, $password){
		$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password' and quyen = '0'";
		$this->query($sql);
		return $this->fetch(array($email,$password));
	}

	function dangnhapquantritoanbo($email, $password){
		$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password' and quyen = '1'";
		$this->query($sql);
		return $this->fetch(array($email,$password));
	}

	function dangnhapquantribaiviet($email, $password){
		$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password' and quyen = '2'";
		$this->query($sql);
		return $this->fetch(array($email,$password));
	}

	function dangnhapquantrixaydung($email, $password){
		$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password' and quyen = '3'";
		$this->query($sql);
		return $this->fetch(array($email,$password));
	}

	public function QcTcMoi(){
	        $sql = "SELECT * FROM `qc_tc_moi` ORDER BY NgayBanHanh DESC LIMIT 0,7";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }
}
?>