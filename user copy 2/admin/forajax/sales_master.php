<!-- Have to change the existing code watching video 23 8.47 to 10-->
<!--23 video 23 5.20 fetching data-->
<?php
session_start();
include "header.php";
include "../user/connection.php";
$bill_id = 0;
$res= mysqli_query($link, "select * from billing_header order by id desc limit 1"); 
while($row= mysqli_fetch_array($res)){
  $bill_id = $row['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--add ths to existing code to show refresh icon-->
</head>
<body>
 
</body>
<!--bill number after the date video 23 3.56-->
<div class="span2">
  <br>
  <div>
    <label>Bill No</label>
    <input type="text" class="span12" name="bill_no" value="<?php echo generate_bill_no($bill_id) //the function is below 23 video 8.29?>" readonly>

  </div>
</div>






<!--Load billing function 20 video-->
<!--call the function if else of varxmlhttp-->
<script>
  function load_billing_products(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        document.getElementbyId("bill_products").innerHTML = xmlhttp.responseText;
        load_total(); //Below function called 9.11
      }
    };
    xmlhttp.open("GET", "forajax/load_billing_products.php", true);
    xmlhttp.send();

  }
  load_billing_products()

</script>
<!--load total bill 20 video 8.24-->
<script>
  function load_total(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        document.getElementbyId("total_bill").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "forajax/load_billing_amount.php", true);
    xmlhttp.send();

  }
</script>
<!--edit qty 21 video 5.40-->
<script>
 function edit_qty(qty1, company_name1, product_name1, unit1, packing_size1, price1){
  var product_company = company_name1;
  var product_name = product_name1;
  var unit = unit1;
  var packing_size = packing_size1;
  var price = price1;
  var qty = qty1;
  var total = eval(price) * eval(qty);

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
    if(xmlhttp.responseText == ""){
      load_billing_products();
      alert("product added successfully");
    }
    else{
      load_billing_products();
      alert("xmlhttp.responseText");
    }
  }
 } ;
xmlhttp.open("GET", "forajax/update_in_session.php?company_name="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"$price="+price+"&qty="+qty+"&total="+total, true);
xmlhttp.send();
}
</script>
<!--delete qty 22 video-->
<script>
  function delete_qty(sessionid){
  

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function(){
  if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
    if(xmlhttp.responseText == ""){
      load_billing_products();
      alert("product added successfully");
    }
    else{
      load_billing_products();
      alert("xmlhttp.responseText");
    }
  }
 } ;
xmlhttp.open("GET", "forajax/delete_in_session.php?sessionid="+sessionid, true);
xmlhttp.send();
}
</script>

<!--video 23 5.43 generate bill no function this called in above value-->
<?php
function generate_bill_no($id){
  if($id==""){

    $id1= 0;

  }
  else{
    $id1 = $id;
  }
  $id1= $id1+1;
  $len= strlen($id1);

  if($len = "1"){
    $id1= "0000".$id1;
  }
  if($len = "2"){
    $id1= "000".$id1;
  }
  if($len = "3"){
    $id1= "00".$id1;
  }
  if($len = "4"){
    $id1= "0".$id1;
  }
  if($len = "5"){
    $id1= $id1;
  }

  return $id1;

}

//after the changings in video 23 8.47 to 10
if(isset($_POST['submit'])){
  $lastbillno=0;
  mysqli_query($link,"insert into billing_header values(NULL, '$_POST[full_name]','$_POST[bill_type_header]','$_POST[bill_date]','$_POST[bill_no]')") or die (mysqli_error($link));

  $res= mysqli_query($link, "select * from billing_header order by id desc limit 1");
  while($row= mysqli_fetch_array($res)){
    $lastbillno=$row["id"];
  }
  $max= sizeof($_SESSION['cart']) ;
  for($i=0; $i<$max; $i++){
    $company_name_session="";
    $product_name_session="";
    $unit_session="";
    $packing_size_session="";
    $price_session="";
  
    if(isset($_SESSION['cart'][$i])){
  
      foreach($_SESSION['cart'][$i] as $key => $val){
        if($key == "company_name"){
          $company_name_session= $val;
        }
        else if($key == "product_name"){
          $product_name_session= $val;
        }
        else if($key == "unit"){
          $unit_session= $val;
        }
        else if($key == "packing_size"){
          $packing_size_session= $val;
        }
        else if($key == "qty"){
          $qty_session= $val;
        }
        else if($key == "price"){
          $price_session= $val;
        }
  
      }
      if($company_name_session!=""){
         mysqli_query($link,"insert into billing_details values(NULL,'$lastbillno','$company_name_session','$product_name_session',' $unit_session','$packing_size_session','$price_session','$qty_session')") or die(mysqli_error($link));
         //dicrease the quantity 24 video
         mysqli_query($link,"update stock_master set product_qty = product_qty-$qty_session where product_company='$company_name_session' && product_name='$product_name_session' &&product_unit='$unit_session'");
  }
}
  }
  unset($_SESSION['cart']);
  ?>
  <script type="text/javascript">
    alert("bill generated successfully");
    window.location.href=window.location.href;


  </script>
  <?php
}
?>
</html>