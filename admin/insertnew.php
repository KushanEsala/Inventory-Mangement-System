<?php
include "../../user/connection.php";
$company_name=$_GET["company_name"];
$product_name=$_GET["product_name"];
$unit=$_GET["unit"];
$packing_size=$_GET["packing_size"];
$price=$_GET["price"];
$qty=$_GET["qty"];
$total=$_GET["total"];

$res=mysqli_query($link,"select * from stock where product_company='$company_name' && product_name='$product_name' && unit='$unit' && packing_size='$packing_size'&& ' && price='$price' && ' && qty='$qty' && ' && total='$total'");
while($row=mysqli_fetch_array($res))
{
    echo $row["company_name"];
    echo $row["product_name"];
    echo $row["unit"];
    echo $row["packing_size"];
    echo $row["price"];
    echo $row["total"];
    
}

?>