<?php


?>
<?php
include "header.php";
include "../user/connection.php";
?><div id="content">
<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"><a href="demo.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
        Stock Management</a></div>
</div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<div class="container-fluid">

    <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
    <div class="span12">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
      <h5>Stock</h5>
    </div>
    <div class="widget-content nopadding">

    
  </div>
  <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Company</th>
              <th>Product Name</th>
              <th>Product unit</th>
              <th>Product Qty</th>
              <th>Product Selling price</th>
              <th>Edit</th>
            
            </tr>
          </thead>
          <tbody>
            <?php
            $count=0;
            $res=mysqli_query($link, "select * from stock_master");
            while($row=mysqli_fetch_array($res)){
                $count=$count+1;
              ?>
              <tr>
              <td><?php echo $count;?> </td>
              <td><?php echo $row["product_company"]?></td>
              <td><?php echo $row["product_name"]?></td>
              <td><?php echo $row["product_unit"]?></td>
              <td><?php echo $row["product_qty"]?></td>
              <td><?php echo $row["product_selling_price"]?></td>
              
              <td><center><button class="btn btn-primary"><a style="text-decoration:none; color:white" href="edit_stock master.php?id=<?php echo $row["id"]; ?>">Edit</a></button></center></td>

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

<!--end-main-container-part-->

<?php
include "footer.php";
?>