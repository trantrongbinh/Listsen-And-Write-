<?php
	/**
	* TTB
	*/
	class qcvnc1 extends database{
		private $__idc1;
		private $__tennganh;
		private $__cap;
		
		function __construct(){
			$this->connect();
		}

		public function getIdC1(){
	        return $this->__idc1;
	    }

	    public function setIdC1($idc1){
	        $this->__idc1 = $idc1;
	    }

	    public function getCap(){
	        return $this->__cap;
	    }

	    public function setCap($cap){
	        $this->__cap = $cap;
	    }

	    public function getTenNganh(){
	        return $this->__tennganh;
	    }

	    public function setTenNganh($tennganh){
	        $this->__tennganh = $tennganh;
	    }

		public function themQuyChuan1(){
	        try
	        {
	            $sql = "INSERT INTO qcvn_cap1 VALUES (null,N'".$this->getTenNganh()."',N'".$this->getCap()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaQuyChuan1($id){
	        try
	        {
	            $sql = "UPDATE qcvn_cap1 SET TenNganh = N'".$this->getTenNganh()."', cap = N'".$this->getCap()."' WHERE idc1 = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layQuyChuan1(){
	        $sql = "SELECT * FROM qcvn_cap1 ORDER BY idc1 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotQuyChuan1($id){
	        $sql = "SELECT * FROM qcvn_cap1 where idc1 = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaQuyChuan1($id){
	        try
	        {
	            $sql = "DELETE FROM qcvn_cap1 WHERE idc1 = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkQuyChuan1($id){
	        $kq = $this->layMotQuyChuan1($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }
	}
?>