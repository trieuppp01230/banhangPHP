<?php 
include "./config/database.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nhóm 9 Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="template/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="template/admin/css/uniform.css" />
    <link rel="stylesheet" href="template/admin/css/select2.css" />
    <link rel="stylesheet" href="template/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="template/admin/css/matrix-media.css" />
    <link href="template/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="dashboard.php">Dashboard</a></h1>
    </div>
    <!--close-Header-part-->

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                    data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span
                        class="text"><?php echo $_SESSION['username']; ?></span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages"
                    class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span
                        class="label label-important">5</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                    <li class="divider"></li>
                    <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                    <li class="divider"></li>
                    <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                    <li class="divider"></li>
                    <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
                </ul>
            </li>
            <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
            <li class=""><a title="" href="session.php"><i class="icon icon-share-alt"></i> <span
                        class="text">Logout</span></a></li>
        </ul>
    </div>

    <!--start-top-serch-->
    <div id="search">
        <form action="products.php" method="get">
            <input type="text" placeholder="Search here..." name="key" />
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
        </form>
    </div>
    <!--close-top-serch-->

    <!--sidebar-menu-->

    <div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
        <ul>
            <li><a href="dashboard.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

            <li> <a href="products.php"><i class="icon icon-th-list"></i> <span>Products</span></a></li>
            <li> <a href="manufactures.php"><i class="icon icon-th-list"></i> <span>Manufactures</span></a></li>
            <li> <a href="protypes.php"><i class="icon icon-th-list"></i> <span>Protypes</span></a></li>
            <li> <a href="user.php"><i class="icon icon-th-list"></i> <span>User</span></a></li>



        </ul>
    </div>