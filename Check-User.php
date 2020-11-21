<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">



<?php
error_reporting(0);
$conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
//check connection
if(!$conn){
    $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
    echo $temp;
}
if(isset($_GET['u_id']) && $_GET['u_id']!=0){
  $uid= mysqli_real_escape_string($conn,$_GET['u_id']);
}
  $sql = "Select * from user where u_id= $uid";
  $result= mysqli_query($conn,$sql);
  $userdetail= mysqli_fetch_assoc($result);
  mysqli_close($conn);
  $_SESSION["user_for_update"]=$userdetail;
if(isset($_POST['refresh'])){
  header("Location: Check-User.php?u_id=".$_GET['u_id']);
}
?>

<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form action="Check-User.php" method="GET">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" name="u_id" class="form-control" value="<?php echo $userdetail['u_id'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['DOB'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['contact'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['address'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOJ</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['DOJ'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOL</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['DOL'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['Salary'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['Designation'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $userdetail['Password'] ?>">
                </div>
            </div>
            <button class="btn btn-primary btn-block" name="refresh" type="submit">
              Refresh
            </button> 
        </form>
    </div>
  </div>
</div>

<?php
$_SESSION['u_id']=$userdetail['u_id'];
?>






<!---ender--->
</main>
</div>
</div>
</body>
</html>