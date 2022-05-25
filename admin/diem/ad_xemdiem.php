<?php
require '../includes/config.php';
error_reporting(0);
?>
<link rel="stylesheet" type="text/css" href="style.css">
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
    <title>Danh sách học sinh</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Điểm Học Sinh</h1>
    <form action="index.php?mod=diem" method="post">
        <div>
            <h4>Học kì</h4>
            <select name="hk" class="form-select">
                <?php
                $query = "select MaHocKy from hocky";
                $results = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_assoc($results)) {
                    echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
                }
                ?>
            </select>
            <h4>Lớp</h4>
            <select name="lop" class="form-select">
                <?php
                $query2 = "select * from lophoc";
                $results2 = mysqli_query($conn, $query2);
                while ($data2 = mysqli_fetch_assoc($results2)) {
                    echo "<option value='$data2[MaLopHoc]'>$data2[MaLopHoc]</option>";
                }
                ?>
            </select>
            <h4>Môn</h4>
            <select name="mon" class="form-select">
                <?php
                $query3 = "select * from monhoc";
                $results3 = mysqli_query($conn, $query3);
                while ($data3 = mysqli_fetch_assoc($results3)) {
                    echo "<option value='$data3[MaMonHoc]'>$data3[MaMonHoc]</option>";
                }
                ?>
            </select>
            <br>
            <button style="width: 10em;" class="btn btn-primary" type="submit" name="add"> Chọn </button>
        </div>
    </form>

    <hr>

    <form action="ad_xemdiem.php" method="post">

    </form>

    <table class="table">
        <tr class="diem">
            <td>Mã</td>
            <td style="width: 14em;">Tên Học Sinh</td>
            <td>Lớp</td>
            <td>Mã Học Kỳ</td>
            <td>Mã Môn Học</td>
            <td>Miệng</td>
            <td>15'</td>
            <td>15'</td>
            <td>45'</td>
            <td>45'</td>
            <td>Thi</td>
            <td>TB môn</td>
            <td>Tác vụ</td>
        </tr>
        <?php
        ?>
        <?php
        require "../classes/diem.class.php";
        $connect = new diem();
        $students = $connect->alldiem();
        if (isset($_POST['add'])) {
            foreach ($students as $item) {
                if ($_POST['hk'] == $item['MaHocKy'] && $_POST['lop'] == $item['MaLopHoc'] && $_POST['mon'] == $item['MaMonHoc']) {
        ?>
                    <tr>
                        <td><?php echo $item['MaHS']; ?></td>
                        <td><?php echo $item['TenHS']; ?></td>
                        <td><?php echo $item['MaLopHoc']; ?></td>
                        <td><?php echo $item['MaHocKy']; ?></td>
                        <td><?php echo $item['MaMonHoc']; ?></td>
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
                        <td><?php echo round($item['DiemTB'], 1); ?></td>
                        <td><?php echo "<a href='diem/suadiem.php?cma=$item[MaDiem]&tenhs=$item[TenHS]'><button class='btn btn-success' type='button'>Sửa</button></a>"; ?></td>
                        <td><?php echo "<a href='diem/xoadiem.php?cma=$item[MaDiem]' onclick='return XacNhan();'><button class='btn btn-danger' type='button'>Xóa</button></a>"; ?></td>
                    </tr>
        <?php
                }
            }
        }
        //disconnect_db();
        ?>
    </table>

</body>

</html>