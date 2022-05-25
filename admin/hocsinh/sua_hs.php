<?php
session_start();
require "../../classes/hocsinh.class.php";
$con = new hocsinh();
require "../../includes/config.php";
$mahs = $_GET['cmahs'];
$malop = $t = $gt = $ns = $nois = $dt = $cha = $me = $p = "";
if (isset($_POST['ok'])) {
	if ($_POST['txtmalop'] == null) {
		echo "Chưa nhập lớp";
	} else {
		$malop = $_POST['txtmalop'];
	}
	if ($_POST['txtten'] == null) {
		echo "Chưa nhập tên";
	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtgt'] == null) {
		echo "Chưa nhập giới tính";
	} else {
		$gt = $_POST['txtgt'];
	}
	if ($_POST['txtns'] == null) {
		echo "Chưa nhập ngày sinh";
	} else {
		$ns = $_POST['txtns'];
	}
	if ($_POST['txtnois'] == null) {
		echo "Chưa nhập nơi sinh";
	} else {
		$nois = $_POST['txtnois'];
	}
	if ($_POST['txtdantoc'] == null) {
		echo "Chưa nhập dân tộc";
	} else {
		$dt = $_POST['txtdantoc'];
	}
	if ($_POST['txtcha'] == null) {
		echo "Chưa nhập tên bố";
	} else {
		$cha = $_POST['txtcha'];
	}
	if ($_POST['txtme'] == null) {
		echo "Chưa nhập tên mẹ";
	} else {
		$me = $_POST['txtme'];
	}
	if ($_POST['txtpasshs'] == null) {
		echo "Chưa nhập mật khẩu";
	} else {
		$p = $_POST['txtpasshs'];
	}
	if ($mahs && $malop && $t && $gt && $ns && $nois && $dt && $cha && $me && $p) {
		//$hs=$con->edit($mahs,$malop,$t,$gt,$ns,$nois,$dt,$cha,$me,$p);
		$query = "update hocsinh set MaLopHoc='$malop',TenHS='$t',GioiTinh='$gt',NgaySinh='$ns',noisinh='$nois',dantoc='$dt',
		hotencha='$cha',hotenme='$me',passwordhs='$p' where MaHS='$mahs'";
		$results = mysqli_query($conn, $query);
		header("location:../index.php?mod=hs");
		exit();
	}
}
$row = $con->selecths($mahs);
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
	<h1>SỬA HỌC SINH</h1>
	<table class="table">
		<form action="sua_hs.php?cmahs=<?php echo $row['MaHS']; ?>" method="post">
			<div class="input-group mb-3">
				<span class="input-group-text">Mã Lớp Học</span>
				<input class="form-control" type="text" name="txtmalop" value="<?php echo $row['MaLopHoc']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Tên Học Sinh</span>
				<input type="text" class="form-control" name="txtten" value="<?php echo $row['TenHS']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">giới tính</span>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="txtgt" value="Nam" value="<?php echo $row['GioiTinh']; ?>">Nam
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="txtgt" value="Nữ" value="<?php echo $row['GioiTinh']; ?>">Nữ
				</div>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Ngày sinh</span>
				<input class="form-control" type="date" name="txtns" value="<?php echo $row['NgaySinh']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Nơi Sinh</span>
				<input type="text" class="form-control" name="txtnois" value="<?php echo $row['noisinh']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Dân Tộc</span>
				<input type="text" class="form-control" name="txtdantoc" value="<?php echo $row['dantoc']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Họ tên bố</span>
				<input type="text" class="form-control" name="txtcha" value="<?php echo $row['hotencha']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Họ tên mẹ</span>
				<input type="text" class="form-control" name="txtme" value="<?php echo $row['hotenme']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Mật khẩu</span>
				<input class="form-control" type="password" name="txtpasshs" value="<?php echo $row['passwordhs']; ?>" />
			</div>
			<button class="btn btn-primary" type="submit" name="ok"> Sửa học sinh</button>
		</form>
	</TABLE>
</body>

<style>
	.body-container {
		margin: 2% 30%;
		border: 1px solid black;
		border-radius: 0.4em;
		box-shadow: 5px 5px 10px;
		padding: 1em;
	}

	span {
		width: 10em;
	}

	a {
		text-decoration: none;
		color: white;
	}
</style>