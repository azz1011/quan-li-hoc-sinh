<?php
session_start();
require "../../classes/lop.class.php";
$con = new lop();
$id = $_GET['id'];
if (!empty($_POST['edit_mon'])) {
    // Lay data
    $data['Tenlophoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['KhoiHoc'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    $data['MaLopHoc'] = isset($_POST['id']) ? $_POST['id'] : '';
    $errors = array();
    if (empty($data['Tenlophoc'])) {
        $errors['Tenlonhoc'] = 'Chưa nhập tên môn học';
    }

    if (empty($data['KhoiHoc'])) {
        $errors['KhoiHocs'] = 'Chưa nhâp số tiết';
    }

    // Neu ko co loi thi insert
    if (!$errors) {
        $lop = $con->sualop($data['MaLopHoc'], $data['Tenlophoc'], $data['KhoiHoc']);
        // Trở về trang danh sách
        header("location:../index.php?mod=lop");
    }
}
?>
<?php
$data = $con->selectlop($id);
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body class="body-container">
    <h1>SỬA LỚP HỌC</h1>
    <form method="post" action="sualop.php?id=<?php echo $data['MaLopHoc']; ?>">
        <table class="table">
            <div class="input-group mb-3">
                <span class="input-group-text">Tên Lớp Học</span>

                <input class="form-control" type="text" name="name" value="<?php echo $data['Tenlophoc']; ?>" />
                <?php if (!empty($errors['Tenlophoc'])) echo $errors['tenlophoc']; ?>

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Khối</span>

                <input class="form-control" type="text" name="tiet" value="<?php echo $data['KhoiHoc']; ?>" />
                <?php if (!empty($errors['KhoiHoc'])) echo $errors['KhoiHoc']; ?>

            </div>

            <div class="input-group mb-3">
                <input type="hidden" name="id" value="<?php echo $data['MaLopHoc']; ?>" />
                <button class="btn btn-primary" type="submit" name="edit_mon"> Sửa lớp học </button>
            </div>
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