<?php

class thongbao extends database{
	private $_id;
	private $_tieude;
    private $_noidung;
    private $_ngay;
	
	function __construct(){
        $this->connect();
    }

    public function getId(){
        return $this->_idtt;
    }

    public function setId($idtt){
        $this->_idtt = $idtt;
    }

	public function getTieude(){
		return $this->_tieude;
	}

	public function setTieude($tieude){
		$this->_tieude = $tieude;
	}

    public function getNoidung(){
        return $this->_noidung;
    }

    public function setNoidung($noidung){
        $this->_noidung = $noidung;
    }

	public function themThongBao(){
        try
        {
            $sql = "INSERT INTO thongbao VALUES (null,N'".$this->getTieude()."',N'".$this->getNoidung()."',CURDATE())";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }

    public function suaThongBao($id){
        try
        {
            $sql = "UPDATE thongbao SET TieuDe = N'".$this->getTieude()."', NoiDung = N'".$this->getNoidung()."', Ngay = CURDATE() WHERE id = '$id'";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }

    public function layThongBao(){
        $sql = "SELECT * FROM thongbao ORDER BY id ASC";
        $this-> query($sql);
        return $this-> fetchALL();
    }

    public function layMotThongBao($id){
        $sql = "SELECT * FROM thongbao where id = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }

    public function xoaThongBao($id){
        try
        {
            $sql = "DELETE FROM thongbao WHERE id = '$id' ";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }

    public function checkThongBao($id){
        $kq = $this->layMotThongBao($id);
        if ( $kq == null ){
            return false;
        }
        else{
            return true;
        }
    }
}
?>