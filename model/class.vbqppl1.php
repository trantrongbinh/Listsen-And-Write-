<?php
	/**
	* TTB
	*/
	class vbqppl1 extends database{
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

		public function themVBQPPL1(){
	        try
	        {
	            $sql = "INSERT INTO vbqppl_cap1 VALUES (null,N'".$this->getChuDe()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaVBQPPL1($id){
	        try
	        {
	            $sql = "UPDATE vbqppl_cap1 SET chude = N'".$this->getChuDe()."' WHERE idc1 = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layVBQPPL1(){
	        $sql = "SELECT * FROM vbqppl_cap1 ORDER BY idc1 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotVBQPPL1($id){
	        $sql = "SELECT * FROM vbqppl_cap1 where idc1 = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaVBQPPL1($id){
	        try
	        {
	            $sql = "DELETE FROM vbqppl_cap1 WHERE idc1 = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkVBQPPL1($id){
	        $kq = $this->layMotVBQPPL1($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }
	}
?>