<?php
session_start();
$sessionid = $_GET["session_id"];
$b= array("company_name" =>"","product_name" =>"", "unit" =>"", "packing_size" =>"","price" =>"", "qty" =>"");
$_SESSION["cart"][$sessionid]=$b;
?>