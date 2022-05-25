<?php
session_start();
$m = $malop = $t = $gt = $ns = $nois = $dt = $cha = $me = $p = "";
require "../../classes/hocsinh.class.php";
$con = new hocsinh();
if (isset($_POST['ok'])) {
	if ($_POST['txtmahs'] == null) {
		echo "Bạn Chưa Nhập Mã Học Sinh!<br/>";
	} else {
		$rule = "/^[0-9]{6}$/";
		if ($_POST['txtmahs']) {
			$m = $_POST['txtmahs'];
		} else {
?>
			<script type="text/javascript">
				alert("Ma Hoc Sinh Khong Hop Le.!");
				window.location = "add_hs.php";
			</script>
		<?php
			exit();
		}
	}
	if ($_POST['malophoc'] != null) {
		$malop = $_POST['malophoc'];
	}
	if ($_POST['txtten'] == null) {
		echo "Bạn Chưa Nhập Vào Tên Học Sinh";
	} else {
		$hoten = "/^[a-zA-Z'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ� �ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ� ��ỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]*$/";
		if (preg_match($hoten, $_POST['txtten'])) {
			$t = $_POST['txtten'];
		} else {
		?>
			<script type="text/javascript">
				alert("Ho Ten Hoc Sinh Khong Hop Le.!");
				window.location = "add_hs.php";
			</script>
		<?php
			exit();
		}
	}
	/*if($_POST['txtgt'] == null){
		echo "Bạn Chưa Nhập Vào giới tính";
	}else{
		$gt=$_POST['txtgt'];
	}*/
	if ($_POST['txtgt'] == 1) {
		$gt = "Nam";
	} else {
		$gt = "Nữ";
	}
	if ($_POST['txtngs'] == null) {
		echo "Bạn Chưa Nhập Vào Ngày Sinh";
	} else {
		$ns = $_POST['txtngs'];
	}
	if ($_POST['txtns'] == null) {
		echo "Bạn Chưa Nhập Vào Nơi Sinh";
	} else {
		$nois = $_POST['txtns'];
	}
	if ($_POST['txtdantoc'] == null) {
		echo "Bạn Chưa Nhập Vào Dân Tộc";
	} else {
		$dt = $_POST['txtdantoc'];
	}
	if ($_POST['txtcha'] == null) {
		echo "Bạn Chưa Nhập Vào Họ Tên Cha";
	} else {
		$cha = $_POST['txtcha'];
	}
	if ($_POST['txtme'] == null) {
		echo "Bạn Chưa Nhập Vào Họ Tên Mẹ";
	} else {
		$me = $_POST['txtme'];
	}
	if ($_POST['txtpasshs'] == null) {
		echo "Bạn Chưa Nhập Mật Khẩu Học Sinh";
	} else {
		$pass = "/^[a-zA-Z0-9]{6,}$/";
		if (preg_match($pass, $_POST['txtpasshs'])) {
			$p = md5($_POST['txtpasshs']);
		} else {
		?>
			<script type="text/javascript">
				alert("Password Nhap Vao Khong Hop Le.!");
				window.location = "add_hs.php";
			</script>
		<?php
			exit();
		}
	}

	if ($m && $malop && $t && $gt && $ns && $nois && $dt && $cha && $me && $p) {
		$hocsinh = $con->add($m, $malop, $t, $gt, $ns, $nois, $dt, $cha, $me, $p);
		?>
		<script type="text/javascript">
			alert("Bạn Đã Thêm Học Sinh Thành Công.Nhấn OK Để Tiếp Tục Thêm Học Sinh!");
			window.location = "../index.php?mod=hs";
		</script>
<?php
		exit();
		require("../../classes/DB.class.php");
	}
}
?>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">

	<h1>THÊM HỌC SINH</h1>
	<form action="add_hs.php" method="post">
		<div id="menu">
			<table class="table">
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Mã học sinh</span>
					<input type="text" class="form-control" value="<?php echo uniqid(); ?>" name="txtmahs" aria-label="txtmahs" placeholder="6 số nguyên từ 0-9" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Mã lớp </span>
					<select name="malophoc" class="form-select">
						<?php
						$connect = new db();
						$conn = $connect->connect();
						$query = "select * from lophoc";
						$results = mysqli_query($conn, $query);
						while ($data = mysqli_fetch_assoc($results)) {
							echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
						}
						?>
					</select>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Tên học sinh</span>
					<input type="text" class="form-control" name="txtten" aria-label="Username" aria-describedby="basic-addon1">
				</div>

				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Giới tính</span>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="txtgt" value="1" id="flexCheckChecked">
						<label class="form-check-label" for="flexCheckChecked">
							Nam
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="txtgt" value="2" id="flexCheckChecked">
						<label class="form-check-label" for="flexCheckChecked">
							Nữ
						</label>
					</div>
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Ngày sinh</span>
					<input type="date" class="form-control" name="txtngs" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Nơi sinh</span>
					<input type="text" class="form-control" name="txtns" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Dân tộc</span>
					<input type="text" class="form-control" name="txtdantoc" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Họ Tên Bố</span>
					<input type="text" class="form-control" name="txtcha" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Họ Tên Mẹ</span>
					<input type="text" class="form-control" name="txtme" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1">Mật khẩu</span>
					<input type="password" class="form-control" name="txtpasshs" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<button class="btn btn-primary" type="submit" name="ok"> Thêm học sinh </button>
			</table>
		</div>
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