<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP IMS</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/fullcalendar.css"/>
    <link rel="stylesheet" href="css/matrix-style.css"/>
    <link rel="stylesheet" href="css/matrix-media.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="demo.php" style="color:white; margin-left: 30px; margin-top: 40px">PHP IMS</a>
    </h2>
</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">Welcome User</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <li class="active">
            <a href="dashboard.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
        </li>
        <li>
            <a href="add_new_user.php"><i class="icon icon-user"></i><span> User Management</span></a>
        </li>
        <li>
            <a href="add_new_unit.php"><i class="icon icon-user"></i><span> Unit Management</span></a>
        </li>
        <li>
            <a href="add_new_party.php"><i class="icon icon-user"></i><span> Party Management</span></a>
        </li>
        <li>
            <a href="purchase_master.php"><i class="icon icon-user"></i><span> Purchase Management</span></a>
        </li>
        <li>
            <a href="add_company.php"><i class="icon icon-user"></i><span> Company Management</span></a>
        </li>
        <li>
            <a href="add_product.php"><i class="icon icon-user"></i><span> product Management</span></a>
        </li>
        <li>
            <a href="sales_master.php"><i class="icon icon-user"></i><span> Slaes management</span></a>
        </li>
        <li>
            <a href="stock_master.php"><i class="icon icon-user"></i><span> Stock Management</span></a>
        </li>

        <!-- <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span
                class="label label-important">3</span></a>
            <ul>
                <li><a href="form-common.html">Basic Form</a></li>
                <li><a href="form-validation.html">Form with Validation</a></li>
                <li><a href="form-wizard.html">Form with Wizard</a></li>
            </ul>
        </li> -->

    </ul>
</div>
<!--sidebar-menu-->
<div id="search">

        <a href="../admin/index.php" style="color:white"><i class="icon icon-share-alt"></i><span>LogOut</span></a>

</div>