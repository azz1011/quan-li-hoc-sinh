<?php
require '../classes/DB.class.php';
session_start();
$u = $_SESSION['ses_MaHS'];
$phs = $_SESSION['ses_passwordhs'];
?>

<?php
$connect = new DB();
$con = $connect->connect();
$old = $new = $pre = " ";
if (isset($_POST['hs'])) {
	if ($_POST['txtpasshs'] == null) {
		echo "ban chua nhap mat khau.";
	} else {
		if ($_POST['txtpasshs'] != $phs) {
			echo "mat khau va mat khau cu khong trung.";
		} else {
			$old = $_POST['txtpasshs'];
		}
	}
	if ($_POST['txtpasshs2'] == null) {
		echo "ban chua nhap mat khau moi.";
	} else {
		if ($_POST['txtpasshs2'] != $_POST['txtpasshs3']) {
			echo "mat khau nhap vao khong trung nhau";
		} else {
			$mk = "/^[a-zA-Z0-9]{6,}$/";
			if (preg_match($mk, $_POST["txtpasshs2"])) {
				$new = $_POST['txtpasshs2'];
			} else {
?>
				<script type="text/javascript">
					alert("Password Nhap Vao Khong Hop Le.!");
					window.location = "repass2.php";
				</script>
		<?php
				exit();
			}
		}
	}
	if ($u && $phs && $old && $new && $pre) {
		$query = "update hocsinh SET passwordhs='$new' where MaHS=$u";
		$results = mysqli_query($con, $query);
		?>
		<script type="text/javascript">
			alert("Đã Thay doi mat khau thanh cong!");
			window.location = "qlhs.php";
		</script>
<?php
		exit();
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Đổi Mật Khẩu</title>
</head>

<body>
	<div style="text-align: center;">
		<h1>ĐỔI MẬT KHẨU</h1>
	</div>
	<form action="repass2.php" method="post">
		<div class="form-outline mb-4 form-floating">
			<input class="form-control" type="password" id="floatingOldPass" name="txtpasshs" required>
			<label for="floatingOldPass">Mật khẩu hiện tại</label>
		</div>
		<div class="form-outline mb-4 form-floating">
			<input class="form-control" type="password" name="txtpasshs2" id="floatingNewPass" required>
			<label for="floatingNewPass">Mật khẩu mới</label>
		</div>
		<div class="form-outline mb-4 form-floating">
			<input class="form-control" type="password" name="txtpasshs3" id="repeatNewPass" required>
			<label for="floatingNewPass">Nhập lại mật khẩu mới</label>
		</div>
		<button class="btn btn-primary btn-block form-control" type="submit" name="hs">Thay đổi</button>
	</form>
</body>

</html>

<style>
	body {
		padding-top: 10%;
		margin: 0 35%;
	}
</style>