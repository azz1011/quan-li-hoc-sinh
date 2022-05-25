<?php
if (!defined("ROOT")) {
    echo "Không có quyền truy cập";
    exit;
}
$mod = isset($_GET["mod"]) ? $_GET["mod"] : "";
if ($mod == "hs") {
    include ROOT . "/diem/xemdiem_gv.php";
}
if ($mod == "gv") {
    include ROOT . "/xem_gv.php";
}
