<?php
require 'config.php';
$cat_id = $_GET['cat_id'];
$del_sql = "DELETE FROM categories WHERE cat_id = '{$cat_id}'";
$res = mysqli_query($con,$del_sql);
if($res){
    echo "<script>window.location.href='http://localhost:82/ebookpro/admin/category.php';</script>";
}
?>