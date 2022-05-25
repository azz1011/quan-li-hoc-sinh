<?php
session_start();
require "../../classes/diem.class.php";
$connect = new diem();
$students = $connect->alldiem();
$dis = $connect->dong();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Học sinh <?php echo $_SESSION['ses_TenHS'] ?></title>
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
            <h1 class="h1">Điểm Học Sinh</h1>

            <form class="d-flex justify-content-sm-start" action="xemdiem_hs.php" method="post">
                <div style="width: 20%; margin-bottom: 1em; margin-right: 1em;">
                    <select name="hk" class="form-select">
                        <?php
                        require '../../includes/config.php';
                        $query = "select * from hocky";
                        $results = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_assoc($results)) {
                            echo "<option value='$data[TenHocKy]'>$data[TenHocKy]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit" name="ok">Xem điểm</button>
                </div>
            </form>

            <?php
            if (isset($_POST['ok'])) {
            ?>
                <table class="table table-striped">
                    <tr>
                        <td>Học Kỳ</td>
                        <td>Môn Học</td>
                        <td>Điểm Miệng</td>
                        <td>Điểm 15 phút</td>
                        <td>Điểm 15 phút</td>
                        <td>Điểm 1 tiết</td>
                        <td>Điểm 1 tiết</td>
                        <td>Điểm Thi</td>
                        <td>Điểm TB môn</td>
                    </tr>
                    <?php
                    foreach ($students as $item) {
                        if ($_SESSION['ses_MaHS'] == $item['MaHS']) {
                            if ($_POST['hk'] == $item['TenHocKy']) {
                    ?>
                                <tr>
                                    <td><?php echo $item['MaHocKy']; ?></td>
                                    <td><?php echo $item['TenMonHoc']; ?></td>
                                    <td><?php echo $item['DiemMieng']; ?></td>
                                    <td><?php echo $item['Diem15Phut1']; ?></td>
                                    <td><?php echo $item['Diem15Phut2']; ?></td>
                                    <td><?php echo $item['Diem1Tiet1']; ?></td>
                                    <td><?php echo $item['Diem1Tiet2']; ?></td>
                                    <td><?php echo $item['DiemThi']; ?></td>
                                    <?php
                                    $tinh = 0;
                                    $tinh = ($item['DiemMieng'] + $item['Diem15Phut1'] + $item['Diem15Phut2'] + ($item['Diem1Tiet1'] + $item['Diem1Tiet2']) * 2 + $item['DiemThi'] * 3) / 10;
                                    $item['DiemTB'] = $tinh;
                                    ?>
                                    <?php if (
                                        $item['DiemMieng'] != null || $item['Diem15Phut1'] != null || $item['Diem15Phut2'] != null || $item['Diem1Tiet1'] != null ||
                                        $item['Diem1Tiet2'] != null
                                    ) {
                                    ?>
                                        <td><?php echo round($item['DiemTB'], 1); ?></td>
                                </tr>
            <?php
                                    }
                                }
                            }
                        }
                    }
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
    }

    .mhs {
        text-align: center;
    }

    .left-panel-item {
        padding: 0.5em 0;
    }

    a {
        text-decoration: none;
    }
</style>