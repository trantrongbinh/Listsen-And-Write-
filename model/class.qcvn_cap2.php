<?php
	/**
	* TTB
	*/
	class qcvn extends database{
		private $__idc2;
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

		public function layQCVN(){
	        $sql = "SELECT * FROM qcvn_cap2 WHERE idc1 = 1 ORDER BY idc2 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layQCVN2($vitri = -1, $limit = -1){
			$sql = "SELECT * FROM qcvn_cap2 ORDER BY idc2 ASC";
			if($vitri > -1 && $limit > 1){
				$sql .=" limit $vitri,$limit";//nối tiếp câu lệnh truy vấn trên. 
			}
			$this->query($sql);
			return $this->fetchAll();
		}

	 	public function danhSachQCVN2(){
			$danhmucquychuan = $this->layQCVN2();
			if(isset($_GET['page'])){
				$tranghientai = $_GET['page'];//lay trang hien tai
			}else{
				$tranghientai = 1;
			}

			$pagination = new pagination(count($danhmucquychuan), $tranghientai, 7, 2);
			$paginationHTML = $pagination->showPagination();
			$limit = $pagination->_nItemOnPage;
			$vitri = ($tranghientai-1)*$limit;
			$danhmucquychuan = $this->layQCVN2($vitri, $limit);
			return array('danhmucquychuan'=>$danhmucquychuan,'thanhphantrang'=>$paginationHTML);
		}

	    public function themQuyChuan2(){
	        try
	        {
	            $sql = "INSERT INTO qcvn_cap2 VALUES (null,N'".$this->getIdC1()."',N'".$this->getMA()."',N'".$this->getDate()."',N'".$this->getTrichYeu()."',N'".$this->getUrlpdf()."',N'".$this->getTags()."',N'".$this->getSoluotxem()."',N'".$this->getLuotTai()."')";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function suaQuyChuan2($id){
	        try
	        {
	            $sql = "UPDATE qcvn_cap2 SET  idc1 = N'".$this->getIdC1()."', Ma = N'".$this->getMA()."', NgayBanHanh = CURDATE(), TrichYeu = N'".$this->getTrichYeu()."', Urlpdf = N'".$this->getUrlpdf()."', Tags = N'".$this->getTags()."' , SoLuotXem = N'".$this->getSoluotxem()."', LuotTai = N'".$this->getLuotTai()."' WHERE idc2 = '$id'";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function layQuyChuan2(){
	        $sql = "SELECT * FROM qcvn_cap2 ORDER BY idc2 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	    public function layMotQuyChuan2($id){
	        $sql = "SELECT * FROM qcvn_cap2 where idc2 = '$id' ";
	        $this-> query($sql);
	        return $this-> fetch();
	    }

	    public function xoaQuyChuan2($id){
	        try
	        {
	            $sql = "DELETE FROM qcvn_cap2 WHERE idc2 = '$id' ";
	            $this-> query($sql);
	            return true;
	        }
	        catch(mysqli_sql_exception $e)
	        {
	            return false;
	        }
	    }

	    public function checkQuyChuan2($id){
	        $kq = $this->layMotQuyChuan2($id);
	        if ( $kq == null ){
	            return false;
	        }
	        else{
	            return true;
	        }
	    }

	    public function layQCVN2ByID1($id){
	        $sql = "SELECT * FROM qcvn_cap2 WHERE idc1 = '$id' ORDER BY idc2 ASC";
	        $this-> query($sql);
	        return $this-> fetchALL();
	    }

	}
?>