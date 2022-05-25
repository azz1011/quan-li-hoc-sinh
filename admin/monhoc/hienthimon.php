<?php
require "../classes/monhoc.class.php";
$con = new monhoc();
$mon = $con->allmon();
?>
<script type="text/javascript">
    function XacNhan() {
        if (!window.confirm('Bạn Có Chắc Muốn Xóa Môn Này Không?')) {
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>

<head>
    <title>Danh sách Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Danh sách Môn Học</h1>
    <h3><a href="monhoc/themmon.php"><button class="btn btn-primary">Thêm Môn Học</button></a></h3>
    <table class="table">
        <tr>
            <td>Mã Môn Học</td>
            <td>Tên Môn Học</td>
            <td>Số Tiết</td>
            <td>Hệ Số Môn Học</td>
            <td>Tác vụ</td>
            <td></td>
        </tr>
        <?php foreach ($mon as $item) { ?>
            <tr>
                <td><?php echo $item['MaMonHoc']; ?></td>
                <td><?php echo $item['TenMonHoc']; ?></td>
                <td><?php echo $item['SoTiet']; ?></td>
                <td><?php echo $item['HeSoMonHoc']; ?></td>
                <td><?php echo "<a href='monhoc/suamon.php?id=$item[MaMonHoc]'><button class='btn btn-success' type='button'>Sửa</button></a>"; ?>
                    <?php echo "<a href='monhoc/xoamon.php?id=$item[MaMonHoc]' onclick='return XacNhan();'><button class='btn btn-danger' type='button'>Xóa</button></a>"; ?>
                </td>
            </tr>
        <?php } ?>
    </table>