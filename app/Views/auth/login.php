
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:09:57 GMT -->
<head>

    
    <meta charset="utf-8" />
    <title>Login page | Morvin - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=BASEURL?>/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?=BASEURL?>/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?=BASEURL?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?=BASEURL?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="<?=BASEURL?>/assets/images/logo-dark.png" height="22" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to <?=NAMEAPP;?>.</p>
                                    </div>


                                    <form class="form-horizontal mt-4 pt-2" action="<?=BASEURL;?>/auth/login" method="post">

                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Enter email">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" name="password"
                                                placeholder="Enter password">
                                        </div>

                                        <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="ingat"
                                                        id="customControlInline">
                                                    <label class="form-label"
                                                        for="customControlInline">Remember me</label>
                                                </div>
                                        </div>

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>

                                  
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>Don't have an account ?<a href="<?=BASEURL;?>/auth/register" class="fw-bold text-white"> Register</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?=BASEURL?>/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?=BASEURL?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASEURL?>/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?=BASEURL?>/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=BASEURL?>/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?=BASEURL?>/assets/js/app.js"></script>

</body>


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 15:09:57 GMT -->
</html>