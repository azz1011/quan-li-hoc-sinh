<?php
require "../classes/day.class.php";
$con = new day();
$day = $con->allday();
?>
<script type="text/javascript">
    function XacNhan() {
        if (!window.confirm('Bạn có chắc không?')) {
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Phân Công Dạy</h1>
    <a href="day/themday.php"><button class='btn btn-primary'>Phân công</button></a>
    <table class="table table-striped">
        <tr>
            <td>Mã Lịch Dạy</td>
            <td>Mã Môn Học</td>
            <td>Mã Giáo Viên</td>
            <td>Mã Lớp Học</td>
            <td>Mã Học Kỳ</td>
            <td>Mô tả</td>
            <td>Sửa</td>
            <td></td>
        </tr>
        <?php foreach ($day as $item) { ?>
            <tr>
                <td><?php echo $item['MaDayHoc']; ?></td>
                <td><?php echo $item['MaMonHoc']; ?></td>
                <td><?php echo $item['Magv']; ?></td>
                <td><?php echo $item['MaLopHoc']; ?></td>
                <td><?php echo $item['MaHocKy']; ?></td>
                <td><?php echo $item['MoTaPhanCong']; ?></td>
                <td><?php echo "<a href='#?id=$item[MaMonHoc]'><button class='btn btn-success' type='button'>Sửa</button></a>"; ?></td>
                <td> <?php echo "<a href='day/xoaday.php?id=$item[MaDayHoc]' onclick='return XacNhan();'><button class='btn btn-danger' type='button'>Xóa</button></a>"; ?>
                </td>
            </tr>
        <?php } ?>
        <br />
    </table>