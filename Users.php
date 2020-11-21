<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">

<?php
 $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
 //check connection
 if(!$conn){
     $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
     echo $temp;
 }
 //SQL Stmt
 $sql= "Select * from user";
 $result= mysqli_query($conn,$sql);
 $userdetails=mysqli_fetch_all($result,MYSQLI_ASSOC);
 mysqli_close($conn);
?>

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