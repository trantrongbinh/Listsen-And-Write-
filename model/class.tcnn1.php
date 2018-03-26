<?php
	/**
	* TTB
	*/
	class tcnn1 extends database{
		private $__idc1;
		private $__chude;
		
		function __construct(){
			$this->connect();
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

		public function themTieuChuanNN1(){
	        try
	        {
	            $sql = "INSERT INTO tcnn_cap1 VALUES (null,N'".$this->getChuDe()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaTieuChuanNN1($id){
	        try
	        {
	            $sql = "UPDATE tcnn_cap1 SET chude = N'".$this->getChuDe()."' WHERE idc1 = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layTieuChuanNN1(){
	        $sql = "SELECT * FROM tcnn_cap1 ORDER BY idc1 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotTieuChuanNN1($id){
	        $sql = "SELECT * FROM tcnn_cap1 where idc1 = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaTieuChuanNN1($id){
	        try
	        {
	            $sql = "DELETE FROM tcnn_cap1 WHERE idc1 = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkTieuChuanNN1($id){
	        $kq = $this->layMotTieuChuanNN1($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }
	}
?>