<?php

require '../../classes/lop.class.php';
$con = new lop();
$data = $con->alllop();
// Nếu người dùng submit form
if (!empty($_POST['themlop'])) {
    $malop = "/^[a-zA-Z0-9]{4,10}$/";
    if (preg_match($malop, isset($_POST['malop']) ? $_POST['malop'] : '')) {
        $data['MaLopHoc'] = isset($_POST['malop']) ? $_POST['malop'] : '';
    } else {
?>
        <script type="text/javascript">
            alert("Ma Lop Khong Hop Le.!");
            window.location = "themlop.php";
        </script>
    <?php
        exit();
    }
    $tenlop = "/^[a-zA-Z0-9]{4,10}$/";
    if (preg_match($tenlop, isset($_POST['tenlop']) ? $_POST['tenlop'] : '')) {
        $data['Tenlophoc'] = isset($_POST['tenlop']) ? $_POST['tenlop'] : '';
    } else {
    ?>
        <script type="text/javascript">
            alert("Ten Lop Khong Hop Le.!");
            window.location = "themlop.php";
        </script>
    <?php
        exit();
    }
    $khoi = "/^[10-11-12]{2}$/";
    if (preg_match($khoi, isset($_POST['khoilop']) ? $_POST['khoilop'] : '')) {
        $data['KhoiHoc'] = isset($_POST['khoilop']) ? $_POST['khoilop'] : '';
    } else {
    ?>
        <script type="text/javascript">
            alert("khoi Lop Khong Hop Le.!");
            window.location = "themlop.php";
        </script>
<?php
        exit();
    }

    // Validate thong tin
    $errors = array();
    if (empty($data['MaLopHoc'])) {
        $errors['MaLopHoc'] = 'Chưa nhập Mã Lớp Học';
    }

    if (empty($data['Tenlophoc'])) {
        $errors['Tenlophoc'] = 'Chưa nhập tên lớp học';
    }
    if (empty($data['KhoiHoc'])) {
        $errors['KhoiHoc'] = 'Chưa nhập khối học';
    }

    if (!$errors) {
        $lop = $con->add($data['MaLopHoc'], $data['Tenlophoc'], $data['KhoiHoc']);
        header("location: ../index.php?mod=lop");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Thêm lớp</title>
</head>

<body class="body-container">
    <div>
        <h1>THÊM LỚP HỌC</h1>
        <form method="post" action="themlop.php">
            <table class="table">
                <div class="input-group mb-3">
                    <span class="input-group-text">Mã Lớp</span>

                    <input class="form-control" type="text" name="malop" placeholder="// 10A1 " />
                    <?php if (!empty($errors['MaLopHoc'])) echo $errors['MaLopHoc']; ?>

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Tên Lớp</span>

                    <input class="form-control" type="text" name="tenlop" />
                    <?php if (!empty($errors['Tenlophoc'])) echo $errors['Tenlophoc']; ?>

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Khối</span>

                    <input class="form-control" type="text" name="khoilop" placeholder="10/11/12" />
                    <?php if (!empty($errors['KhoiHoc'])) echo $errors['KhoiHoc']; ?>

                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-primary" type="submit" name="themlop"> Thêm lớp học </button>
                </div>
            </table>
        </form>
    </div>
</body>

</html>

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