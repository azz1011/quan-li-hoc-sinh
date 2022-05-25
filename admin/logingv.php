<?php
session_start();
require '../classes/DB.class.php';
$connect = new DB();
$con = $connect->connect();
$ugv = $pgv = "";
if (isset($_POST['gv'])) {
	if ($_POST['txtusergv'] == null) {
?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Tên Tài Khoản.");
			window.location = "logingv.php";
		</script>
	<?php
		exit();
	} else {
		$ugv = $_POST['txtusergv'];
	}
	if ($_POST['txtpassgv'] == null) {
	?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
			window.location = "logingv.php";
		</script>
		<?php
		exit();
	} else {
		$pgv = $_POST['txtpassgv'];
	}
	if ($ugv && $pgv) {
		$query = "select * from giaovien where Magv='$ugv' and passwordgv='$pgv'";
		$results = mysqli_query($con, $query);

		if ($rowscount = mysqli_num_rows($results) == 0) {
		?>
			<script type="text/javascript">
				alert("Tên tài khoản hoặc mật khẩu chưa chính xác.Vui lòng nhập lại!!");
				window.location = "logingv.php";
			</script>
<?php
			exit();
		} else {
			$data = mysqli_fetch_assoc($results);
			$_SESSION['ses_Magv'] = $data['Magv'];
			$_SESSION['ses_Tengv'] = $data['Tengv'];
			$_SESSION['ses_passwordgv'] = $data['passwordgv'];
			header("location:qlgv.php");
			exit();
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>TRANG ĐĂNG NHẬP GIÁO VIÊN</title>
	<link rel="shortcut icon" href="assets/ico/ico.ico" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="body-container">
		<h1>ĐĂNG NHẬP GIÁO VIÊN ACADEMY</h1>
		<form action="logingv.php" method="post">
			<div class="form-outline mb-4">
				<input class=" form-control" type="text" name="txtusergv" placeholder="Tên tài khoản" required>
			</div>
			<div class="form-outline mb-4">
				<input class=" form-control" type="password" name="txtpassgv" placeholder="Mật Khẩu" required>
			</div>
			<button class="btn btn-primary btn-block form-control" type="submit" name="gv">Đăng nhập</button>
		</form>
	</div>
</body>

</html>

<style>
	.body-container {
		margin: 10% 30%;
		border: 1px solid black;
		border-radius: 0.4em;
		box-shadow: 5px 5px 10px;
		padding: 1em;
		text-align: center;
	}

	span {
		width: 10em;
	}

	a {
		text-decoration: none;
		color: white;
	}
</style>