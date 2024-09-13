<?php
include "header.php";
include "../user/connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Company Management</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new company</h5>
        </div>
        <div class="widget-content nopadding">
          <form  name="form1" action="#" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Company name" name="companyname" required/>
              </div>
            </div>
            
            
            

            <div class="alert alert-danger" id="error" style="display:none;">
                This Company Already Exist! Please try Another.
            </div>
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>
            <div class="alert alert-success" id="success" style="display:none;">
                Record inserted successfully!
            </div>
          </form>
        </div>
        
      </div>
      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $res=mysqli_query($link, "select * from company_name");
                while($row=mysqli_fetch_array($res)){
                  ?>
                  <tr>
                  <td><?php echo $row["id"]?></td>
                  <td><?php echo $row["company_name"]?></td>
                  
                  <td><center><button class="btn btn-primary"><a style="text-decoration:none; color:white" href="edit_company.php?id=<?php echo $row["id"]; ?>">Edit</a></button></center></td>
                  <td><center><button class="btn btn-danger"><a style="text-decoration:none; color:white"  href="delete_company.php?id=<?php echo $row["id"]; ?>" onclick="showAlert()">Delete</a></button></center></td>
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
    $res=mysqli_query($link, "select * from company_name where company_name='$_POST[company_name]'");
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
      mysqli_query($link,"insert into company_name values(NULL,'$_POST[companyname]')") or die(mysqli_error($link));
      ?>
      <script type="text/javascript">
        document.getElementById("error").style.display="none";
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location = "add_company.php";
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