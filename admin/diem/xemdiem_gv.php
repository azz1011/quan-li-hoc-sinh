<?php
require "../includes/config.php";
error_reporting(0);
?>
<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
    <form action="qlgv.php?mod=hs" method="post">
        <div>
            <label for="hk">Danh sách Học kì</label>
            <select name="hk" class="form-select">
                <?php
                $query = "select MaHocKy from hocky";
                $results = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_assoc($results)) {
                    echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
                }
                ?>
            </select>
            <label for="lop">Danh sách Lớp</label>
            <select name="lop" class="form-select">
                <?php
                $query2 = "select * from lophoc";
                $results2 = mysqli_query($conn, $query2);
                while ($data2 = mysqli_fetch_assoc($results2)) {
                    echo "<option value='$data2[MaLopHoc]'>$data2[MaLopHoc]</option>";
                }
                ?>
            </select>
            <label for="mon">Danh sách Môn</label>
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
            <button style="width: 12em; margin: 0 40%;" class="btn btn-primary" name="add" type="submit">Chọn</button>
            <button class="btn btn-primary" name="xuatdiem" type="submit">Xuất điểm</button>

        </div>
    </form>
    <form action="xemdiem_gv.php" method="post">
        </h2>
        <table class="table table-striped">
            <thead>
                <tr class="diem">
                    <td>Mã HS</td>
                    <td>Họ tên</td>
                    <td>Mã Lớp</td>
                    <td>Học Kỳ</td>
                    <td>Mã môn</td>
                    <td>Điểm Miệng</td>
                    <td>15 phút</td>
                    <td>15 phút</td>
                    <td>1 tiết</td>
                    <td>1 tiết</td>
                    <td>Điểm Thi</td>
                    <td>TB môn</td>
                </tr>
            </thead>
            <tbody>

                <?php
                ?>
                <?php
                require "../classes/diem.class.php";
                require "D:/school/tools/xampp/htdocs/qld/classesPHPExcel/PHPExcel.php";
                $connect = new diem();
                $students = $connect->alldiem();


                //excel
                $objExcel = new PHPExcel();
                $objExcel->setActiveSheetIndex(0);
                $rowCount = 1;
                $sheet = $objExcel->getActiveSheet()->setTitle($_POST['lop']);

                $sheet->setCellValue('A' . $rowCount, "Mã học sinh");
                $sheet->setCellValue('B' . $rowCount, "Tên");
                $sheet->setCellValue('C' . $rowCount, "Môn");
                $sheet->setCellValue('D' . $rowCount, "Điểm miệng");
                $sheet->setCellValue('E' . $rowCount, "15 phút(1)");
                $sheet->setCellValue('F' . $rowCount, "15 phút(2)");
                $sheet->setCellValue('G' . $rowCount, "45 phút(1)");
                $sheet->setCellValue('H' . $rowCount, "45 phút(2)");
                $sheet->setCellValue('I' . $rowCount, "Điểm thi");
                /////

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
                            </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
            <?php
            if (isset($_POST['xuatdiem'])) {
                $rowCount = 2;
                foreach ($students as $item) {
                    if ($_POST['hk'] == $item['MaHocKy'] && $_POST['lop'] == $item['MaLopHoc'] && $_POST['mon'] == $item['MaMonHoc']) {
                        $sheet->setCellValue('A' . $rowCount, $item['MaHS']);
                        $sheet->setCellValue('B' . $rowCount, $item['TenHS']);
                        $sheet->setCellValue('C' . $rowCount, $item['MaMonHoc']);
                        $sheet->setCellValue('D' . $rowCount, $item['DiemMieng']);
                        $sheet->setCellValue('E' . $rowCount, $item['Diem15Phut1']);
                        $sheet->setCellValue('F' . $rowCount, $item['Diem15Phut2']);
                        $sheet->setCellValue('G' . $rowCount, $item['Diem1Tiet1']);
                        $sheet->setCellValue('H' . $rowCount, $item['Diem1Tiet2']);
                        $sheet->setCellValue('I' . $rowCount, $item['DiemThi']);
                        $rowCount++;
                    }
                }
                $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
                $filename = "$_POST[lop].xlsx";
                $objWriter->save($filename);
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                header('Content-Type: application/vnd.ms-excel');
                return;
            }

            ?>
        </table>
    </form>
</body>

</html>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>