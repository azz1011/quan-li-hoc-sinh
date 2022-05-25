<html lang="en">


<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body-container">
    <?php
    require "../../classes/DB.class.php";
    $connect = new db();
    $conn = $connect->connect();
    ?>

    <h1 style="font-weight: bold"> QUẢN LÝ NGƯỜI DÙNG</h1>
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Tên Đăng Nhập</th>
            <th>Phân quyền</th>
            <th>Tác vụ</td>
        </tr>
        <?php
        $stt = 1;
        $sql = "SELECT * FROM user";
        $query = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
            <tr>
                <td> <?php echo $stt++ ?> </td>
                <?php echo "<td>$data[username]</td>"  ?>
                <?php
                if ($data["level"] == 1) {
                    echo "<td>Quản trị viên</td>";
                } elseif ($data["level"] == 2) {
                    echo "<td>Giáo viên</td>";
                }
                ?>
                <td>
                    <button class="btn btn-danger"><a href="xoauser.php?id=<?php echo $data["username"]; ?>">
                            Xóa </a></button>

                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</html>

<style>
    .body-container {
        margin: 5% 30%;
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