<?php
include "header.php";
include "../user/connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Unit Management</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5> Units</h5>
        </div>
       
        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Unit Name</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link, "select * from units");
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <tr>
                  <td><?php echo $row["id"]?></td>
                  <td><?php echo $row["unit"]?></td>
                  
                  <script>
                    function showAlert(){
                      alert('Are you sure you want to delete this record? ');
                      alert('deleted successfully ');

                    }
                  </script>
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
    $res=mysqli_query($link, "select * from units where unit='$_POST[unitname]'");
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
      mysqli_query($link,"insert into units values(NULL,'$_POST[unitname]')") or die(mysqli_error($link));
      ?>
      <script type="text/javascript">
        document.getElementById("error").style.display="none";
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location = "add_new_unit.php";
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