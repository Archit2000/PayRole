<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">



<?php
error_reporting(0);
if(isset($_POST['refresh'])){
    if($_POST['u_id']!=NULL){
        $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
        //check connection
        if(!$conn){
            $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
            echo $temp;
        }
        $sql = "Select * from transaction where user_id= $_POST[u_id]";
        $result= mysqli_query($conn,$sql);
        $transaction= mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($conn);

    }
}
?>

<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form action="Check-Transaction.php" method="POST">
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
      <th scope="col">Transaction_ID</th>
      <th scope="col">Date</th>
      <th scope="col">User_ID</th>
      <th scope="col">Amount</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($transaction as $transactionofuser){ 
        $color='';
        if($transactionofuser['type']=='Bonus'){
            $color="bg-warning text-dark";
        }
        else if($transactionofuser['type']=='Allowance'){
          $color = 'bg-success text-white';
        }
        ?>
        <tr  class="<?php echo $color; ?>"> 
        <th scope="row"><?php echo $transactionofuser['transaction_id'];?></th>
        <td><?php echo $transactionofuser['transaction_date'];?></td>
        <td><?php echo $transactionofuser['user_id'];?></td>
        <td><?php echo $transactionofuser['amount'];?></td>
        <td><?php echo $transactionofuser['type'];?></td>
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