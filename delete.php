<?php
require 'config.php';
$id = $_GET['c_id'];
$del_sql = "DELETE FROM customer WHERE c_id = '{$id}'";
$res = mysqli_query($con,$del_sql);
if($res){
    echo "<script>window.location.href='http://localhost:82/ebookpro/admin/dashboard.php';</script>";
}
?>