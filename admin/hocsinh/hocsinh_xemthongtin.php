<?php
session_start();
require "../../classes/hocsinh.class.php";
$connect = new hocsinh();
$students = $connect->allhs2($_SESSION['ses_MaHS']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Học sinh <?php echo $_SESSION['ses_MaHS'] ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="bg-warning py-2">
    </div>

    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="http://localhost/qld/admin/qlhs.php">Academy</a>
            <div class="collapse navbar-collapse" id="main_nav">
            </div>
        </div>
    </nav>

    <div class="modal-body row">

        <!-- left workspace -->
        <div class="col-md-2 container border border-2" id="left-panel" style="height: 40em;">
            <div class="mhs">
                <h5>
                    <?php
                    echo $_SESSION['ses_TenHS'];
                    ?>
                </h5>
            </div>
            <div class="left-panel-item"><a href="xemdiem_hs.php"><button style="width: 100%;" class="btn btn-secondary">Xem Điểm</button></a></div>
            <div class="left-panel-item"><a href="hocsinh_xemthongtin.php"><button style="width: 100%;" class="btn btn-secondary">Thông Tin Học Sinh</button></a></div>
            <div class="left-panel-item"><a href="../repass2.php"><button style="width: 100%;" class="btn btn-secondary">Thay Đổi Mật Khẩu</button></a></div>
            <div class="left-panel-item"><a href="../logout.php"><button style="width: 100%;" class="btn btn-secondary">Đăng Xuất</button></a></div>
        </div>

        <!-- right workplace -->
        <div class="col-md-10 border border-2 p-3">
            <h1>THÔNG TIN HỌC SINH</h1>
            <table class="table table-striped">
                <tr>
                    <td>Mã Học Sinh</td>
                    <td>Tên Học Sinh</td>
                    <td>Lớp</td>
                    <td>Giới Tính</td>
                    <td>Ngày Sinh</td>
                    <td>Nơi Sinh</td>
                    <td>Dân Tộc</td>
                    <td>Họ Tên Bố</td>
                    <td>Họ Tên Mẹ</td>
                </tr>

                <?php
                foreach ($students as $item) {
                    if ($_SESSION['ses_MaHS'] == $item['MaHS']) {
                ?>
                        <tr>
                            <td><?php echo $item['MaHS']; ?></td>
                            <td><?php echo $item['TenHS']; ?></td>
                            <td><?php echo $item['MaLopHoc']; ?></td>
                            <td><?php echo $item['GioiTinh']; ?></td>
                            <td><?php echo $item['NgaySinh']; ?></td>
                            <td><?php echo $item['noisinh']; ?></td>
                            <td><?php echo $item['dantoc']; ?></td>
                            <td><?php echo $item['hotencha']; ?></td>
                            <td><?php echo $item['hotenme']; ?></td>
                        <?php }

                        ?>
                        </tr>
                    <?php }
                    ?>
            </table>
        </div>
    </div>


</body>

</html>

<style>
    body {
        padding: 0 4em;
    }

    #left-panel {
        background-color: rgb(247, 247, 247);
        margin: 0;
    }

    .mhs {
        text-align: center;
    }

    .left-panel-item {
        color: #0d6efd;
        padding: 0.5em 0;
    }

    .left-panel-item:hover {
        cursor: pointer;
    }

    a {
        text-decoration: none;
    }
</style>