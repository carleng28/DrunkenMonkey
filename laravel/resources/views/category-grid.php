<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category grid - Listty</title>

    <!-- PLUGINS CSS STYLE -->
    <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="plugins/listtyicons/style.css" rel="stylesheet">
    <link href="plugins/bootstrapthumbnail/bootstrap-thumbnail.css" rel="stylesheet">
    <link href="plugins/datepicker/datepicker.min.css" rel="stylesheet">
    <link href="plugins/selectbox/select_option1.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="plugins/isotope/isotope.min.css" rel="stylesheet">
    <link href="plugins/map/css/map.css" rel="stylesheet">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- FAVICON -->
    <link href="img/favicon.png" rel="shortcut icon">




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>




    <![endif]-->

</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/drink-category.js"></script>

<body class="body-wrapper">


<div class="page-loader" style="background: url(img/preloader.gif) center no-repeat #fff;"></div>


<div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">

        <!-- TOP INFO BAR -->
        <!-- TOP INFO BAR -->

        <div class="nav-wrapper navbarWhite">

            <!-- NAVBAR -->
            <nav id="menuBar" class="navbar navbar-default lightHeader" role="navigation">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html"><img src="img/logo-blue.png" alt="logo"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="index.html">home </a>

                            </li>
                            <li class="active"><a href="cocktails.html">Cocktails </a></li>

                            <li class=""><a href="#">about us </a></li>

                        </ul>
                    </div>
                    <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"> + <span>Add Listing</span> </button>
                </div>
            </nav>
        </div>

    </header>

    <!-- CATEGORY GRID SECTION -->
    <section class="clerfix categoryGrid">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-12 pull-right">
                    <div class="resultBar">
                        <h2>We found <span>8</span> Results for you</h2>

                    </div>
                    <div id='drink_display' class="row">
                    </div>
                </div>
                <div class="paginationCommon blogPagination categoryPagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12 pull-left">

                <div class="sidebarInner sidebarCategory">
                    <div class="panel panel-default">
                        <div class="panel-heading">Filter by Type</div>
                        <div class="panel-body">
                            <ul id='bycategory' class="list-unstyle categoryList">
                                <li><a href="#">Dhaka</a></li>
                                <li><a href="#">Chittagong</a></li>
                                <li><a href="#">Rajshahi</a></li>
                                <li><a href="#">Khulna</a></li>
                                <li><a href="#">Barisal</a></li>
                                <li><a href="#">Sylhet</a></li>
                                <li><a href="#">Rangpure</a></li>
                                <li><a href="#">Gazipure</a></li>
                                <li><a href="#">Pabna</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="sidebarInner sidebarCategory">
                    <div class="panel panel-default">
                        <div class="panel-heading">Related Categories</div>
                        <div class="panel-body">
                            <ul class="list-unstyle categoryList">
                                <li><a href="#">Fast food</a></li>
                                <li><a href="#">Chinese restaurants</a></li>
                                <li><a href="#">Creole restaurants</a></li>
                                <li><a href="#">Seafood</a></li>
                                <li><a href="#">Thai restaurants</a></li>
                                <li><a href="#">Street food</a></li>
                                <li><a href="#">Japanese restaurants</a></li>
                                <li><a href="#">Greek restaurants</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



<!-- FOOTER -->
<footer style="background-image: url(img/background/bg-footer.jpg);">
    <!-- FOOTER INFO -->
    <div class="clearfix footerInfo">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-xs-12">
                    <div class="footerText">
                        <a href="index.html" class="footerLogo"><img src="img/logo-footer.png" alt="Footer Logo"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor</p>
                        <ul class="list-styled list-contact">
                            <li><i class="fa fa-phone" aria-hidden="true"></i>[88] 657 524 332</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@listy.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footerInfoTitle">
                        <h4>Links</h4>
                    </div>
                    <div class="useLink">
                        <ul class="list-unstyled">
                            <li><a href="dashboard.html">Dashboard</a></li>
                            <li><a href="sign-up.html">Create Account</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="add-listings.html">Add Listing</a></li>
                            <li><a href="edit-listings.html">Edit Listing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                    <div class="footerInfoTitle">
                        <h4>Company</h4>
                    </div>
                    <div class="useLink">
                        <ul class="list-unstyled">
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="terms-of-services.html">Terms and Conditions</a></li>
                            <li><a href="how-it-works.html">How It Works</a></li>
                            <li><a href="payment-process.html">Payment</a></li>
                            <li><a href="pricing-table.html">Pricing</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COPY RIGHT -->
    <div class="clearfix copyRight">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyRightWrapper">
                        <div class="row">
                            <div class="col-sm-5 col-sm-push-7 col-xs-12">
                                <ul class="list-inline socialLink">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-sm-7 col-sm-pull-5 col-xs-12">
                                <div class="copyRightText">
                                    <p>Copyright &copy; 2017. All Rights Reserved by <a href="#">Abdus</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
</div>

<!-- LOGIN  MODAL -->
<div id="loginModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log In to your Account</h4>
            </div>
            <div class="modal-body">
                <form class="loginForm">
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control" id="pwd" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                        <a href="#" class="pull-right link">Fogot Password?</a>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <p>Don’t have an Account? <a href="#" class="link">Sign up</a></p>
            </div>
        </div>

    </div>
</div>

<!-- JAVASCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<script src="plugins/waypoints/waypoints.min.js"></script>
<script src="plugins/counter-up/jquery.counterup.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.min.js"></script>
<script src="plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="plugins/isotope/isotope.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/isotope/isotope-triger.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script>
<script src="plugins/map/js/rich-marker.js"></script>
<script src="plugins/map/js/infobox_packed.js"></script>
<script src="js/single-map.js"></script>
<script src="js/map.js"></script>
<script src="js/custom.js"></script>

</body>

</html>

