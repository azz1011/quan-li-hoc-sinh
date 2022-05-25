<?php
session_start();
require "../../includes/config.php";
$madiem = $_GET['cma'];
$malop = $t = $gt = $ns = $nois = $dt = $cha = $me = "";
if (isset($_POST['ok'])) {
    if ($_POST['txtmalop'] == null) {
        echo "ban chua nhap ma lop hoc";
    } else {
        $malop = $_POST['txtmalop'];
    }
    if ($_POST['txtten'] == null) {
        echo "ban chua nhap ten";
    } else {
        $t = $_POST['txtten'];
    }
    if ($_POST['txtns'] == null) {
        echo "Bạn Chưa Nhập Vào Ngày Sinh";
    } else {
        $ns = $_POST['txtns'];
    }
    if ($_POST['txtnois'] == null) {
        echo "Bạn Chưa Nhập Vào Nơi Sinh";
    } else {
        $nois = $_POST['txtnois'];
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
        echo "Bạn Chưa Nhập Vào Tên Học Sinh";
    } else {
        $p = $_POST['txtpasshs'];
    }
    if ($_POST['txtthi'] == null) {
        echo "Bạn Chưa Nhập Vào Tên Học Sinh";
    } else {
        $thi = $_POST['txtthi'];
    }

    if ($malop && $t && $ns && $nois && $dt && $cha && $me && $p) {
        $query = "update diem set DiemMieng='$nois',Diem15Phut1='$dt',Diem15Phut2='$cha',Diem1Tiet1='$me',Diem1Tiet2='$p', DiemThi='$thi' where MaDiem='$madiem'";
        $results = mysqli_query($conn, $query);
        header("location:../index.php?mod=diem");
        exit();
    }
}
$query = "select * from diem where MaDiem='$madiem'";
$results = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($results);
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
    <h1>SỬA ĐIỂM</h1>
    <table class="table">
        <form action="suadiem.php?cma=<?php echo $row['MaDiem']; ?>" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text">Mã Học Sinh</span>
                <input class="form-control" type="text" name="txtmalop" size="25" value="<?php echo $row['MaHS']; ?>" readonly="readonly" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Tên Học Sinh</span>
                <input class="form-control" type="text" name="txtname" size="25" value="<?php echo $_GET["tenhs"] ?>" readonly="readonly" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Mã Lớp</span>
                <input class="form-control" type="text" name="txtten" size="25" value="<?php echo $row['MaLopHoc']; ?>" readonly="readonly" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Mã Môn</span>
                <input type="text" class="form-control" name="txtten" size="25" value="<?php echo $row['MaMonHoc']; ?>" readonly="readonly" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Mã Học Kỳ</span>
                <input class="form-control" type="text" name="txtns" size="25" value="<?php echo $row['MaHocKy']; ?>" readonly="readonly" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Điểm Miệng</span>
                <input class="form-control" type="text" name="txtnois" size="25" value="<?php echo $row['DiemMieng']; ?>" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Điểm 15 Phút</span>
                <input class="form-control" type="text" name="txtdantoc" size="25" value="<?php echo $row['Diem15Phut1']; ?>" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Điểm 15 Phút</span>
                <input class="form-control" type="text" name="txtcha" size="25" value="<?php echo $row['Diem15Phut2']; ?>" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Điểm 1 Tiết</span>
                <input class="form-control" type="text" name="txtme" size="25" value="<?php echo $row['Diem1Tiet1']; ?>" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Điểm 1 Tiết</span>
                <input class="form-control" type="text" name="txtpasshs" size="25" value="<?php echo $row['Diem1Tiet2']; ?>" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Điểm Thi</span>
                <input class="form-control" type="text" name="txtthi" size="25" value="<?php echo $row['DiemThi']; ?>" />
            </div>
            <button class="btn btn-primary" type="submit" name="ok"> Sửa điểm </button>

        </form>
    </table>
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