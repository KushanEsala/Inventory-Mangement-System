<?php
include "header.php";
include "../user/connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="demo.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Product Management</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>All product</h5>
        </div>
       
        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>unit</th>
                  <th>Packing Size</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link, "select * from products");
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <tr>
                  <td><?php echo $row["id"]?></td>
                  <td><?php echo $row["company_name"]?></td>
                  <td><?php echo $row["product_name"]?></td>
                  <td><?php echo $row["unit"]?></td>
                  <td><?php echo $row["packing_size"]?></td>
                  
                 
                </tr>
                  <?php
                }
                ?>
                
              </tbody>
            </table>
          </div>
      
      
    </div>
        </div>

    </div>
</div>
<?php
if(isset($_POST["submit1"])){
    $count=0;
    $res=mysqli_query($link, "select * from products where company_name='$_POST[company_name]'&& product_name='$_POST[product_name]' && unit='$_POST[unit]' && packing_size='$_POST[packing_size]'")or die(mysqli_error($link));
    $count=mysqli_num_rows($res);
    if($count>0){
      ?>
      <script type="text/javascript">
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
        

      </script>
      <?php
    }
    else{
      mysqli_query($link,"insert into products values(NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]')") or die(mysqli_error($link));
      ?>
      <script type="text/javascript">
        document.getElementById("error").style.display="none";
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location = "add_product.php";
        }, 1000);
        
      </script>
      <?php
    }
}
?>
<!--end-main-container-part-->

<?php
include "footer.php";
?>