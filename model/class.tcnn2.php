<?php
	/**
	* TTB
	*/
	class tcnn2 extends database{
		private $__id;
		private $__idc1;
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

		public function getId(){
	        return $this->__idc3;
	    }

	    public function setId($idc3){
	        $this->__idc3 = $idc3;
	    }

	    public function getIdC1(){
	        return $this->__idc1;
	    }

	    public function setIdC1($idc1){
	        $this->__idc1 = $idc1;
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

	    public function getTieuChuanNN2($vitri = -1, $limit = -1){
			$sql = "SELECT * FROM tcnn ORDER BY id ASC";
			if($vitri > -1 && $limit > 1){
				$sql .=" limit $vitri,$limit";//nối tiếp câu lệnh truy vấn trên. 
			}
			$this->query($sql);
			return $this->fetchAll();
		}

	 	public function danhSachTieuChuanNN2(){
			$danhmuctcnn = $this->getTieuChuanNN2();
			if(isset($_GET['page'])){
				$tranghientai = $_GET['page'];//lay trang hien tai
			}else{
				$tranghientai = 1;
			}

			$pagination = new pagination(count($danhmuctcnn), $tranghientai, 7, 2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($tranghientai-1)*$limit;
			$danhmuctcnn = $this->getTieuChuanNN2($vitri, $limit);
			return array('danhmuctcnn'=>$danhmuctcnn,'thanhphantrang'=>$paginationHTML);
		}

	    public function themTieuChuanNN2(){
	        try
	        {
	            $sql = "INSERT INTO tcnn VALUES (null,N'".$this->getIdC1()."',N'".$this->getMA()."',N'".$this->getDate()."',N'".$this->getTrichYeu()."',N'".$this->getUrlpdf()."',N'".$this->getTags()."',N'".$this->getSoluotxem()."',N'".$this->getLuotTai()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaTieuChuanNN2($id){
	        try
	        {
	            $sql = "UPDATE tcnn SET  idc1 = N'".$this->getIdC1()."', KyHieu = N'".$this->getMA()."', NgayBanHanh = CURDATE(), TrichYeu = N'".$this->getTrichYeu()."', Urlpdf = N'".$this->getUrlpdf()."', Tags = N'".$this->getTags()."' , SoLuotXem = N'".$this->getSoluotxem()."', LuotTai = N'".$this->getLuotTai()."' WHERE id = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layTieuChuanNN2(){
	        $sql = "SELECT * FROM tcnn ORDER BY id ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotTieuChuanNN2($id){
	        $sql = "SELECT * FROM tcnn where id = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaTieuChuanNN2($id){
	        try
	        {
	            $sql = "DELETE FROM tcnn WHERE id = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkTieuChuanNN2($id){
	        $kq = $this->layMotTieuChuanNN2($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }

	    public function layFullTieuChuanNN2(){
	    	$sql = "SELECT nn2.*, nn1.chude FROM tcnn nn2, tcnn_cap1 nn1 ORDER BY nn2.id ASC";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function layTCNNByID1($id){
	        $sql = "SELECT * FROM tcnn WHERE idc1 = '$id' ORDER BY id ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	}
?>