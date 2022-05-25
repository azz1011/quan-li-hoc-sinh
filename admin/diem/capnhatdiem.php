<?php
session_start();
$a = $_SESSION['ses_Magv'];
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();

$alert_grade = "Điểm không hợp lệ";

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cập nhật điểm</title>
</head>

<body>
    <br>
    <h1>Cập nhật điểm</h1>
    <form action="capnhatdiem.php" method="post">
        <div class="body-container">
            <label for="day">Danh sách Lớp</label>
            <select name="day" class="form-select">
                <?php
                $query = "select * from day where Magv=$a";
                $results = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_assoc($results)) {
                    echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
                    $_SESSION['malop'] = $data['MaLopHoc'];
                }
                ?>
            </select>
            <label for="mon">Danh sách Môn</label>
            <select name="mon" class="form-select">
                <?php
                $query2 = "select * from giaovien,monhoc where Magv=$a";
                $results2 = mysqli_query($conn, $query2);
                while ($data2 = mysqli_fetch_assoc($results2)) {
                    echo "<option value='$data2[MaMonHoc]'>$data2[TenMonHoc]</option>";
                    $_SESSION['mamon'] = $data2['MaMonHoc'];
                }
                ?>
            </select>
            <label for="hk">Danh sách Lớp</label>
            <select name="hk" class="form-select">
                <?php
                $query3 = "select * from hocky";
                $results3 = mysqli_query($conn, $query3);
                while ($data3 = mysqli_fetch_assoc($results3)) {
                    echo "<option value='$data3[MaHocKy]'>$data3[MaHocKy]</option>";
                    $_SESSION['mahk'] = $data3['MaHocKy'];
                }
                ?>
            </select>
            <br>
            <button type="submit" class="btn btn-primary" name="add">Chọn thông tin</button>
        </div>
    </form>
    <?php
    $dayhoc = $monhoc = $hk = "";
    if (isset($_POST['add'])) {
        $dayhoc = $_POST['day'];
        $monhoc = $_POST['mon'];
        $hk = $_POST['hk'];
        if ($dayhoc && $monhoc && $hk) {
            if (isset($_POST['themdiem'])) {
                $ma2 = $_POST['madiem'];
                $ma = $_POST['ma'];
                $lop = $_POST['lop'];
                $mon = $_POST['mon'];
                $hk = $_POST['hk'];

                $diem = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($diem, $_POST["diem"])) {
                    $mieng = $_POST["diem"];
                } else {
    ?>
                    <script type="text/javascript">
                        alert($alert_grade);
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$p1 = $_POST['diem1'];
                $diem1 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($diem1, $_POST["diem1"])) {
                    $p1 = $_POST["diem1"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert($alert_grade);
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$p2 = $_POST['diem2'];
                $p22 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($p22, $_POST["diem2"])) {
                    $p2 = $_POST["diem2"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert($alert_grade);
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$t1 = $_POST['diem3'];
                $t11 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($t11, $_POST["diem3"])) {
                    $t11 = $_POST["diem3$i"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert($alert_grade);
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$t2 = $_POST['diem4'];
                $t22 = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($t22, $_POST["diem4"])) {
                    $t2 = $_POST["diem4"];
                } else {
                ?>
                    <script type="text/javascript">
                        alert($alert_grade);
                        window.location = "capnhatdiem.php";
                    </script>
                <?php
                    exit();
                }
                //$d = $_POST['diem5'];
                $dt = "/^[0-1-2-3-4-5-6-7-8-9-10]$/";
                if (preg_match($dt, $_POST["diem5"])) {
                    $d = $_POST["diem5"];
                } else {

                ?>
                    <script type="text/javascript">
                        alert($alert_grade);
                        window.location = "capnhatdiem.php";
                    </script>

                <?php
                    exit();
                }
                $tb = $_POST['diem6'];
                $query = "select * from diem";
                $results = mysqli_query($conn, $query);
                for ($i = 1; $i < ($row = mysqli_fetch_assoc($results)); $i++) {
                    $sql = "update diem set 
                            MaHocKy='$hk[$i]',
                            MaMonHoc='$mon[$i]',
                            MaHS='$ma[$i]',
                            MaLopHoc='$lop[$i]',
                            DiemMieng='$mieng[$i]',
                            Diem15Phut1='$p1[$i]',
                            Diem15Phut2='$p2[$i]',
                            Diem1Tiet1='$t1[$i]',
                            Diem1Tiet2='$t2[$i]',
                            DiemThi='$d[$i]',
                            DiemTB='$tb[$i]' 
                            where MaDiem=" . $ma2[$i];
                    $results1 = mysqli_query($conn, $sql);
                ?>
                    <script type="text/javascript">
                        alert("Cập nhật thành công")
                    </script>
        <?php
                    header('location:capnhatdiem2.php');

                    //}
                }
            }
        }
        ?>
        <div id="info-container">
            <table>
                <tr>
                    <td class="info-name"> Lớp </td>
                    <td class="info-space-between"></td>
                    <td> <?php echo $_POST['day'] ?> </td>
                </tr>
                <tr>
                    <td class="info-name"> Môn </td>
                    <td class="info-space-between"></td>
                    <td> <?php echo $_POST['mon'] ?> </td>
                </tr>
                <tr>
                    <td class="info-name"> Học kỳ </td>
                    <td class="info-space-between"></td>
                    <td> <?php echo $_POST['hk'] ?> </td>
                </tr>
                <!-- <div> Mã Giáo Viên <?php echo $_SESSION['ses_Magv'] ?></div> -->
            </table>
        </div>
        <br>
        <table class="table table-striped">
            <tr style="font-weight: bold;">
                <td></td>
                <td>Mã HS</td>
                <td>Tên</td>
                <td>Điểm Miệng</td>
                <td>15 phút</td>
                <td>15 phút</td>
                <td>45 phút</td>
                <td>45 phút</td>
                <td>Điểm Thi</td>
                <td>Điểm Thi</td>
            </tr>
            <?php
            $query = "select * from diem,hocsinh,monhoc WHERE diem.MaHS=hocsinh.MaHS && diem.MaMonHoc=monhoc.MaMonHoc";
            $results = mysqli_query($conn, $query);
            ?>
            <form action="capnhatdiem2.php" method="post">
                <div class="btn-container">
                    <form>
                        <button class="btn btn-primary" type="button" onclick="window.location.href='http://localhost/qld/admin/qlgv.php?mod=hs'">Trở về</button>
                    </form>
                    <button class="btn btn-primary" type="submit" name="themdiem"> Cập nhật </button>
                </div>
                <?php
                for ($i = 1; $i <= ($row = mysqli_fetch_assoc($results)); $i++) {
                    if ($row['MaLopHoc'] == $_POST['day'] && $row['MaMonHoc'] == $_POST['mon'] && $row['MaHocKy'] == $_POST['hk']) {
                ?>
                        <tr>
                            <td><input class="form-control" style="width:100px" type="hidden" name="madiem[]" value="<?php echo "$row[MaDiem]"; ?>" readonly="readonly" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="ma[]" value="<?php echo "$row[MaHS]"; ?>" readonly="readonly" /></td>
                            <td><input class="form-control" style="width:200px" type="text" name="ten[]" value="<?php echo "$row[TenHS]"; ?>" readonly="readonly" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="hk[]" value="<?php echo "$row[MaHocKy]" ?>" readonly="readonly" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="diem[]" value="<?php echo "$row[DiemMieng]"; ?>" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="diem1[]" value="<?php echo "$row[Diem15Phut1]"; ?>" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="diem2[]" value="<?php echo "$row[Diem15Phut2]"; ?>" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="diem3[]" value="<?php echo "$row[Diem1Tiet1]"; ?>" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="diem4[]" value="<?php echo "$row[Diem1Tiet2]"; ?>" /></td>
                            <td><input class="form-control" style="width:100px" type="text" name="diem5[]" value="<?php echo "$row[DiemThi]"; ?>" /></td>
                        </tr>
                <?php
                    }
                } ?>
            </form>
        </table>
    <?php
    }

    ?>
</body>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<style>
    .body-container {
        margin: 2% 30%;
        border: 1px solid black;
        border-radius: 0.4em;
        box-shadow: 5px 5px 10px;
        padding: 1em;
    }

    h1 {
        text-align: center;
    }

    span {
        width: 10em;
    }

    a {
        text-decoration: none;
        color: white;
    }

    #info-container {
        display: flex;
        justify-content: center;
        border-radius: 0.4em;
        box-shadow: 5px 5px 10px;
        margin: 0 30%;
        padding: 1em;
    }

    #info-container table td {
        font-weight: bold;
    }

    .info-name {
        text-align: right;
    }

    .info-space-between {
        width: 2em;
    }

    .btn-container {
        display: flex;
        justify-content: space-evenly;
        margin-bottom: 1em;
    }

    label {
        font-weight: bold;
    }
</style>