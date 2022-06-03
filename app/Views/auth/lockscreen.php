<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:09:57 GMT -->
<head>

    
    <meta charset="utf-8" />
    <title>Lock Sreen | <?=NAMEAPP;?></title>
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


</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="https://themesdesign.in/" class="text-white router-link-active"><i
                            class="fas fa-home h2"></i></a></div>


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="<?=BASEURL;?>/assets/images/logo-dark.png" height="22" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Lock Screen</h5>
                                        <p class="text-muted">Enter your password to unlock the screen!</p>
                                    </div>


                                    <form class="form-horizontal" action="<?=BASEURL;?>/auth/login" method="post">
            
                                        <div class="user-thumb text-center mb-4 mt-4">
                                            <?php if(!is_file('../public/assets/img/'.$data['session']->gambar_user)){;?>
                                                <img src="<?=BASEURL;?>/assets/img/avatar.jpg" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                            <?php }else{;?>
                                                <img src="<?=BASEURL;?>/assets/img/<?=$data['session']->gambar_user;?>" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                            <?php };?>
                                            <h5 class="font-size-15 mt-3"><?=$data['session']->nama;?></h5>
                                        </div>
                    
            
                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="hidden" name="email" value="<?=$data['session']->email;?>">
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                        </div>
                                        
                                        <div class="col mb-0">
                                            <div class="col-12 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Unlock</button>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>Not you ? return <a href="<?=BASEURL;?>/auth" class="fw-bold text-white"> Sign In </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?=BASEURL;?>/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?=BASEURL;?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASEURL;?>/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?=BASEURL;?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=BASEURL;?>/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?=BASEURL;?>/assets/js/app.js"></script>

</body>


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:09:57 GMT -->
</html>