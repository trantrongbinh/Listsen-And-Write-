<?php
	/**
	* TTB
	*/
	class tcvnc1 extends database{
		private $__idc1;
		private $__tentcvn;
		
		function __construct(){
			$this->connect();
		}

		public function getIdC1(){
	        return $this->__idc1;
	    }

	    public function setIdC1($idc1){
	        $this->__idc1 = $idc1;
	    }

	    public function getTenTCVN(){
	        return $this->__tentcvn;
	    }

	    public function setTenTCVN($tentcvn){
	        $this->__tentcvn = $tentcvn;
	    }

		public function themTieuChuan1(){
	        try
	        {
	            $sql = "INSERT INTO tcvn_cap1 VALUES (null,N'".$this->getTenTCVN()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaTieuChuan1($id){
	        try
	        {
	            $sql = "UPDATE tcvn_cap1 SET TenTCVN = N'".$this->getTenTCVN()."' WHERE idc1 = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layTieuChuan1(){
	        $sql = "SELECT * FROM tcvn_cap1 ORDER BY idc1 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotTieuChuan1($id){
	        $sql = "SELECT * FROM tcvn_cap1 where idc1 = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaTieuChuan1($id){
	        try
	        {
	            $sql = "DELETE FROM tcvn_cap1 WHERE idc1 = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkTieuChuan1($id){
	        $kq = $this->layMotTieuChuan1($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }
	}
?>