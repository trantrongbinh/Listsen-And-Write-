<?php

class tintuc2 extends database{
	private $_idtt;
	private $_tieude;
    private $_tomtat;
    private $_noidung;
    private $_urlhinh;
    private $_ngay;
    private $_noibat;
    private $_soluotxem;
    private $_loai;
    private $_tags;
    private $_tacgia; 
	
	function __construct(){
        $this->connect();
    }

    public function getIdtt(){
        return $this->_idtt;
    }

    public function setIdtt($idtt){
        $this->_idtt = $idtt;
    }

	public function getTieude(){
		return $this->_tieude;
	}

	public function setTieude($tieude){
		$this->_tieude = $tieude;
	}

    public function getTomtat(){
        return $this->_tomtat;
    }

    public function setTomtat($tomtat){
        $this->_tomtat = $tomtat;
    }

    public function getNoidung(){
        return $this->_noidung;
    }

    public function setNoidung($noidung){
        $this->_noidung = $noidung;
    }

    public function getUrlhinh(){
        return $this->_urlhinh;
    }

    public function setUrlhinh($urlhinh){
        $this->_urlhinh = $urlhinh;
    }

    public function getNoibat(){
        return $this->_noibat;
    }

    public function setNoibat($noibat){
        $this->_noibat = $noibat;
    }

    public function getSoluotxem(){
        return $this->_soluotxem;
    }

    public function setSoluotxem($soluotxem){
        $this->_soluotxem = $soluotxem;
    }

    public function getLoai(){
        return $this->_loai;
    }

    public function setLoai($loai){
        $this->_loai = $loai;
    }

    public function getTags(){
        return $this->_tags;
    }

    public function setTags($tags){
        $this->_tags = $tags;
    }

    public function getTacgia(){
        return $this->_tacgia;
    }

    public function setTacgia($tacgia){
        $this->_tacgia = $tacgia;
    }

	public function themTinTuc(){
        try
        {
            $sql = "INSERT INTO tintuc2 VALUES (null,N'".$this->getTieude()."',N'".$this->getTomtat()."',N'".$this->getNoidung()."',N'".$this->getUrlhinh()."',CURDATE(),N'".$this->getNoibat()."',N'".$this->getSoluotxem()."',N'".$this->getLoai()."',N'".$this->getTags()."', N'".$this->getTacgia()."')";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }

    public function suaTinTuc($id){
        try
        {
            $sql = "UPDATE tintuc2 SET TieuDe = N'".$this->getTieude()."', TomTat = N'".$this->getTomtat()."', NoiDung = N'".$this->getNoidung()."', urlHinh = N'".$this->getUrlhinh()."',Ngay = CURDATE(), NoiBat = N'".$this->getNoibat()."', SoLuotXem = N'".$this->getSoluotxem()."' , Loai = N'".$this->getLoai()."', Tags = N'".$this->getTags()."', TacGia = N'".$this->getTacgia()."' WHERE idTT = '$id'";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }

    public function layTinTuc(){
        $sql = "SELECT * FROM tintuc2 ORDER BY idTT ASC";
        $this-> query($sql);
        return $this-> fetchALL();
    }

    public function layMotTinTuc($id){
        $sql = "SELECT * FROM tintuc2 where idTT = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }

    public function xoaTinTuc($id){
        try
        {
            $sql = "DELETE FROM tintuc2 WHERE idTT = '$id' ";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }

    public function checkTinTuc($id){
        $kq = $this->layMotTinTuc($id);
        if ( $kq == null ){
            return false;
        }
        else{
            return true;
        }
    }

    public function layTTByLoai($loai){
        $sql = "SELECT * FROM tintuc2 WHERE Loai like '%$loai%'";
        $this-> query($sql);
        return $this-> fetchALL();
    }
}
?>