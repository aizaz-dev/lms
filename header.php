<?php

//header.php

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
       
        <link rel="stylesheet" href="./asset/css/styles.css">
<link rel="stylesheet" href="./asset/css/simple-datatables-style.css">
<link rel="stylesheet" href="./asset/css/select2.min.css">
<link rel="stylesheet" href="./asset/css/vanillaSelectBox.css"> 
        <title>Online Library Management System in PHP</title>
        <link rel="canonical" href="">
 
        <!-- Bootstrap core CSS -->
        <!-- <link href="<?php echo base_url(); ?>./asset/css/simple-datatables-style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>./asset/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>./asset/js/font-awesome-5-all.min.js" crossorigin="anonymous"></script> -->
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="" sizes="180x180">
        <link rel="icon" href="" sizes="32x32" type="image/png">
        <link rel="icon" href="" sizes="16x16" type="image/png">
        <link rel="manifest" href="">
        <link rel="mask-icon" href="" color="#7952b3">
        <link rel="icon" href="">
        <meta name="theme-color" content="#7952b3">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>

    <?php 

    if(is_admin_login())
    {

    ?>
        
    <link rel="stylesheet" href="./asset/css/styles.css">
<link rel="stylesheet" href="./asset/css/simple-datatables-style.css">
<link rel="stylesheet" href="./asset/css/select2.min.css">
<link rel="stylesheet" href="./asset/css/vanillaSelectBox.css">
<style>
    /* Small devices (phones, 576px and up) */
    .navbar-nav {
display: flex;
justify-content: flex-end;
align-items: center;
}

.nav-item {
position: relative;
}

.nav-link {
padding: 0.5rem 1rem;
}

.dropdown-menu {
position: absolute;
top: 100%;
left: 0;
z-index: 1000;
display: none;
float: left;
min-width: 10rem;
padding: 0.5rem 0;
margin: 0.125rem 0 0;
font-size: 1rem;
color: #212529;
text-align: left;
list-style: none;
background-color: #fff;
background-clip: padding-box;
border: 1px solid rgba(0,0,0,.15);
border-radius: 0.25rem;
}

.nav-item:hover .dropdown-menu {
display: block;
}

.dropdown-item {
display: block;
padding: 0.25rem 1.5rem;
clear: both;
font-weight: 400;
color: #212529;
text-align: inherit;
white-space: nowrap;
background-color: transparent;
border: 0;
}

.dropdown-item:focus, .dropdown-item:hover {
color: #16181b;
background-color: #f8f9fa;
}

.dropdown-item.active, .dropdown-item:active {
color: #fff;
background-color: #007bff;
}

.dropdown-menu-end {
right: 0;
left: auto;
}

.dropdown-divider {
height: 0;
margin: 0.5rem 0;
overflow: hidden;
border-top: 1px solid #e9ecef;
}
    
@media (min-width: 576px) {
  .navbar-brand {
    margin-right: auto;
  }
  .navbar-collapse {
    position: absolute;
    top: 56px;
    left: 0;
    z-index: 1;
    width: 100%;
    background-color: #343a40;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.175);
    display: none;
  }
  .navbar-nav {
    display: flex;
    flex-direction: column;
  }
  .nav-item {
    margin: 0;
    width: 100%;
    text-align: center;
  }
  .dropdown-menu {
    position: static;
    float: none;
    width: auto;
    margin-top: 0;
    background-color: transparent;
    border: none;
    box-shadow: none;
  }
  .sb-sidenav {
    position: fixed;
    top: 56px;
    left: 0;
    bottom: 0;
    z-index: 1;
    display: none;
    overflow-x: hidden;
    overflow-y: auto;
    transition: transform 0.3s ease-in-out;
    background-color: #343a40;
  }
  .sb-sidenav-show {
    transform: translateX(0);
  }
  #layoutSidenav_content {
    margin-left: 0;
  }
  #sidebarToggle {
    display: block;
  }
}






/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {
  .navbar-collapse {
    display: flex !important;
    flex-basis: auto;
  }
  .navbar-nav {
    flex-direction: row;
  }
  .nav-item {
    margin: 0 0.25rem;
    text-align: left;
  }
  .dropdown-menu {
    position: absolute;
    float: none;
    width: 10rem;
    margin-top: 0;
    background-color: #343a40;
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.175);
  }
  .sb-sidenav {
    display: block;
    width: 225px;
    transform: none;
  }
  #layoutSidenav_content {
    margin-left: 225px;
  }
  #sidebarToggle {
    display: none;
  }
}

</style>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Library System</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">Menu<i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="book.php">Book</a></li>
                        <li><a class="dropdown-item" href="category.php">Category</a></li>
                        <li><a class="dropdown-item" href="user.php">User</a></li>
                        <li><a class="dropdown-item" href="issue_book.php">ReturnBook</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="category.php">Category</a>
                            
                            
                            <a class="nav-link" href="book.php">Book</a>
                            <a class="nav-link" href="user.php">User</a>
                            <a class="nav-link" href="issue_book.php">Return Book</a>
                            <a class="nav-link" href="logout.php">Logout</a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
             
    <?php 
    }
    else
    {

    ?>

    <body>

    	<main>

    		<div class="container py-4">

    			<header class="pb-3 mb-4 border-bottom">
                    <div class="row">
        				<div class="col-md-6">
                            <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                                <span class="fs-4">Library Management System</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <?php 

                            if(is_user_login())
                            {
                            ?>
                            <ul class="list-inline mt-4 float-end">
                                <li class="list-inline-item"><?php echo $_SESSION['user_id']; ?></li>
                                <li class="list-inline-item"><a href="issue_book_details.php">Issue Book</a></li>
                                <li class="list-inline-item"><a href="search_book.php">Browes Book</a></li>
                                <li class="list-inline-item"><a href="profile.php">Profile</a></li>
                                <li class="list-inline-item"><a href="logout.php">Logout</a></li>
                            </ul>
                            <?php 
                            }

                            ?>
                            
                        </div>
                    </div>

    			</header>
    <?php 
    }
    ?>
    			