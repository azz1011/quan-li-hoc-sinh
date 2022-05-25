<?php
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
session_start();
?>

<body>
    <?php
    if (isset($_POST['themdiem'])) {
        $query = "select * from hocsinh";
        $results = mysqli_query($conn, $query);
        for ($i = 1; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
            //if ($row['MaLopHoc'] == $_SESSION['malop']) {
            $ma = $_POST["ma$i"];
            $lop = $_POST["lop$i"];
            $mon = $_POST["mon$i"];
            $hk = $_POST["hk$i"];
            $mieng = $_POST["diem$i"];
            $p1 = $_POST["diem1$i"];
            $p2 = $_POST["diem2$i"];
            $t1 = $_POST["diem3$i"];
            $t2 = $_POST["diem4$i"];
            $d = $_POST["diem5$i"];
            $tb = $_POST["diem6$i"];
            $sql = "insert into diem(MaHocKy,MaMonHoc,MaHS,MaLopHoc,DiemMieng,Diem15Phut1,Diem15Phut2,Diem1Tiet1,Diem1Tiet2,DiemThi,DiemTB )
 							values('" . $hk . "','" . $mon . "','" . $ma . "','" . $lop . "','" . $mieng . "','" . $p1 . "','" . $p2 . "','" . $t1 . "','" . $t2 . "','" . $d . "','" . $tb . "')";
            $results1 = mysqli_query($conn, $sql);
    ?>
            <script type="text/javascript">
                alert("Bạn Đã Cập Nhật Điểm Thành Công")
                window.location = "../qlgv.php?mod=hs";
            </script>
    <?php
        }
    }
    ?>
    <table class="table">
        <tr>
            <td>Mã Học Sinh</td>
            <td>Tên Học Sinh</td>
            <td>Lớp</td>
            <td>Môn Học</td>
            <td>Học Kỳ</td>
            <td>Điểm Miệng</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 1 Tiết</td>
            <td>Điểm 1 Tiết</td>
            <td>Điểm Thi</td>
            <td>Điểm TB</td>
        </tr>
        <?php
        $query = "select * from hocsinh";
        $results = mysqli_query($conn, $query);
        ?>
        <form action="add_diemhs.php " method="post">
            <div>
                <div>
                    <input type="submit" name="themdiem" value="Thêm Điểm" />
                </div>
            </div>
            <hr>
            <?php
            for ($i = 1; $i <= ($row = mysqli_fetch_assoc($results)); $i++) {
                if ($row['MaLopHoc'] == $_SESSION['malop']) {
                    echo "<tr>"; ?>
                    <td><input style="width:90px" type="text" name="ma<?php echo $i; ?>" value="<?php echo "$row[MaHS]"; ?>" readonly="readonly" /></td>
                    <td><input style="width:200px" type="text" name="ten<?php echo $i; ?>" value="<?php echo "$row[TenHS]"; ?>" readonly="readonly" /></td>
                    <td><input style="width:70px" type="text" name="lop<?php echo $i; ?>" value="<?php echo $_SESSION['malop'] ?>" readonly="readonly" /></td>
                    <td><input style="width:90px" type="text" name="mon<?php echo $i; ?>" value="<?php echo $_SESSION['mamon'] ?>" readonly="readonly" /></td>
                    <td><input style="width:100px" type="text" name="hk<?php echo $i; ?>" value="<?php echo $_SESSION['mahk'] ?>" readonly="readonly" /></td>
                    <td><input style="width:100px" type="text" name="diem<?php echo $i; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem1<?php echo $i; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem2<?php echo $i; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem3<?php echo $i; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem4<?php echo $i; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem5<?php echo $i; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem6<?php echo $i; ?>" readonly="readonly" /></td>

                    </tr>
            <?php
                }
            } ?>
        </form>
    </table>
</body>