<?php
define('ROOT', dirname(__FILE__));
include "../includes/function.php";
session_start();
$history = "http://localhost/qld/admin/qlgv.php";
?>

<head>
	<title>
		Giáo viên <?php echo $_SESSION['ses_Tengv'] ?>
	</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
	<div class="bg-warning py-2">
	</div>

	<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href=<?php $history ?>>Academy</a>
			<div class="collapse navbar-collapse" id="main_nav">
			</div>
		</div>
	</nav>

	<div class="modal-body row">
		<!-- left workspace -->
		<div class="col-md-2 container border border-2" id="left-panel" style="height: 40em;">
			<h4 style="text-align: center;"><?php echo $_SESSION['ses_Tengv'] ?></h4>
			<div>
				<div class="left-panel-item">
					<a href=" diem/add_chon2.php"><button style="width: 100%;" class="btn btn-secondary">Nhập Điểm</button></a>
				</div>
				<div class="left-panel-item">
					<a href="diem/capnhatdiem.php"><button style="width: 100%;" class="btn btn-secondary">Cập Nhật Điểm</button></a>
				</div>
				<div class="left-panel-item">
					<a href="qlgv.php?mod=hs"><button style="width: 100%;" class="btn btn-secondary">Xem điểm </button></a>
				</div>
				<div class="left-panel-item">
					<a href="repass1.php"><button style="width: 100%;" class="btn btn-secondary">Đổi mật khẩu </button></a>
				</div>
				<div class="left-panel-item">
					<a href="logout.php"><button style="width: 100%;" class="btn btn-secondary">Đăng Xuất </button></a>
				</div>
			</div>
		</div>

		<style>
			.left-panel-item {
				padding: 0.5em;
			}
		</style>

		<!-- right workspace -->
		<div class="col-md-10 border border-2 p-3">
			<h1 style="text-align: center;">QUẢN LÝ GIÁO VIÊN</h1>
			<div class="right">
				<?php include "mod_gv.php"; ?>
			</div>
		</div>
	</div>

</body>