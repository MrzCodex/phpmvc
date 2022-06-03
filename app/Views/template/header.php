<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/morvin/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:08:45 GMT -->
<head>

    
    <meta charset="utf-8" />
    <title><?=$data['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=BASEURL;?>/assets/images/favicon.ico">

   
        <!-- Bootstrap Css -->
        <link href="<?=BASEURL;?>/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=BASEURL;?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=BASEURL;?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


        
        <!-- DataTables -->
        <link href="<?=BASEURL;?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=BASEURL;?>/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?=BASEURL;?>/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

        <!-- my script search -->
        <script src="<?=BASEURL;?>/assets/js/me/header.jquery.min.js"></script>

</head>


<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                       <!-- LOGO -->
                 <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?=BASEURL;?>/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=BASEURL;?>/assets/images/logo-dark.png" alt="" height="20">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?=BASEURL;?>/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=BASEURL;?>/assets/images/logo-light.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                    
                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
            
                </div>
                <div class="d-flex">
    
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>

                    

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if(!is_file('assets/img/'.$data['session']->gambar_user)){;?>
                                <img class="rounded-circle header-profile-user" src="<?=BASEURL;?>/assets/img/avatar.jpg"
                                alt="Header Avatar">
                            <?php }else{;?>
                                <img class="rounded-circle header-profile-user" src="<?=BASEURL;?>/assets/img/<?=$data['session']->gambar_user;?>"
                                alt="Header Avatar">
                            <?php };?>

                            <span class="d-none d-xl-inline-block ms-1"><?=$data['session']->nama;?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="<?=BASEURL;?>/profil"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item d-block" href="<?=BASEURL;?>/setting"><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Settings</a>
                            <a class="dropdown-item" href="<?=BASEURL;?>/auth/lockscreen"><i class="mdi mdi-lock-open-outline font-size-16 align-middle me-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?=BASEURL;?>/auth/logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

            
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <?php require_once "sidebar.php";?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
                                 <h4>Dashboard</h4>
                                     <ol class="breadcrumb m-0">
                                         <li class="breadcrumb-item"><a href="javascript: void(0);"><?=NAMEAPP;?></a></li>
                                         <li class="breadcrumb-item"><a href="javascript: void(0);"><?=$data['title2'];?></a></li>
                                         <li class="breadcrumb-item active"><?=$data['title3'];?></li>
                                     </ol>
                             </div>
                         </div>
                     </div>
                    </div>
                 </div>
                 <!-- end page title -->    
            

                <div class="container-fluid">

                    <div class="page-content-wrapper">


                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <?= Flasher::flash();?>
