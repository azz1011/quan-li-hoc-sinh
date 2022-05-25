<?php
if ($_SESSION['ses_level'] != 1) {
    header("location:login.php");
}
?>
<h1>Quản Lý Admin</h1>
<h2><a href="user/themuser.php"><button class="btn btn-primary" style="width:130px;height: 40px">Thêm người dùng</button> </a></h2>
<h2><a href="user/hienthiuser.php"><button class="btn btn-primary" style="width:130px;height: 40px">Xem thông tin</button> </a></h2>
<h2><a href="user/doimatkhau.php"><button class="btn btn-primary" style="width:130px;height: 40px">Đổi Mật Khẩu</button> </a></h2>