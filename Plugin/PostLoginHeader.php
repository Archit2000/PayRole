<?php
  if(isset($_POST['logout'])){
    header('Location: index.php');
  }
  if($_SESSION['userid']=='NULL' && $_SESSION['userpassword']=='NULL'){
    header('Location: index.php');
  }
  
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>PayRole</title>
  </head>
  <body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" >
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="Dashboard.php">PayRole</a>
  <ul class="navbar-nav px-3">
    <li class="nav-item">
      <form action="index.php" method="POST">
        <button class="btn btn-dark" name="logout" type="submit">
          Logout
        </button> 
      </form>
    </li>
  </ul>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="Dashboard.php">
              Report 
            </a>
          </li>
          <li class="nav-item">
                <div class="list-group" >
                <a class="list-group-flush nav-link" href="Users.php">Users</a>
                </div>
                <div class="list-group" Style="padding-left:10px;">
                <a class="list-group-flush nav-link" href="Add-User.php">Add User</a>
                </div>
                <div class="list-group" Style="padding-left:10px;">
                <a class="list-group-flush nav-link" href="Check-User.php?u_id=0">Check User</a>
                </div>
                <div class="list-group" Style="padding-left:10px;">
                <a class="list-group-flush nav-link" href="Update-User.php">Update User</a>
                </div>
                <div class="list-group" Style="padding-left:10px;">
                <a class="list-group-flush nav-link" href="Remove-User.php">Remove User</a>
                </div>
          </li>
          <li class="nav-item">
            <div class="nav-link" >Transaction</div>
                <div class="list-group" Style="padding-left:10px;">
                <a class="list-group-flush nav-link" href="#">Create Transaction</a>
                </div>
                <div class="list-group" Style="padding-left:10px;">
                <a class="list-group-flush nav-link" href="#">Check Transaction</a>
                </div>
                <div class="list-group" Style="padding-left:10px;">
                <a class="list-group-flush nav-link" href="#">Update Transaction</a>
                </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Payrole</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Leave</a>
          </li>
        </ul>
<!---
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
        ---->
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        
    
