<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">



<?php
$temp_user=$_SESSION["user_for_update"];
if(isset($_POST['update'])){
  $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
  //check connection
  if(!$conn){
      $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
      echo $temp;
  }
  $sql = "Update user set name ='$_POST[name]', DOB = '$_POST[DOB]', Contact = $_POST[Contact], Address = '$_POST[Address]' , Salary= $_POST[Salary], Designation= '$_POST[Designation]', password='$_POST[Password]'  where u_id= $temp_user[u_id]";
  $result=mysqli_query($conn,$sql);
  mysqli_close($conn);
}
?>

<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" name="u_id" class="form-control" value="<?php echo $temp_user['u_id'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['DOB'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['contact'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['address'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOJ</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['DOJ'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOL</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['DOL'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['Salary'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['Designation'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['Password'] ?>">
                </div>
            </div>
            <button class="btn btn-primary btn-block" style="visibility: hidden !important;">
                Update
            </button> 
        
    </div>
    <div class="col">
        <form action="Update-User.php" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" name="u_id" class="form-control" value="<?php echo $temp_user['u_id'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                <input type="text" name="DOB" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text" name="Contact" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" name="Address" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOJ</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['DOJ'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOL</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $temp_user['DOL'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                <input type="text" name="Salary" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                <input type="text" name="Designation" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="text" name="Password" class="form-control">
                </div>
            </div>
            <button class="btn btn-primary btn-block" name="update" type="submit">
              Update
            </button> 
        </form>
    </div>
  </div>
</div>








<!---ender--->
</main>
</div>
</div>
</body>
</html>