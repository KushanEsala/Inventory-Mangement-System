<?php
session_start();
include "../../user/connection.php";
$company_name=$_GET["company_name"];
$product_name=$_GET["product_name"];
$unit=$_GET["unit"];
$packing_size=$_GET["packing_size"];
$price=$_GET["price"];
$qty=$_GET["qty"];
$total=$_GET["total"];
 
     $av_qty = 0;
     $exist_qty = 0;
     $exist_qty = 0;
     $exist_qty = $qty;
     $av_qty = check_qty($company_name,$product_name,$unit,$packing_size,$link);

     if($av_qty = $exist_qty){
      $check_product_no_session = check_product_no_session($company_name,$product_name,$unit,$packing_size);
      $b= array("company_name" =>$company_name,"product_name" =>$product_name, "unit" =>$unit, "packing_size" =>$packing_size,"price" =>$price, "qty" => $av_qty);
      $_SESSION['cart']['$check_product_no_session'] = $b;
     }
     else{
      echo "Entered Quantity is not available";
     }


//function check_qty($company_name,$product_name,$unit,$packing_size,$link) {...}
//function check_duplicate_product($company_name,$product_name,$unit,$packing_size) {...}
//function check_the_qty($company_name,$product_name,$unit,$packing_size) {...}
//function check_product_no_session($company_name,$product_name,$unit,$packing_size) {...}

?>






