<?php
error_reporting(0);
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
if ($_SESSION['ses_level'] != 1) {
	header("location:login.php");
}
require "../classes/hocsinh.class.php";

?>

<?php
$malop = $_POST['malophoc'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
	<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>

<body>
	<h1>Quản Lý Học Sinh</h1>
	<h2><a href="hocsinh/add_hs.php"><button class="btn btn-primary" type='button'>Thêm Học Sinh</button> </a></h2>

	<form method="post">
		<h4>Danh sách lớp</h4>
		<!-- <p>Lỗi hiển thị theo lớp</p> -->

		<div class="ds-lop-container">
			<select name="malophoc" class="form-select" style="width: 20%;">
				<?php
				$con = new hocsinh();
				$data = $con->alllop();
				foreach ($data as $dt) {
					echo "<option value='$dt[MaLopHoc]'>$dt[MaLopHoc]</option>";
				}
				?>
			</select>

			<button class="btn btn-secondary" type="submit"> Chọn lớp </button>
		</div>
	</form>
	<br>
	<table class="table table-striped" id="dataTable">
		<thead>
			<tr>
				<td>STT</td>
				<td>Mã</td>
				<td>Mã Lớp</td>
				<td>Tên Học Sinh</td>
				<td>Giới tính</td>
				<td>Ngày Sinh</td>
				<td>Nơi Sinh</td>
				<td>Dân Tộc</td>
				<td>Tên bố</td>
				<td>Tên mẹ</td>
				<td>Tác vụ</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php
			// require "../classes/hocsinh.class.php";
			$con = new hocsinh();
			$hocsinh = $con->allhs($malop);
			$stt = 0;
			foreach ($hocsinh as $row) {
				$stt++; ?>
				<tr>
					<td><?php echo $stt ?></td>
					<td><?php echo $row['MaHS'] ?></td>
					<td><?php echo $row['MaLopHoc'] ?></td>
					<td><?php echo $row['TenHS'] ?></td>
					<td><?php echo $row['GioiTinh'] ?></td>
					<td><?php echo $row['NgaySinh'] ?></td>
					<td><?php echo $row['noisinh'] ?></td>
					<td><?php echo $row['hotencha'] ?></td>
					<td><?php echo $row['hotenme'] ?></td>
					<td><a href='hocsinh/sua_hs.php?cmahs=<?php echo $row['MaHS'] ?>'><button class='btn btn-success'>Sửa</button></a></td>
					<td><a href='hocsinh/xoa_hs.php?cmahs=<?php echo $row['MaHS'] ?>' onclick='return XacNhan();'><button class='btn btn-danger'>Xóa</button></a></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>

<script type="text/javascript">
	function XacNhan() {
		if (!window.confirm('Bạn có chắc không')) {
			return false;
		}
	}
</script>

</html>

<style>
	.ds-lop-container {
		display: flex;
	}
</style>

<script>
	var myTable = document.querySelector("#dataTable");
	var dataTable = new DataTable(myTable);
</script>