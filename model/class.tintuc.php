<?php
	/**
	* TTB
	*/
	class tintuc extends database{
		private $__id;
		private $__tieude;
		private $__tomtat;
		private $__image;
		private $__time;
		
		function __construct(){
			$this->connect();
		}

		public function getId(){
	        return $this->__id;
	    }

	    public function setId($id){
	        $this->__id = $id;
	    }

	    public function getTieuDe(){
	        return $this->__tieude;
	    }

	    public function setTieuDe($tieude){
	        $this->__tieude = $tieude;
	    }

	    public function getTomTat(){
	        return $this->__tomtat;
	    }

	    public function setTomTat($tomtat){
	        $this->__tomtat = $tomtat;
	    }

	    public function getTime(){
	        return $this->__time;
	    }

	    public function setTime($time){
	        $this->__time = $time;
	    }

		public function layTinTucXDTop(){
	        $sql = "SELECT * FROM tintuc WHERE Loai = N'XD' ORDER BY id ASC LIMIT 0,4";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    // public function layTinTucKHCN(){
	    // 	$sql = "SELECT * FROM tintuc WHERE Loai = N'KHCN' ORDER BY id ASC";
	    // 	$this->query($sql);
	    // 	return $this-> fetchALL();
	    // }

	    public function gettintucxd($vitri = -1, $limit = -1){
			$sql = "SELECT * FROM tintuc WHERE Loai = N'XD' ORDER BY id ASC";
			if($vitri > -1 && $limit > 1){
				$sql .=" limit $vitri,$limit";//nối tiếp câu lệnh truy vấn trên. 
			}
			$this->query($sql);
			return $this->fetchAll();
		}

	 	public function danhsachtintucxd(){
			$danhmuctintuc = $this->gettintucxd();
			if(isset($_GET['page'])){
				$tranghientai = $_GET['page'];//lay trang hien tai
			}else{
				$tranghientai = 1;
			}

			$pagination = new pagination(count($danhmuctintuc), $tranghientai, 7, 2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($tranghientai-1)*$limit;
			$danhmuctintuc = $this->gettintucxd($vitri, $limit);
			return array('danhmuctintuc'=>$danhmuctintuc,'thanhphantrang'=>$paginationHTML);
		}


		public function gettintuckhcn($vitri = -1, $limit = -1){
			$sql = "SELECT * FROM tintuc WHERE Loai = N'KHCN' ORDER BY id ASC";
			if($vitri > -1 && $limit > 1){
				$sql .=" limit $vitri,$limit";//nối tiếp câu lệnh truy vấn trên. 
			}
			$this->query($sql);
			return $this->fetchAll();
		}

	 	public function danhsachtintuckhcn(){
			$danhmuctintuc = $this->gettintuckhcn();
			if(isset($_GET['page'])){
				$tranghientai = $_GET['page'];//lay trang hien tai
			}else{
				$tranghientai = 1;
			}

			$pagination = new pagination(count($danhmuctintuc), $tranghientai, 4, 2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($tranghientai-1)*$limit;
			$danhmuctintuc = $this->gettintuckhcn($vitri, $limit);
			return array('danhmuctintuc'=>$danhmuctintuc,'thanhphantrang'=>$paginationHTML);
		}


	}
?>