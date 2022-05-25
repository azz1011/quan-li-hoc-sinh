<script type="text/javascript">
    function XacNhan() {
        if (!window.confirm('Bạn Có Chắc Muốn Xóa Học Kỳ Này Không!!!')) {
            return false;
        }
    }
</script>
<h1>QUẢN LÝ HỌC KỲ</h1>
<h2><a href="hocki/add_hk.php"><button class="btn btn-primary" type='button'>Thêm Học Kỳ</button> </a></h2>
<table class="table table-striped">
    <tr>
        <td>STT</td>
        <td>Mã Học Kỳ</td>
        <td>Tên Học Kỳ</td>
        <td>Hệ Số Học Kỳ</td>
        <td>Năm Học</td>
        <td>Tác vụ</td>
        <td></td>
    </tr>
    <?php
    require "../classes/hocki.class.php";
    $connection = new hocki();
    $con = $connection->allquery();
    $stt = 0;
    foreach ($con as $row) {
        $stt++;
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$row[MaHocKy]</td>";
        echo "<td>$row[TenHocKy]</td>";
        echo "<td>$row[HeSoHK]</td>";
        echo "<td>$row[NamHoc]</td>";
        echo "<td><a href='hocki/sua_hk.php?cmahk=$row[MaHocKy]'><button class='btn btn-success' type='button'>Sửa</button></a></td>";
        echo "<td><a href='hocki/xoa_hk.php?cmahk=$row[MaHocKy]' onclick='return XacNhan();'><button class='btn btn-danger' type='button'>Xóa</button></a></td>";
        echo "</tr>";
    }
    ?>