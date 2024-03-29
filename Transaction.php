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
 //SQL Stmt
 $sql= "Select * from transaction order by transaction_id desc";
 $result= mysqli_query($conn,$sql);
 $userdetails=mysqli_fetch_all($result,MYSQLI_ASSOC);
 mysqli_close($conn);
?>

<table class="table table-striped table-hover table-sm mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Transaction_ID</th>
      <th scope="col" class="text-center">Date</th>
      <th scope="col" class="text-center">User_ID</th>
      <th scope="col">Amount</th>
      <th scope="col" class="text-center">Type</th>
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
        <th scope="row" class="text-right" style="width:10px;"><?php echo $userdetail['transaction_id'];?></th>
        <td class="text-center"><?php echo $userdetail['transaction_date'];?></td>
        <td class="text-center"><?php echo $userdetail['user_id'];?></td>
        <td class="text-right" style="width:10px;"><?php echo $userdetail['amount'];?></td>
        <td class="text-center"><?php echo $userdetail['type'];?></td>
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