<?php
if (!defined("ROOT")) {
    echo "Không có quyền truy cập";
    exit;
}
$mod = isset($_GET["mod"]) ? $_GET["mod"] : "";
if ($mod == "hs") {
    include ROOT . "/hocsinh/xemdiem_hs.php";
}
if ($mod == "tt") {
    include ROOT . "/hocsinh_xemthongtin.php";
}
