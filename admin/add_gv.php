<?php
session_start();
require("../classes/giaovien.class.php");
$m = $t = $dc = $dt = $p = "";

if (isset($_POST['ok'])) {
	$con = new giaovien();
	if ($_POST['txtmagv'] == null) {
		echo "Chưa nhập mã giáo viên";
	} else {
		$rule = "/^[0-9]{4}$/";
		if (preg_match($rule, $_POST['txtmagv'])) {
			$m = $_POST['txtmagv'];
		} else {
?>
			<script type="text/javascript">
				alert("Mã giáo viên không hợp lệ");
				window.location = "add_gv.php";
			</script>
		<?php
			exit();
		}
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
		echo "Chưa nhập số điện thoại";
	} else {
		$dienthoai = "/^[0-9]{10,11}$/";
		if (preg_match($dienthoai, $_POST['txtdienthoai'])) {
			$dt = $_POST['txtdienthoai'];
		} else {
		?>
			<script type="text/javascript">
				alert("Số điện thoại không hợp lệ");
				window.location = "add_gv.php";
			</script>
		<?php
			exit();
		}
	}
	if ($_POST['txtpass'] == null) {
		echo "Chưa nhập mật khẩu";
	} else {
		$pass = "/^[a-zA-Z0-9]{6,}$/";
		if (preg_match($pass, $_POST['txtpass'])) {
			$p = md5($_POST['txtpass']);
		} else {
		?>
			<script type="text/javascript">
				alert("Mật khẩu không hợp lệ");
				window.location = "add_gv.php";
			</script>
		<?php
			exit();
		}
	}

	$mamon = $_POST['mamonhoc'];


	if ($m && $mamon && $t && $dc && $dt && $p) {
		$giaovien = $con->add($m, $mamon, $t, $dc, $dt, $p);
		?>
		<script type="text/javascript">
			alert("Thêm thành công");
			window.location = "index.php?mod=gv";
		</script>
<?php
		exit();
		require("../classes/DB.class.php");
	}
}
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
	<h1>Thêm giáo viên</h1>
	<form action="add_gv.php" method="post">
		<table class="table table-striped">
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Mã giáo viên</span>
				<input type="text" class="form-control" name="txtmagv" placeholder="4 số" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text">Mã Môn Học</span>
				<select class="form-select" name="mamonhoc">
					<?php
					$db = new DB();
					$conn = $db->connect();
					$query = "select * from monhoc";
					$results = mysqli_query($conn, $query);
					while ($data = mysqli_fetch_assoc($results)) {
						echo "<option value='$data[MaMonHoc]'>$data[MaMonHoc]</option>";
						$di = $db->close();
					}
					?>
				</select>
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Tên giáo viên</span>
				<input type="text" class="form-control" name="txtten" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Địa chỉ</span>
				<input type="text" class="form-control" name="txtdiachi" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Số điện thoại</span>
				<input type="text" class="form-control" name="txtdienthoai" placeholder="9 đến 11 số" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon1">Mật khẩu</span>
				<input type="text" class="form-control" name="txtpass" placeholder="Trên 6 kí tự" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
				<input type="submit" class="form-control" name="ok" aria-describedby=" basic-addon1" value="Thêm giáo viên">
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