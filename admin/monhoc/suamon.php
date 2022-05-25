<?php
session_start();
require "../../classes/monhoc.class.php";
$con = new monhoc();
$id = $_GET['id'];
if (!empty($_POST['edit_mon'])) {
    // Lay data
    $data['TenMonHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['SoTiet'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    $data['HeSoMonHoc'] = isset($_POST['heso']) ? $_POST['heso'] : '';
    $data['MaMonHoc'] = isset($_POST['id']) ? $_POST['id'] : '';
    $errors = array();
    if (empty($data['TenMonHoc'])) {
        $errors['TenMonHoc'] = 'Chưa nhập tên môn học';
    }

    if (empty($data['SoTiet'])) {
        $errors['SoTiet'] = 'Chưa nhâp số tiết';
    }
    if (empty($data['HeSoMonHoc'])) {
        $errors['HeSoMonHoc'] = 'Nhập hệ số môn học';
    }

    // Neu ko co loi thi insert
    if (!$errors) {
        $mon = $con->edit($data['MaMonHoc'], $data['TenMonHoc'], $data['SoTiet'], $data['HeSoMonHoc']);
        // Trở về trang danh sách
        header("location:../index.php?mod=mh");
    }
}
?>
<?php
$data = $con->selectmon($id);
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
    <h1>Sửa Môn Học </h1>
    <form method="post" action="suamon.php?id=<?php echo $data['MaMonHoc']; ?>">
        <table class="table">
            <div class="input-group mb-3">
                <span class="input-group-text">Tên Môn Học</span>
                <input class="form-control" type="text" name="name" value="<?php echo $data['TenMonHoc']; ?>" />
                <?php if (!empty($errors['TenMonHoc'])) echo $errors['TenMonHoc']; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Số Tiết</span>
                <input class="form-control" type="text" name="tiet" value="<?php echo $data['SoTiet']; ?>" />
                <?php if (!empty($errors['SoTiet'])) echo $errors['SoTiet']; ?>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Hệ Số Môn Học</span>
                <input class="form-control" type="text" name="heso" value="<?php echo $data['HeSoMonHoc']; ?>" />
                <?php if (!empty($errors['HeSoMonHoc'])) echo $errors['HeSoMonHoc']; ?>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['MaMonHoc']; ?>" />
            <button class="btn btn-primary" type="submit" name="edit_mon"> Lưu </button>
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