<?php
define('ROOT', dirname(__FILE__));
include "../includes/function.php";
session_start();
if ($_SESSION['ses_level'] != 1) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/ico/ico.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quản trị</title>
</head>

<body>
    <div class="bg-warning py-2">
    </div>

    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Academy</a>
            <div class="collapse navbar-collapse" id="main_nav">
            </div>
        </div>
    </nav>
    <div class="modal-body row">

        <!-- left workplace -->
        <div class="col-md-2 container border border-2" id="left-panel" style="height: 40em;">
            <div class="left-title">
                <h5>Công cụ Admin</h5>
            </div>
            <div class="left-panel-item"><a href="index.php?mod=hs">Quản Lý Học Sinh</a></div>
            <div class="left-panel-item"><a href="index.php?mod=gv">Quản Lý Giáo Viên</a></div>
            <div class="left-panel-item"><a href="index.php?mod=mh">Quản Lý Môn Học</a></div>
            <div class="left-panel-item"><a href="index.php?mod=diem">Quản Lý Điểm</a></div>
            <div class="left-panel-item"><a href="index.php?mod=hk">Quản Lý Học Kỳ</a></div>
            <div class="left-panel-item"><a href="index.php?mod=lop">Quản Lý Lớp</a></div>
            <div class="left-panel-item"><a href="index.php?mod=day">Quản Lý Phân công</a></div>
            <div class="left-panel-item"><a href="index.php?mod=capnhat">Cài Đặt</a></div>
            <div class="left-panel-item"><a href="index.php?mod=dangxuat">Đăng Xuất</a></div>
        </div>

        <!-- right workplace -->
        <div class="col-md-10 border border-2 p-3">
            <?php include "mod.php"; ?>
        </div>
    </div>

</body>

</html>

<style>
    body {
        padding: 0 4em;
    }

    #left-panel {
        background-color: rgb(247, 247, 247);
        padding: 1em 0;
        margin: 0;
    }

    .mhs {
        text-align: center;
    }

    .left-panel-item {
        color: #0d6efd;
        padding: 0.5em;
        border: 1px solid rgb(183, 183, 183);
    }

    .left-panel-item:hover {
        background-color: rgb(212, 212, 212);
        cursor: pointer;
    }

    a {
        text-decoration: none;
    }

    .left-title {
        text-align: center;
    }
</style>