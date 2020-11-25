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
 $sql= "Select max(u_id) from user";
 $result= mysqli_query($conn,$sql);
 $maxuid=mysqli_fetch_assoc($result);
 $errors=array('name'=>'','contact'=>'','address'=>'','designation'=>'','salary'=>'','dob'=>'','password'=>'');
 $date=date("Y/m/d");
 $u_id=$maxuid['max(u_id)']+1;
 if(isset($_POST['submit'])){
    if(empty($_POST['Name'])){$errors['name']='<div class="text-danger" role="alert">Enter Name</div>';}
    if(empty($_POST['Contact'])){$errors['contact']='<div class="text-danger" role="alert">Enter Contact</div>';}
    if(empty($_POST['DOB'])){$errors['dob']='<div class="text-danger" role="alert">Enter DOB</div>';}
    if(empty($_POST['Address'])){$errors['address']='<div class="text-danger" role="alert">Enter Address</div>';}
    if(empty($_POST['Salary'])){$errors['salary']='<div class="text-danger" role="alert">Enter Salary</div>';}
    if(empty($_POST['Designation'])){$errors['designation']='<div class="text-danger" role="alert">Enter Designation</div>';}
    if(empty($_POST['Password1'])){$errors['password']='<div class="text-danger" role="alert">Enter Password</div>';}
    if(empty($_POST['Password2'])){$errors['password']='<div class="text-danger" role="alert">Enter Password</div>';}
    if(!array_filter($errors)){
        //SQL Stmt
        $sql= "insert into user values($u_id,'$_POST[Name]',$_POST[Contact],'$_POST[Address]','$_POST[DOB]','$date',NULL,'$_POST[Designation]',$_POST[Salary],'$_POST[Password1]')";
        if(mysqli_query($conn, $sql)){
            echo('<div class="alert alert-success mt-3" role="alert">Record Added Sussecfully!</div>');
        }
        mysqli_close($conn);
    }
 }
 $conn= mysqli_connect('localhost','archit','Anuja@Daksh','payrole');
 //check connection
 if(!$conn){
     $temp='<div class="text-danger" role="alert">Connection Error: '. mysqli_connect_error().'</div>';
     echo $temp;
 }
 //SQL Stmt
 $sql= "insert into attendancerecord values($u_id,0,0)";
 $result= mysqli_query($conn,$sql);
 mysqli_close($conn);


?>

<?php



?>



<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form action="Add-User.php" method="POST">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="<?php echo $maxuid['max(u_id)']+1;?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="Name">
                <?php echo $errors['name']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="DOB">
                <?php echo $errors['dob']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="Contact">
                <?php echo $errors['contact']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Address"></textarea>
                <?php echo $errors['address']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="Salary">
                <?php echo $errors['salary']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="Designation">
                <?php echo $errors['designation']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password" name="Password1">
                <?php echo $errors['password']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Re-enter Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password" name="Password2">
                <?php echo $errors['password']; ?>
                </div>
            </div>
            <div class="form-group row">
                <button type="submit" name="submit" class="btn btn-primary center">Add Record</button>
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