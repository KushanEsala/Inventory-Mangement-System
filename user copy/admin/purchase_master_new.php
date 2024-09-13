<?php
include "header.php";
include "../user/connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="demo.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Purchase Management</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add purchase details</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="form1" action="#" method="post" class="form-horizontal">

            <div class="control-group">
              <label class="control-label">Select Company :</label>
              <div class="controls">
                <select class="span11" name="company_name" id="company_name" onchange="select_company(this.value)" required>
                    <option>Select</option>
                    <?php
                    $res=mysqli_query($link,"select * from company_name");
                    while ($row = mysqli_fetch_array($res)) {
                        echo"<option>";
                        echo $row['company_name'];
                        echo"</option>";

                    }
                    
                    ?>
                    </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Select product Name :</label>
              <div class="controls" id="product_name_div" required>
                <select class="span11">
                    <option>Select</option>
                </select>
              </div>
            </div>  
            
            <div class="control-group">
              <label class="control-label">Select Unit :</label>
              <div class="controls" id="unit_div" required>
                <select class="span11">
                 <option>Select</option>
                 </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Packing Size :</label>
              <div class="controls" id="packing_size_div" required>
              <select class="span11">
                <option>Select</option>
              </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Quentity :</label>
              <div class="controls">
                <input type="text" class="span11"  value="0" name="qty" required/>
              </div>
            </div>  
            
            <div class="control-group">
              <label class="control-label">Enter Price :</label>
              <div class="controls">
                <input type="text" class="span11"  value="0" name="price" required/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Purchase Party :</label>
              <div class="controls" >
              <select class="span11" name="party_name" required>
                <?php
                  $res=mysqli_query($link,"select * from party_info");
                  while($row=mysqli_fetch_array($res)){
                    echo"<option>";
                    echo $row["businessname"];
                    echo"</option>";
                  }
                  
                  ?>
              </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Purchase type :</label>
              <div class="controls" >
              <select class="span11" name="purchase_type" required>
                <option>cash</option>
                <option>debit</option>
              </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Expiry date :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="YYYY-MM-dd"  name="expiry_date" required pattern="\d{4}-\d{2}-\d{2}"/>
              </div>
            </div>
            
            

            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Purchase Now</button>
            </div>
            <div class="alert alert-success" id="success" style="display:none;">
                Purchase inserted successfully!
            </div>
          </form>
        </div>
        
      </div>
      
      
    </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    function select_company(company_name)
    {
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_product_using_company.php?company_name=" + company_name, true);
        xmlhttp.send();

    }

function select_product(product_name,company_name){
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_unit_using_products.php?product_name=" + product_name + "&company_name=" + company_name, true);
        xmlhttp.send();
}

function select_unit(unit,product_name,company_name){
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_packingsize_using_unit.php?unit=" + unit + "&product_name=" +product_name + "&company_name=" + company_name, true);
        xmlhttp.send();



}

</script>
<?php


if(isset($_POST["submit1"])){

  mysqli_query($link,"insert into purchase_master values (NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]','$_POST[qty]','$_POST[price]','$_POST[party_name]','$_POST[purchase_type]','$_POST[expiry_date]')") or die(mysqli_error($link));
  $count=0;
  $res=mysqli_query($link,"select * from stock_master where product_company='$_POST[company_name]' && product_name='$_POST[product_name]'' && product_unit='$_POST[unit]'");
  $count=mysqli_num_rows($res);
  if($count==0){
    mysqli_query($link,"insert into stock_master values (NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[qty]','0')")or die(mysqli_error($link));
  }
    else{
    mysqli_query($link,"update stock_master set product_qty=product_qty+$_POST[qty] where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit_name]'")or die(mysqli_error($link));

      } 



?>
      <script type="text/javascript">
        document.getElementById("error").style.display="none";
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location = "purchase_master.php";
        }, 1000);
        
      </script>

<?php
}
?>

<!--end-main-container-part-->

<?php
include "footer.php";
?>