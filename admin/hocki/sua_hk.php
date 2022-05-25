<?php
session_start();
require "../../classes/hocki.class.php";
$connect = new hocki();
$ten = $hk = $nh = "";
$mahk = $_GET['cmahk'];
if (isset($_POST['ok'])) {
	if ($_POST['txtten'] == null) {
		echo "Bạn Chưa Nhập Tên Học Kỳ.";
	} else {
		$ten = $_POST['txtten'];
	}
	if ($_POST['txthocky'] == null) {
		echo "Bạn Chưa Nhập Hệ Số Học Kỳ.";
	} else {
		$hk = $_POST['txthocky'];
	}
	if ($_POST['txtnamhoc'] == null) {
		echo "Bạn Chưa Nhập Năm Học.";
	} else {
		$nh = $_POST['txtnamhoc'];
	}
	if ($ten && $hk && $nh) {
		$con = $connect->edit($mahk, $ten, $hk, $nh);
		header("location:../index.php?mod=hk");
		exit();
	}
}
$conn = $connect->selectquery($mahk);
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
	<h1>SỬA HỌC Kỳ</h1>
	<form action="sua_hk.php?cmahk=<?php echo $conn['MaHocKy']; ?>" method="post">
		<table class="table">

			<div class="input-group mb-3">
				<span class="input-group-text">Tên Học Kỳ:</span>
				<input class="form-control" type="text" name="txtten" size="25" value="<?php echo $conn['TenHocKy']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Hệ Số Học Kỳ:</span>
				<input class="form-control" type="text" name="txthocky" size="25" value="<?php echo $conn['HeSoHK']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Năm Học:</span>
				<input class="form-control" type="text" name="txtnamhoc" size="25" value="<?php echo $conn['NamHoc']; ?>" />
			</div>
			<button class="btn btn-primary" type="submit" name="ok"> Sửa học kỳ </button>
		</table>
	</form>
</body>

<style>
	.body-container {
		margin: 2% 30%;
	}

	span {
		width: 10em;
	}
</style>