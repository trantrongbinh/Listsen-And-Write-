<?php
	/**
	* TTB
	*/
	class gioithieu extends database{
		private $__id;
		private $__chude;
		private $__noidung;
		
		function __construct(){
			$this->connect();
		}

		public function getId(){
	        return $this->__id;
	    }

	    public function setId($id){
	        $this->__id = $id;
	    }

	    public function getChuDe(){
	        return $this->__chude;
	    }

	    public function setChuDe($chude){
	        $this->__chude = $chude;
	    }

	    public function getNoiDung(){
	        return $this->__noidung;
	    }

	    public function setNoiDung($noidung){
	        $this->__noidung = $noidung;
	    }

		public function layGioiThieu(){
	        $sql = "SELECT * FROM gioithieu ORDER BY id ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	}
?>