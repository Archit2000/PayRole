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
  $sql = "Select * from user where u_id= $_SESSION[curUserID]";
  $result= mysqli_query($conn,$sql);
  $curUser= mysqli_fetch_assoc($result);
  mysqli_close($conn);
?>
<?php
$conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
//check connection
if(!$conn){
    $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
    echo $temp;
}
$sql ="Select * from attendancerecord where u_id= $_SESSION[curUserID]";
$result= mysqli_query($conn,$sql);
$curAttendance= mysqli_fetch_assoc($result);
mysqli_close($conn);
?>
<?php
 $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
 //check connection
 if(!$conn){
     $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
     echo $temp;
 }
 //SQL Stmt
 $sql= "Select * from transaction where user_id=$_SESSION[curUserID]  order by transaction_id desc limit 10";
 $result= mysqli_query($conn,$sql);
 $userdetails=mysqli_fetch_all($result,MYSQLI_ASSOC);
 mysqli_close($conn);
?>
<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" readonly name="u_id" class="form-control" value="<?php echo $curUser['u_id'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['DOB'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['contact'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['address'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOJ</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['DOJ'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOL</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['DOL'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['Salary'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['Designation'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $curUser['Password'] ?>">
                </div>
            </div>
        </form>
    </div>
    <div class="col">
        <table class="table table-striped table-hover table-sm mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">U_ID</th>
                <th scope="col">Total Leave</th>
                <th scope="col">Unpaid Leave</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $color='';
                    if ($curAttendance['unPaidLeave']+$curAttendance['totalLeave']>=45) {
                        $color="bg-danger text-white";
                    }
                    else if($curAttendance['unPaidLeave']>0){
                        $color="bg-warning text-dark";
                    }
                    else if($curAttendance['totalLeave']>31){
                        $color="bg-info text-white";
                    }
                    ?>
                    <tr  class="<?php echo $color; ?>"> 
                    <th scope="row"><?php echo $curAttendance['u_id'];?></th>
                    <td><?php echo $curAttendance['totalLeave'];?></td>
                    <td><?php echo $curAttendance['unPaidLeave'];?></td>
                    </tr>
            </tbody>
        </table>
        <table class="table table-striped table-hover table-sm mt-3">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Transaction_ID</th>
                <th scope="col">Date</th>
                <th scope="col">User_ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($userdetails as $userdetail){ 
                        $color='';
                        if($userdetail['type']=='Bonus'){
                            $color="bg-warning text-dark";
                        }
                        else if($userdetail['type']=='Allowance'){
                        $color = 'bg-success text-white';
                        }
                        ?>
                        <tr  class="<?php echo $color; ?>"> 
                        <th scope="row"><?php echo $userdetail['transaction_id'];?></th>
                        <td><?php echo $userdetail['transaction_date'];?></td>
                        <td><?php echo $userdetail['user_id'];?></td>
                        <td><?php echo $userdetail['amount'];?></td>
                        <td><?php echo $userdetail['type'];?></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  </div>
</div>





<!---ender--->
</main>
</div>
</div>
</body>
</html>