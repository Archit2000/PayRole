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
 $sql ="Select attendancerecord.* from attendancerecord INNER join user using(u_id) where user.DOL is NULL ";
 $result= mysqli_query($conn,$sql);
 $transaction= mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_close($conn);

if(isset($_POST['refresh'])){
    if($_POST['u_id']!=NULL){
        $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
        //check connection
        if(!$conn){
            $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
            echo $temp;
        }
        $sql = "call leaveGenerator($_POST[u_id])";
        $result= mysqli_query($conn,$sql);
        mysqli_close($conn);
        echo("<meta http-equiv='refresh' content='1'>");
    }
       
    
}
?>

<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form action="Leave.php" method="POST">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-6">
                <input type="text" name="u_id" class="form-control">
                </div>
                <div class="col-sm-4">
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
      <th scope="col">Total Leave</th>
      <th scope="col">Unpaid Leave</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($transaction as $transactionofuser){ 
        $color='';
        if ($transactionofuser['unPaidLeave']+$transactionofuser['totalLeave']>=60) {
            $color="bg-danger text-white";
        }
        else if($transactionofuser['unPaidLeave']>0 && $transactionofuser['totalLeave']>31){
            $color="bg-warning text-dark";
        }
        else if($transactionofuser['totalLeave']>=40){
            $color="bg-info text-white";
        }
        ?>
        <tr  class="<?php echo $color; ?>"> 
        <th scope="row"><?php echo $transactionofuser['u_id'];?></th>
        <td><?php echo $transactionofuser['totalLeave'];?></td>
        <td><?php echo $transactionofuser['unPaidLeave'];?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>

</div>






<!---ender--->
</main>
</div>
</div>
</body>
</html>