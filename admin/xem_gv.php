<?php
if ($_SESSION['ses_level'] != 1) {
	header("location:login.php");
}
?>

<body>
	<h1>Quản Lý Giáo Viên</h1>

	<h2><a href="add_gv.php"><button class="btn btn-primary" type='button'>Thêm giáo viên</button> </a></h2>
	<table class="table table-striped">
		<tr>
			<td>STT</td>
			<td>Mã giáo viên</td>
			<td>Mã Môn Học</td>
			<td>Tên giáo viên </td>
			<td>Địa Chỉ</td>
			<td>Số Điên Thoại</td>
			<td>Tác vụ</td>
			<td </tr>
				<?php
				require '../classes/giaovien.class.php';
				$con = new giaovien();
				$giaovien = $con->allgv();
				$stt = 0;
				foreach ($giaovien as $row) {
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>$row[Magv]</td>";
					echo "<td>$row[MaMonHoc]</td>";
					echo "<td>$row[Tengv]</td>";
					echo "<td>$row[DiaChi]</td>";
					echo "<td>$row[SDT]</td>";
					echo "<td><a href='sua_gv.php?cma=$row[Magv]'><button class='btn btn-success' type='button'>Sửa</button></a></td>";
					echo "<td><a href='xoa_gv.php?Ma=$row[Magv]' onclick='return XacNhan();'><button class='btn btn-danger' type='button'>Xóa</button></a></td>";
					echo "</tr>";
				}
				$dis = $con->dis();
				?>
	</table>
</body>

<script type="text/javascript">
	function XacNhan() {
		if (!window.confirm('Bạn Có Chắc Muốn Xóa giáo Viên Này Không!!!')) {
			return false;
		}
	}
</script>