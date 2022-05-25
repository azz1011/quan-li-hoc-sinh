<?php
session_start();
?>

<head>
	<title>Học sinh <?php echo $_SESSION['ses_TenHS'] ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../assets//css//style.css">
</head>

<body>
	<div class="bg-warning py-2">
	</div>

	<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="#">Academy</a>
			<div class="collapse navbar-collapse" id="main_nav">
			</div>
		</div>
	</nav>

	<div class="modal-body row">

		<!-- left workplace -->
		<div class="col-md-2 container border border-2" id="left-panel" style="height: 40em;">
			<div class="mhs">
				<h5><?php echo $_SESSION['ses_TenHS']; ?> </h5>
			</div>
			<div class="left-panel-item"><a href="hocsinh/xemdiem_hs.php"><button style="width: 100%;" class="btn btn-secondary">Xem Điểm</button></a></div>
			<div class="left-panel-item"><a href="hocsinh/hocsinh_xemthongtin.php"><button style="width: 100%;" class="btn btn-secondary">Thông Tin Học Sinh</button></a></div>
			<div class="left-panel-item"><a href="repass2.php"><button style="width: 100%;" class="btn btn-secondary">Thay Đổi Mật Khẩu</button></a></div>
			<div class="left-panel-item"><a href="logout.php"><button style="width: 100%;" class="btn btn-secondary">Đăng Xuất</button></a></div>
		</div>

		<style>
			.left-panel-item {
				padding: 0.5em 0.75em;
			}
		</style>

		<!-- right workplace -->
		<div class="col-md-10 border border-2 p-3">
			<div>
				<h2>Chức năng</h2>
			</div>
			<div class="d-flex justify-content-between">
				<div>
					<a href="hocsinh/xemdiem_hs.php">
						<button class="btn btn-success">
							<div class="tacvu-hocsinh-btn">
								<h2>Xem Điểm</h2>
							</div>
						</button>
					</a>
				</div>
				<div>
					<a href="hocsinh/hocsinh_xemthongtin.php">
						<button class=" btn btn-secondary">
							<div class="tacvu-hocsinh-btn">
								<h2>Thông tin học sinh</h2>
							</div>
						</button>
					</a>
				</div>
				<div>
					<a href="repass2.php">
						<button class="btn btn-danger">
							<div class="tacvu-hocsinh-btn">
								<h2>Đổi Mật khẩu</h2>
							</div>
						</button>
					</a>
				</div>

			</div>
		</div>

	</div>
</body>