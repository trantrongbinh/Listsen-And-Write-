<?php
// include('model/m_data.php');

class C_data{

	function timkiem($key){
		$m_data = new M_data();
		$data = $m_data->search($key);
		if(isset($_GET['page'])){
			$tranghientai = $_GET['page'];//lay trang hien tai
		}else{
			$tranghientai = 1;
		}

		$pagination = new pagination(count($data), $tranghientai, 7, 2);
		$paginationHTML = $pagination->showPagination();
		$limit = $pagination->_nItemOnPage;
		$vitri = ($tranghientai-1)*$limit;
		$data = $m_data->search($key,$vitri, $limit);
		return array('data'=>$data,'thanhphantrang'=>$paginationHTML);
		
		//return $doan;
	}

	function timkiem2($key){
		$m_data = new M_data();
		$data = $m_data->search2($key);
		return $data;
	}

	function dangnhapTK($email, $password){
		$m_data = new M_data();
		$bandoc = $m_data->dangnhapbandoc($email,$password);
		$admin = $m_data->dangnhapquantritoanbo($email,$password);
		$quantribaiviet = $m_data->dangnhapquantribaiviet($email,$password);
		$quantrixaydung = $m_data->dangnhapquantrixaydung($email,$password);
		if($bandoc == true){
			$_SESSION['user_name'] = $bandoc['name'];
			$_SESSION['id'] = $bandoc['id'];
			$_SESSION['email'] = $bandoc['email'];
			$_SESSION["per"] = 'bandoc';
			//header('location:index.php');
			if(isset($_SESSION['user_error'])){
				unset($_SESSION['user_error']);
			}
			if(isset($_SESSION['chua_dang_nhap'])){
				unset($_SESSION['chua_dang_nhap']);
			}
		}elseif ($admin == true) {
			$_SESSION['user_name'] = $admin['name'];
			$_SESSION['id'] = $admin['id'];
			$_SESSION['email'] = $admin['email'];
			$_SESSION["per"] = 'admin';
			//header('location:views/admin/admin.php');
			if(isset($_SESSION['user_error'])){
				unset($_SESSION['user_error']);
			}
			if(isset($_SESSION['chua_dang_nhap'])){
				unset($_SESSION['chua_dang_nhap']);
			}
		}elseif ($quantribaiviet == true) {
			$_SESSION['user_name'] = $quantribaiviet['name'];
			$_SESSION['id'] = $quantribaiviet['id'];
			$_SESSION['email'] = $quantribaiviet['email'];
			$_SESSION["per"] = 'quantribaiviet';
			//header('location:views/admin/admin.php');
			if(isset($_SESSION['user_error'])){
				unset($_SESSION['user_error']);
			}
			if(isset($_SESSION['chua_dang_nhap'])){
				unset($_SESSION['chua_dang_nhap']);
			}
		}elseif ($quantrixaydung == true) {
			$_SESSION['user_name'] = $quantrixaydung['name'];
			$_SESSION['id'] = $quantrixaydung['id'];
			$_SESSION['email'] = $quantrixaydung['email'];
			$_SESSION["per"] = 'quantrixaydung';
			//header('location:views/admin/admin.php');
			if(isset($_SESSION['user_error'])){
				unset($_SESSION['user_error']);
			}
			if(isset($_SESSION['chua_dang_nhap'])){
				unset($_SESSION['chua_dang_nhap']);
			}
		}else{
			$_SESSION['user_error'] = "Sai thông tin đăng nhập";
		}
	}
}