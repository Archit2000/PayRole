<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">


<?php
error_reporting(0);
if(isset($_POST['ADD'])){
    if($_POST['CATEGORY']=='Bonus'){
        $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
        //check connection
        if(!$conn){
            $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
            echo $temp;
        }
        //SQL Stmt
        $sql = "call transactionGenerator($_POST[USERID],$_POST[AMOUNT],'Bonus')";
        $result= mysqli_query($conn,$sql);
        mysqli_close($conn);
    }
    else if($_POST['CATEGORY']=='Allowance'){
        $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
        //check connection
        if(!$conn){
            $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
            echo $temp;
        }
        //SQL Stmt
        $sql = "call transactionGenerator($_POST[USERID],$_POST[AMOUNT],'Allowance')";
        $result= mysqli_query($conn,$sql);
        mysqli_close($conn);       
    }
    else{
        $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
        //check connection
        if(!$conn){
            $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
            echo $temp;
        }
        //SQL Stmt
        $sql = "call monthlySalAll()";
        $result= mysqli_query($conn,$sql);
        mysqli_close($conn); 
    }
}
?>
<?php
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

<form class="needs-validation pt-4" action="Create-Transaction.php" method="POST" novalidate>
  <div class="form-group row">
    <div class="col">
      <label for="validationTooltip01">Employee ID</label>
      <input type="text" class="form-control" name="USERID">
    </div>
    <div class="col">
      <label for="validationTooltip02">Amount</label>
      <input type="text" class="form-control" name="AMOUNT">
    </div>  
    <div class="col">
        <label for="validationTooltip02">Category</label>
        <select class="form-control" name="CATEGORY">
            <option>Monthly Salary</option>
            <option>Bonus</option>
            <option>Allowance</option>
        </select>
    </div>
    <div class="col">
        <button class="btn btn-primary mt-4 btn-block" name="ADD" type="submit">Submit</button>
    </div>
  </div>
  
</form>


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