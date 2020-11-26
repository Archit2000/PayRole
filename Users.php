<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">

<?php
error_reporting(0);
 if(isset($_POST['refresh'])){
  if($_POST['Designation']!=NULL){
      $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
      //check connection
      if(!$conn){
          $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
          echo $temp;
      }
      $sql= "Select * from user where Designation like '%$_POST[Designation]%'";
      if($_POST['curEmployee']==TRUE){
        $sql= "Select * from user where Designation like '%$_POST[Designation]%' && DOL is NULL";
      }
      $result= mysqli_query($conn,$sql);
      $userdetails=mysqli_fetch_all($result,MYSQLI_ASSOC);
      mysqli_close($conn);
  }
  else{
    $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
    //check connection
    if(!$conn){
        $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
        echo $temp;
    }
    $sql= "Select * from user";
    if($_POST['curEmployee']==TRUE){
      $sql= "Select * from user where DOL is NULL";
    }
    $result= mysqli_query($conn,$sql);
    $userdetails=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_close($conn);   
  }
}
else {
  $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
      //check connection
      if(!$conn){
          $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
          echo $temp;
      }
      $sql= "Select * from user";
      $result= mysqli_query($conn,$sql);
      $userdetails=mysqli_fetch_all($result,MYSQLI_ASSOC);
      mysqli_close($conn);
}

?>

<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form action="Users.php" method="POST">
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Designation</label>
                <div class="col-sm-2">
                <input type="text" name="Designation" class="form-control">
                </div>
                <div class="custom-control custom-switch mt-2">
                  <input type="checkbox" class="custom-control-input" id="customSwitch1" name="curEmployee">
                  <label class="custom-control-label" for="customSwitch1">Current Employees only</label>
                </div>
                <div class="col-sm">
                <button class="btn btn-primary btn-block" name="refresh" type="submit">
                    Refresh
                </button> 
                </div>
            </div>
        </form>
    </div>
  </div>
<table class="table table-striped table-hover table-sm mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">U_ID</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Address</th>
      <th scope="col">DOB</th>
      <th scope="col">DOJ</th>
      <th scope="col">DOL</th>
      <th scope="col">Designation</th>
      <th scope="col">Salary</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($userdetails as $userdetail){ ?>
        <tr> 
        <th scope="row">
            <a class="text-dark" href="Check-User.php?u_id=<?php echo $userdetail['u_id'];?>">
                <?php echo $userdetail['u_id']?>
            </a>
        </th>
        <td><?php echo $userdetail['name']?></td>
        <td><?php echo $userdetail['contact']?></td>
        <td style="max-width:20vw;"><?php echo $userdetail['address']?></td>
        <td><?php echo $userdetail['DOB']?></td>
        <td><?php echo $userdetail['DOJ']?></td>
        <td><?php echo $userdetail['DOL']?></td>
        <td><?php echo $userdetail['Designation']?></td>
        <td><?php echo $userdetail['Salary']?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>


<!---ender--->
</main>
</div>
</div>
</body>
</html>