<!DOCTYPE html>
<html lang="en">
<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DrunkenMonkey</title>

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

<body class="body-wrapper">
<div class="page-loader" style="background: url(img/preloader.gif) center no-repeat #fff;"></div>
<div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">

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
                        <a class="navbar-brand" href="index.php"><img src="img/logo-drunkenmonkey.png" alt="logo"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#">home</a></li>
                            <li class=""><a href="cocktail-main.html">Cocktails </a></li>
                            <li class=""><a href="about-us.html">about us </a></li>
                        </ul>
                    </div>
                    <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>
                </div>
            </nav>
        </div>
    </header>


    <!-- MAP SECTION -->
    <section class="clearfix p0">
        <div id="map-canvas"></div>
    </section>

    <!-- CATEGORY SEARCH SECTION -->
    <section class="clearfix searchArea banerInfo">
        <form id="searchAddress">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Near</div>
                                <input type="text" class="form-control" id="nearLocation" placeholder="Location">
                                <div class="input-group-addon addon-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- CATEGORY SECTION -->
    <section class="clearfix bg-light" style="display:none;" id="sectionToHide">
        <div class="container">
            <div class="page-header text-center">
                <h2>Categories </h2>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="img/drinks-category/Beer-icon.png"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto"  width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="beersCiders" href="drink-category-grid-full.html">Beers &amp; Ciders</a></h2>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="img/drinks-category/cooler.png"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="coolers" href="drink-category-grid-full.html">Coolers</a></h2>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="img/drinks-category/spirits.png"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="spirits" href="drink-category-grid-full.html">Spirits</a></h2>

                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="img/drinks-category/wine-bottle.png"  class="img-fluid img-responsive" style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="wine" href="drink-category-grid-full.html">Wine</a></h2>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="img/drinks-category/nonalcoholic.png"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="nonalcoholic" href="drink-category-grid-full.html">Non-alcoholic</a></h2>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="img/drinks-category/accessories.png"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="accessories" href="drink-category-grid-full.html">Accessories</a></h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footerWhite">
        <!-- FOOTER INFO -->
        <div class="clearfix footerInfo">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-xs-12">
                        <div class="footerText">
                            <a href="index.php" class="footerLogo"><img src="img/logo-drunkenmonkey.png" alt="Footer Logo"></a>
                            <p>Information about the team</p>
                            <ul class="list-styled list-contact">
                                <li><i class="fa fa-phone" aria-hidden="true"></i>[88] 657 524 332</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@listy.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="footerInfoTitle">
                            <h4>Links</h4>
                        </div>
                        <div class="useLink">
                            <ul class="list-unstyled">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="cocktail-main.html">Cocktails</a></li>
                                <li><a href="about-us.html">About us</a></li>
                                <li><a href="sign-in.html">Sign in</a></li>
                                <li><a href="sign-up.html">Sign up</a></li>
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

                                </div>
                                <div class="col-sm-7 col-sm-pull-5 col-xs-12">
                                    <div class="copyRightText">
                                        <p>Copyright &copy; 2017. All Rights Reserved by <a href="http://www.iamabdus.com/" target="_blank">Code4Life</a></p>
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
                        <a href="password.html" class="pull-right link">Forgot Password?</a>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <p>Don’t have an Account? <a href="sign-up.html" class="link">Sign up</a></p>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8CEXPvVQmPs-XQiik7YEwV5ITAw7Xg8&libraries=places"></script>
<script src="plugins/map/js/rich-marker.js"></script>
<script src="plugins/map/js/infobox_packed.js"></script>
<script src="js/index.js"></script>
<script src="js/custom.js"></script>

</body>

</html>