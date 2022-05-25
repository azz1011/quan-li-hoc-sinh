<?php
session_start();
require "../classes/giaovien.class.php";
$con = new giaovien();
$ma = $_GET['cma'];
$mamon = $t = $dc = $dt = $p = "";
if (isset($_POST['ok'])) {
	if ($_POST['txtmamon'] == null) {
		echo "Chưa nhập mã môn học";
	} else {
		$mamon = $_POST['txtmamon'];
	}
	if ($_POST['txtten'] == null) {
		echo "Chưa nhập tên giáo viên";
	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtdiachi'] == null) {
		echo "Chưa nhập địa chỉ";
	} else {
		$dc = $_POST['txtdiachi'];
	}
	if ($_POST['txtdienthoai'] == null) {
		echo "Chưa nhập địa chỉ";
	} else {
		$dt = $_POST['txtdienthoai'];
	}
	if ($_POST['txtpass'] == null) {
		echo "Chưa nhập mật khẩu";
	} else {
		$p = $_POST['txtpass'];
	}
	if ($mamon && $t && $dc && $dt && $p) {
		$giaovien = $con->edit($ma, $mamon, $t, $dc, $dt, $p);
		header("location:index.php?mod=gv");
		$dis = $con->dis();
		exit();
	}
	$dis = $con->dis();
}
?>
<?php
$row = $con->selectgv($ma);

?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
	<h1>Sửa giáo viên</h1>
	<form action="sua_gv.php?cma=<?php echo $row['Magv']; ?>" method="post">
		<table class="table">
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Mã môn học</span>
				<input type="text" class="form-control" name="txtmamon" value="<?php echo $row['MaMonHoc']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Tên giáo viên</span>
				<input class="form-control" type="text" name="txtten" value="<?php echo $row['Tengv']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Địa chỉ</span>
				<textarea class="form-control" type="text" name="txtdiachi"><?php echo $row['DiaChi']; ?> </textarea>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Điện Thoại</span>
				<input type="text" class="form-control" name="txtdienthoai" value="<?php echo $row['SDT']; ?>" />
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Mật khẩu cũ</span>
				<input type="password" name="txtpass" class="form-control" value="<?php echo $row['passwordgv']; ?>" />
			</div>
			<div class="input-group mb-3">
				<input type="submit" class="form-control" name="ok" aria-describedby="basic-addon1" value="Sửa giáo viên">
			</div>
		</table>
	</form>
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