<?php
include "header.php";
include "../user/connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Party Management</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5> Parties</h5>
        </div>
        
        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Business Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                  
                  
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link, "select * from party_info");
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <tr>
                  <td><?php echo $row["firstname"]?></td>
                  <td><?php echo $row["lastname"]?></td>
                  <td><?php echo $row["businessname"]?></td>
                  <td><?php echo $row["contact"]?></td>
                  <td><?php echo $row["address"]?></td>
                  <td><?php echo $row["city"]?></td> 


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
    
      mysqli_query($link,"insert into party_info values(NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[businessname]','$_POST[contact]','$_POST[address]','$_POST[city]')") or die(mysqli_error($link));
      ?>
      <script type="text/javascript">
        
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location = "add_new_party.php";
        }, 2000);
        
      </script>
      <?php
    
}
?>
<!--end-main-container-part-->

<?php
include "footer.php";
?>

