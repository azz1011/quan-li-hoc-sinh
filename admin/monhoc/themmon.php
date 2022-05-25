<?php
session_start();
require "../../classes/monhoc.class.php";
$con = new monhoc();
if (!empty($_POST['add_mon'])) {
    // Lay data
    $mamon = "/^[A-Z]{1,}$/";
    if (preg_match($mamon, isset($_POST['ma']) ? $_POST['ma'] : '')) {
        $data['MaMonHoc'] = isset($_POST['ma']) ? $_POST['ma'] : '';
    } else {
?>
        <script type="text/javascript">
            alert("Môn không hợp lệ");
            window.location = "themmon.php";
        </script>
    <?php
        exit();
    }
    $ten = "/^[a-zA-Z'-'\sáàảãạăâắằấầặẵẫậéèẻ ẽẹếềểễệóòỏõọôốồổỗộ ơớờởỡợíìỉĩịđùúủũụưứ� �ửữựÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠ ƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼ� ��ỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]*$/";
    if (preg_match($ten, isset($_POST['name']) ? $_POST['name'] : '')) {
        $data['TenMonHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    } else {
    ?>
        <script type="text/javascript">
            alert("Thêm môn học không hợp lệ");
            window.location = "themmon.php";
        </script>
    <?php
        exit();
    }
    $sotiethoc = "/^[0-9]{1,}$/";
    if (preg_match($sotiethoc, isset($_POST['tiet']) ? $_POST['tiet'] : '')) {
        $data['SoTiet'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    } else {
    ?>
        <script type="text/javascript">
            alert("Số tiết không hợp lệ");
            window.location = "themmon.php";
        </script>
    <?php
        exit();
    }
    $heso = "/^[1-2]{1}$/";
    if (preg_match($heso, isset($_POST['so']) ? $_POST['so'] : '')) {
        $data['HeSoMonHoc'] = isset($_POST['so']) ? $_POST['so'] : '';
    } else {
    ?>
        <script type="text/javascript">
            alert("Hệ số môn học không hợp lệ");
            window.location = "themmon.php";
        </script>
    <?php
        exit();
    }

    // Validate thong tin
    $errors = array();
    if (empty($data['MaMonHoc'])) {
        $errors['MaMonHoc'] = 'Chưa nhập mã môn học';
    }

    if (empty($data['TenMonHoc'])) {
        $errors['TenMonHoc'] = 'Chưa nhập tên môn học';
    }
    if (empty($data['SoTiet'])) {
        $errors['SoTiet'] = 'Chưa nhập số tiết';
    }
    if (empty($data['HeSoMonHoc'])) {
        $errors['HeSoMonHoc'] = 'Chưa nhập hệ số môn';
    }
    // Neu ko co loi thi insert
    if (!$errors) {
        $mon = $con->add($data['MaMonHoc'], $data['TenMonHoc'], $data['SoTiet'], $data['HeSoMonHoc']);
        // Trở về trang danh sách
    ?>
        <script type="text/javascript">
            alert("Đã Thêm Môn Học Thành Công");
        </script>
<?php
        header("location:../index.php?mod=mh");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
    <h1>Thêm Môn Học </h1>
    <form method="post" action="themmon.php">
        <table class="table">
            <div class="input-group mb-3">
                <span class="input-group-text">Mã Môn Học</span>
                <input class="form-control" type="text" name="ma" value="<?php echo !empty($data['MaMonHoc']) ? $data['MaMonHoc'] : ''; ?>" placeholder="Tối đa 2 kí tự, là chữ cái viết tắt của môn" />
                <?php if (!empty($errors['MaMonHoc'])) echo $errors['MaMonHoc']; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Tên Môn Học</span>
                <input class="form-control" type="text" name="name" value="<?php echo !empty($data['TenMonHoc']) ? $data['TenMonHoc'] : ''; ?>" />
                <?php if (!empty($errors['TenMonHoc'])) echo $errors['TenMonHoc']; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Số Tiết</span>
                <input class="form-control" type="text" name="tiet" value="<?php echo !empty($data['SoTiet']) ? $data['SoTiet'] : ''; ?>" placeholder="Số tiết là số nguyên" />
                <?php if (!empty($errors['SoTiet'])) echo $errors['SoTiet']; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Hệ Số Môn Học</span>
                <input class="form-control" type="text" name="so" value="<?php echo !empty($data['HeSoMonHoc']) ? $data['HeSoMonHoc'] : ''; ?>" placeholder="Hệ số 1 hoặc 2" />
                <?php if (!empty($errors['HeSoMonHoc'])) echo $errors['HeSoMonHoc']; ?>
            </div>
            <button class="btn btn-primary" type="submit" name="add_mon">Thêm môn học</button>
        </table>
    </form>
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