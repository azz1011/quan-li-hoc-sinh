<?php
session_start();
require '../classes/DB.class.php';
$connect = new DB();
$con = $connect->connect();
$uhs = $phs = "";
if (isset($_POST['hs'])) {
	if ($_POST['txtuserhs'] == null) {
?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Tên Tài Khoản.");
			window.location = "loginhs.php";
		</script>
	<?php
		exit();
	} else {
		$uhs = $_POST['txtuserhs'];
	}
	if ($_POST['txtpasshs'] == null) {
	?>
		<script type="text/javascript">
			alert("Tài khoản hoặc Mật khẩu trống");
			window.location = "loginhs.php";
		</script>
		<?php
		exit();
	} else {
		$phs = $_POST['txtpasshs'];
	}
	if ($uhs && $phs) {

		//require("../includes/config.php");


		$query = "select * from hocsinh where MaHS='$uhs' and passwordhs='$phs'";
		$results = mysqli_query($con, $query);
		if ($rowcount = mysqli_num_rows($results) == 0) {
		?>
			<script type="text/javascript">
				alert("Tài khoản hoặc Mật khẩu sai");
				window.location = "loginhs.php";
			</script>
<?php
			exit();
		} else {
			$data = mysqli_fetch_assoc($results);
			$_SESSION['ses_MaHS'] = $data['MaHS'];
			$_SESSION['ses_TenHS'] = $data['TenHS'];
			$_SESSION['ses_passwordhs'] = $data['passwordhs'];
			header("location:qlhs.php");
			exit();
		}
	}
	$dis = $con->close();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>THPT Academy</title>

	<link rel="shortcut icon" href="assets/ico/icon.ico" />
	<link rel="stylesheet" href="./assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="body-container">
		<div style="text-align: center;">
			<h1>TRA CỨU ĐIỂM</h1>
		</div>
		<form action="loginhs.php" method="post">
			<div class="form-outline mb-4 form-floating">
				<input class="form-control" type="text" name="txtuserhs" id="floatingInput" placeholder="Tên tài khoản" required>
				<label for="floatingInput">Mã học sinh</label>
			</div>
			<!-- // -->
			<div class="form-outline mb-4 form-floating">
				<input class="form-control" type="password" id="floatingPassword" name="txtpasshs" placeholder="Mật Khẩu" required>
				<label for="floatingPassword">Mật khẩu</label>
			</div>
			<!-- // -->
			<button class="btn btn-primary btn-block form-control" style=" color: white;" type="submit" name="hs" value="Đăng Nhập">Đăng nhập</button>
		</form>
	</div>
</body>

<style>
	.body-container {
		margin: 10% 30%;
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

</html>