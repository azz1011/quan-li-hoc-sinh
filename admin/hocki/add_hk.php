<?php
session_start();
$n = $ten = $h = $nam = "";
require "../../classes/hocki.class.php";
if (isset($_POST['ok'])) {
    $connect = new hocki();
    $d = $connect->allquery();
    if ($_POST['txthk'] == null) {
        echo "Bạn Chưa Nhập Mã Học Kỳ!";
    } else {
        $hocky = "/^[0-9]{5}$/";
        if (preg_match($hocky, $_POST['txthk'])) {
            $n = $_POST['txthk'];
        } else {
?>
            <script type="text/javascript">
                alert("Ma Hoc Ky Khong Hop Le.!");
                window.location = "add_hk.php";
            </script>
        <?php
            exit();
        }
    }
    if ($_POST['txtten'] == null) {
        echo "</br> Bạn Chưa Nhập Tên Học Kỳ!";
    } else {
        $tenhk = "/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
        if (preg_match($tenhk, $_POST['txtten'])) {
            $ten = $_POST['txtten'];
        } else {
        ?>
            <script type="text/javascript">
                alert("Ten Hoc Ky Khong Hop Le.!");
                window.location = "add_hk.php";
            </script>
        <?php
            exit();
        }
    }
    if ($_POST['txtheso'] == null) {
        echo "</br> Bạn Chưa Nhập Hệ Số Học Kỳ!";
    } else {
        $heso = "/^[1-2]{1}$/";
        if (preg_match($heso, $_POST['txtheso'])) {
            $h = $_POST['txtheso'];
        } else {
        ?>
            <script type="text/javascript">
                alert("He So Hoc Ky Khong Hop Le.!");
                window.location = "add_hk.php";
            </script>
        <?php
            exit();
        }
    }
    if ($_POST['txtnam'] == null) {
        echo "</br> Bạn Chưa Nhập Năm Học!";
    } else {
        $nh = "/^[0-9_-]{9,}$/";
        if (preg_match($nh, $_POST['txtnam'])) {
            $nam = $_POST['txtnam'];
        } else {
        ?>
            <script type="text/javascript">
                alert("Nam Hoc Khong Hop Le.!");
                window.location = "add_hk.php";
            </script>
        <?php
            exit();
        }
    }

    if ($n && $ten && $h && $nam) {
        $con = $connect->add($n, $ten, $h, $nam);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm Cột Diểm Thành Công.Nhấn OK Để Tiếp Tục !");
            window.location = "../index.php?mod=hk";
        </script>
<?php
        exit();
    }
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
    <h1>THÊM HỌC KỲ</h1>
    <form action="add_hk.php" method="post">
        <table class="table">
            <div class="input-group mb-3">
                <span class="input-group-text">Mã học kỳ</span>
                <input class="form-control" type="text" name="txthk" size="25" placeholder="12016" /><br />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Học kỳ</span>
                <input class="form-control" type="text" name="txtten" size="25" placeholder="Bằng chữ có dấu" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Hệ số</span>
                <input class="form-control" type="text" name="txtheso" size="25" placeholder="1 && 2" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Năm học</span>
                <input class="form-control" type="text" name="txtnam" size="25" placeholder="Từ năm - Đến năm" />
            </div>
            <button class="btn btn-primary" type="submit" name="ok"> Thêm học kỳ </button>
        </table>
    </form>
</body>

<style>
    .body-container {
        margin: 2% 30%;
    }

    span {
        width: 10em;
    }
</style>