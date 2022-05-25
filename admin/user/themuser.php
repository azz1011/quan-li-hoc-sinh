<?php
require_once("../../classes/DB.class.php");
$connect = new DB();
$conn = $connect->connect();
if (isset($_POST["btn_submit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $ten = "/^[a-zA-Z0-9]{6,}$/";
    if (preg_match($ten, $_POST["username"])) {
        $name = $_POST["username"];
    } else {
?>
        <script type="text/javascript">
            alert("Người dùng không hợp lệ");
            window.location = "themuser.php";
        </script>
    <?php
        exit();
    }
    $pass = "/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
    if (preg_match($pass, $_POST['pass'])) {
        $password = $_POST["pass"];
    } else {
    ?>
        <script type="text/javascript">
            alert("Mật khẩu không hợp lệ");
            window.location = "themuser.php";
        </script>
    <?php
        exit();
    }
    $level = $_POST["level"];
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($name == "" || $password == "" || $level == "") {
        echo "Thiếu thông tin";
    } else {
        //thực hiện việc lưu trữ dữ liệu vào db
        $sql = "INSERT INTO user(
    					username,
    					password,
					    level
    					) VALUES (
					    '$name',
					    '$password',
    					'$level'
    					)";
        mysqli_query($conn, $sql);
    ?>
        <script type="text/javascript">
            alert("Đã thêm Admin Thành Công")
            window.location = "../index.php?mod=capnhat"
        </script>
<?php
    }
}
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <body class="body-container">
        <h1>THÊM NGƯỜI DÙNG</h1>
        <form action="themuser.php" method="post">
            <table>
                <div class="input-group mb-3">
                    <span class="input-group-text">Tên đăng nhập</span>
                    <input class="form-control" type="text" id="username" name="username">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Mật khẩu</span>
                    <input class="form-control" type="password" id="pass" name="pass" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Phân quyền</span>
                    <select class="form-select" id="level" name="level">
                        <option value="1">Admin</option>
                        <option value="2">Giáo viên</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit" name="btn_submit">Thêm</button>
            </table>
        </form>
    </body>

</html>

<style>
    .body-container {
        margin: 2% 30%;
    }

    span {
        width: 10em;
    }
</style>