<?php
	/**
	* TTB
	*/
	class vbqppl extends database{
		private $__id;
		private $__idc1;
		private $__kyhieu;
		private $__date;
		private $__trichyeu;
		private $__urlpdf;
		private $__tags;
		private $__soluotxem;
		private $__luottai;
		private $__coquan;
		
		function __construct(){
			$this->connect();
		}

		public function getId(){
	        return $this->__id;
	    }

	    public function setId($id){
	        $this->__id = $id;
	    }

	    public function getIdC1(){
	        return $this->__idc1;
	    }

	    public function setIdC1($idc1){
	        $this->__idc1 = $idc1;
	    }

	    public function getMa(){
	        return $this->__kyhieu;
	    }

	    public function setMa($kyhieu){
	        $this->__kyhieu = $kyhieu;
	    }

	    public function getDate(){
	        return $this->__date;
	    }

	    public function setDate($date){
	        $this->__date = $date;
	    }

	    public function getTrichYeu(){
	        return $this->__trichyeu;
	    }

	    public function setTrichYeu($trichyeu){
	        $this->__trichyeu = $trichyeu;
	    }

	    public function getUrlpdf(){
	        return $this->__urlpdf;
	    }

	    public function setUrlpdf($urlpdf){
	        $this->__urlpdf = $urlpdf;
	    }

	    public function getTags(){
	        return $this->__tags;
	    }

	    public function setTags($tags){
	        $this->__tags = $tags;
	    }

	    public function getSoLuotXem(){
	        return $this->__soluotxem;
	    }

	    public function setSoLuotXem($soluotxem){
	        $this->__soluotxem = $soluotxem;
	    }

	    public function getLuotTai(){
	        return $this->__luottai;
	    }

	    public function setLuotTai($luottai){
	        $this->__luottai = $luottai;
	    }

	    public function getCoQuan(){
	        return $this->__coquan;
	    }

	    public function setCoQuan($coquan){
	        $this->__coquan = $coquan;
	    }

	    public function layVBQPPLByCoQuan($coquan){
	        $sql = "SELECT * FROM vbqppl WHERE CoQuan like '%$coquan%' ORDER BY id ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    function search1($key){
			$sql = "SELECT * FROM vbqppl WHERE KyHieu like '%$key%'";
			$this->query($sql);
			return $this->fetchAll(array($key));
		}

		function search2($key){
			$sql = "SELECT * FROM vbqppl WHERE MATCH (KyHieu, TrichYeu, Tags, CoQuan) AGAINST ('$key' IN NATURAL LANGUAGE MODE)";
			$this->query($sql);
			return $this->fetchAll(array($key));
		}

		function search3($key){
			$sql = "SELECT * FROM vbqppl WHERE NgayBanHanh like '%$key%'";
			$this->query($sql);
			return $this->fetchAll(array($key));
		}

		public function getVBQPPL($vitri = -1, $limit = -1){
			$sql = "SELECT * FROM vbqppl ORDER BY id ASC";
			if($vitri > -1 && $limit > 1){
				$sql .=" limit $vitri,$limit";//nối tiếp câu lệnh truy vấn trên. 
			}
			$this->query($sql);
			return $this->fetchAll();
		}

	 	public function danhSachVBQPPL(){
			$danhmucvbqppl = $this->getVBQPPL();
			if(isset($_GET['page'])){
				$tranghientai = $_GET['page'];//lay trang hien tai
			}else{
				$tranghientai = 1;
			}

			$pagination = new pagination(count($danhmucvbqppl), $tranghientai, 7, 2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($tranghientai-1)*$limit;
			$danhmucvbqppl = $this->getVBQPPL($vitri, $limit);
			return array('danhmucvbqppl'=>$danhmucvbqppl,'thanhphantrang'=>$paginationHTML);
		}

	    public function themVBQPPL(){
	        try
	        {
	            $sql = "INSERT INTO vbqppl VALUES (null,N'".$this->getIdC1()."',N'".$this->getMA()."',N'".$this->getDate()."',N'".$this->getTrichYeu()."',N'".$this->getUrlpdf()."',N'".$this->getTags()."',N'".$this->getSoluotxem()."',N'".$this->getLuotTai()."',N'".$this->getCoQuan()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaVBQPPL($id){
	        try
	        {
	            $sql = "UPDATE vbqppl SET  idc1 = N'".$this->getIdC1()."', KyHieu = N'".$this->getMA()."', NgayBanHanh = CURDATE(), TrichYeu = N'".$this->getTrichYeu()."', Urlpdf = N'".$this->getUrlpdf()."', Tags = N'".$this->getTags()."' , SoLuotXem = N'".$this->getSoluotxem()."', LuotTai = N'".$this->getLuotTai()."', CoQuan = N'".$this->getCoQuan()."' WHERE id = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layVBQPPL(){
	        $sql = "SELECT * FROM vbqppl ORDER BY id ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotVBQPPL($id){
	        $sql = "SELECT * FROM vbqppl where id = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaVBQPPL($id){
	        try
	        {
	            $sql = "DELETE FROM vbqppl WHERE id = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkVBQPPL($id){
	        $kq = $this->layMotVBQPPL($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }

	    public function layFullVBQPPL(){
	    	$sql = "SELECT vb2.*, vb1.ChuDe FROM vbqppl vb2, vbqppl_cap1 vb1 ORDER BY vb2.id ASC";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function layVBQPPLByID1($id){
	        $sql = "SELECT * FROM vbqppl WHERE idc1 = '$id' ORDER BY id ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }
	}
?>