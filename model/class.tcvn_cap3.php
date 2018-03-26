<?php
	/**
	* TTB
	*/
	class tcvnc3 extends database{
		private $__idc3;
		private $__idc2;
		private $__ma;
		private $__date;
		private $__trichyeu;
		private $__urlpdf;
		private $__tags;
		private $__soluotxem;
		private $__luottai;
		
		function __construct(){
			$this->connect();
		}

		public function getIdC3(){
	        return $this->__idc3;
	    }

	    public function setIdC3($idc3){
	        $this->__idc3 = $idc3;
	    }

	    public function getIdC2(){
	        return $this->__idc2;
	    }

	    public function setIdC2($idc2){
	        $this->__idc2 = $idc2;
	    }

	    public function getMA(){
	        return $this->__ma;
	    }

	    public function setMa($ma){
	        $this->__ma = $ma;
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

	    public function getTieuChuan3($vitri = -1, $limit = -1){
			$sql = "SELECT * FROM tcvn_cap3 ORDER BY idc3 ASC";
			if($vitri > -1 && $limit > 1){
				$sql .=" limit $vitri,$limit";//nối tiếp câu lệnh truy vấn trên. 
			}
			$this->query($sql);
			return $this->fetchAll();
		}

	 	public function danhSachTieuChuan3(){
			$danhmucquychuan = $this->getTieuChuan3();
			if(isset($_GET['page'])){
				$tranghientai = $_GET['page'];//lay trang hien tai
			}else{
				$tranghientai = 1;
			}

			$pagination = new pagination(count($danhmucquychuan), $tranghientai, 7, 2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($tranghientai-1)*$limit;
			$danhmucquychuan = $this->getTieuChuan3($vitri, $limit);
			return array('danhmucquychuan'=>$danhmucquychuan,'thanhphantrang'=>$paginationHTML);
		}

	    public function themTieuChuan3(){
	        try
	        {
	            $sql = "INSERT INTO tcvn_cap3 VALUES (null,N'".$this->getIdC2()."',N'".$this->getMA()."',N'".$this->getDate()."',N'".$this->getTrichYeu()."',N'".$this->getUrlpdf()."',N'".$this->getTags()."',N'".$this->getSoluotxem()."',N'".$this->getLuotTai()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaTieuChuan3($id){
	        try
	        {
	            $sql = "UPDATE tcvn_cap3 SET  idc2 = N'".$this->getIdC2()."', Ma = N'".$this->getMA()."', NgayBanHanh = CURDATE(), TrichYeu = N'".$this->getTrichYeu()."', Urlpdf = N'".$this->getUrlpdf()."', Tags = N'".$this->getTags()."' , SoLuotXem = N'".$this->getSoluotxem()."', LuotTai = N'".$this->getLuotTai()."' WHERE idc3 = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layTieuChuan3(){
	        $sql = "SELECT * FROM tcvn_cap3 ORDER BY idc3 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotTieuChuan3($id){
	        $sql = "SELECT * FROM tcvn_cap3 where idc3 = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaTieuChuan3($id){
	        try
	        {
	            $sql = "DELETE FROM tcvn_cap3 WHERE idc3 = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkTieuChuan3($id){
	        $kq = $this->layMotTieuChuan3($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }

	    public function layQCVN2ByID2($id){
	        $sql = "SELECT * FROM tcvn_cap3 WHERE idc2 = '$id' ORDER BY idc3 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layTCByCD($id){
	    	$sql = "SELECT * FROM tcvn_cap3 WHERE idc2 = '$id' ORDER BY idc3 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	}
?>