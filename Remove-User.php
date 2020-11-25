<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">
<?php

error_reporting(0);
  $tempArray;
  $error=array('u_id'=>'');
  if(isset($_POST['Delete'])){
    if($_POST['u_id']==NULL){
      $error['u_id']='<div class="text-danger" role="alert">Enter The User ID!</div>';
    }
    else if($_POST['Name']==NULL){
      $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
      //check connection
      if(!$conn){
          $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
          echo $temp;
      }
      $sql = "Select * from user where u_id=". $_POST['u_id'];
      $result= mysqli_query($conn,$sql);
      $userdetail= mysqli_fetch_assoc($result);
      $tempArray=$userdetail;
      mysqli_close($conn);
    }
    else {
      $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
      //check connection
      if(!$conn){
          $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
          echo $temp;
      }
      $date=date("Y/m/d");
      $sql = "Update user set DOL = curdate() where u_id=" . $_POST['u_id'] . '&& DOL is NULL';
      $result= mysqli_query($conn,$sql);
      $userdetail= mysqli_fetch_assoc($result);
      print_r($userdetail);
      mysqli_close($conn);
    }
  }

?>
<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form action="Remove-User.php" method="POST">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" name="u_id" class="form-control" value="<?php echo $tempArray['u_id'] ;?>">
                <?php echo $error['u_id'];?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" name="Name" value="<?php echo $tempArray['name'] ;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" name="DOB">DOB</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" name="DOB" value="<?php echo $tempArray['DOB'] ;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text"  readonly class="form-control" name="Contact" value="<?php echo $tempArray['contact'] ;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text"  readonly class="form-control" name="Contact" value="<?php echo $tempArray['address'] ;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $tempArray['Salary'] ;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $tempArray['Designation'] ;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" readonly class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $tempArray['Password'] ;?>">
                </div>
            </div>
           <div class="form-group row">
                <button type="submit" readonly class="btn btn-danger center" name="Delete">Delete</button>
            </div>
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