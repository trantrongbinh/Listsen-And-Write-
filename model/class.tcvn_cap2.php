<?php
	/**
	* TTB
	*/
	class tcvnc2 extends database{
		private $__idc2;
		private $__idc1;
		private $__chude;
		
		function __construct(){
			$this->connect();
		}

		public function getIdC2(){
	        return $this->__idc2;
	    }

	    public function setIdC2($idc2){
	        $this->__idc2 = $idc2;
	    }

		public function getIdC1(){
	        return $this->__idc1;
	    }

	    public function setIdC1($idc1){
	        $this->__idc1 = $idc1;
	    }

	    public function getChuDe(){
	        return $this->__chude;
	    }

	    public function setChuDe($chude){
	        $this->__chude = $chude;
	    }

		public function themTieuChuan2(){
	        try
	        {
	            $sql = "INSERT INTO tcvn_cap2 VALUES (null,N'".$this->getIdC1()."',N'".$this->getChuDe()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaTieuChuan2($id){
	        try
	        {
	            $sql = "UPDATE tcvn_cap2 SET TenNganh = N'".$this->getIdC1()."', cap = N'".$this->getChuDe()."' WHERE idc2 = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layTieuChuan2(){
	        $sql = "SELECT * FROM tcvn_cap2 ORDER BY idc2 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotTieuChuan2($id){
	        $sql = "SELECT * FROM tcvn_cap2 where idc2 = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaTieuChuan2($id){
	        try
	        {
	            $sql = "DELETE FROM tcvn_cap2 WHERE idc2 = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkTieuChuan2($id){
	        $kq = $this->layMotTieuChuan2($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }

	    public function layCDByTC($id){
	    	$sql = "SELECT * FROM tcvn_cap2 WHERE idc1 = '$id'";
	    	$this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layFullCD(){

    	$sql = "SELECT c2.*, c1.TenTCVN FROM tcvn_cap2 AS c2, tcvn_cap1 AS c1 WHERE c2.idc1 = c1.idc1 ORDER BY idc2 ASC ";
    	$this->query($sql);
    	return $this->fetchALL();
	    }
	}
?>