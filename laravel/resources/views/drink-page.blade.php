@include('header')

<head>
        <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$data['name']}} | DrunkenMonkey</title>

    <!-- PLUGINS CSS STYLE -->
    <link href="/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/plugins/listtyicons/style.css" rel="stylesheet">
    <link href="/plugins/bootstrapthumbnail/bootstrap-thumbnail.css" rel="stylesheet">
    <link href="/plugins/datepicker/datepicker.min.css" rel="stylesheet">
    <link href="/plugins/selectbox/select_option1.css" rel="stylesheet">
    <link href="/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="/plugins/isotope/isotope.min.css" rel="stylesheet">
    <link href="/plugins/map/css/map.css" rel="stylesheet">
    <link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css">


    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">



    <!-- CUSTOM CSS -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- FAVICON -->
    <link href="/img/favicon.png" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>

    <![endif]-->
    <script src="/js/star-rating.js" type="text/javascript"> </script>
   </head>
@php
//dd($data);
@endphp
<body class="body-wrapper">

<div class="page-loader" style="background: url(/img/preloader.gif) center no-repeat #fff;"></div>
<div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">

        <!-- TOP INFO BAR -->

        <div class="nav-wrapper navbarWhite">

            <!-- NAVBAR -->
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
                        <a class="navbar-brand" href="/index.php"><img src="/img/logo-drunkenmonkey.png" alt="logo"></a>
                    </div>

                @if(Session::has('email'))
                    <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="{{ url('/') }}">home</a></li>
                                <li class=""><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                                <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                                <li class=" dropdown singleDrop">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('fname')}} {{Session::get('lname')}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('profile') }}">Profile</a></li>
                                        <li><a href="#">Wish List</a></li>
                                        <li><a href="{{route('logout')}}">Log out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    {{--<button class="btn btn-default navbar-btn" type="button" ><a href="{{ url('/profile') }}">{{  Session::get('email') }}</a></button>--}}
                @else
                    <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="#">home</a></li>
                                <li class=""><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                                <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                            </ul>

                        </div>
                        <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal">Sign In</button>
                @endif
                </div>
            </nav>
        </div>
    </header>


    <!-- LISTINGS DETAILS TITLE SECTION -->
    <section class="clearfix paddingAdjustBottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="listingTitleArea">
                        <h2>{{$data['name']}}</h2>
                        <p>LCBO#: {{$data['id']}}  |  {{$data['package']}}</p>
                        <div class="listingReview">
                            <ul class="list-inline captionItem">
                                <li><i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wish List</li>
                            </ul>
                            <ul>
                                <a href="" class="btn btn-primary" onclick="window.location.hash = 'txtcomment'; document.getElementById('txtcomment').focus(); return false;">Write a review</a>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- LISTINGS DETAILS IMAGE SECTION -->
    <!--<section class="clearfix paddingAdjustTopBottom">
        <ul class="list-inline listingImage">
            <li><img src="img/listing/listing-details-1.jpg" alt="Image Listing" class="img-responsive"></li>
            <li><img src="img/listing/listing-details-2.jpg" alt="Image Listing" class="img-responsive"></li>
            <li><img src="img/listing/listing-details-3.jpg" alt="Image Listing" class="img-responsive"></li>
            <li><img src="img/listing/listing-details-4.jpg" alt="Image Listing" class="img-responsive"></li>
        </ul>
    </section>-->

    <!-- LISTINGS DETAILS INFO SECTION -->
    <section class="clearfix paddingAdjustTop">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="listDrinkSidebar ">
                        <h1>{{$data['price_in_cents']}} <p>{{$data['package_unit_type']}} / {{$data['total_package_units']}}. units</p></h1>

                        <img class="img-responsive"  src="{{$data['image_url']}}" alt="logo">

                    </div>
                    <div class="listSidebar">
                        <h3>Product Details</h3>
                        <div class="contactInfo">

                            <p><b>{{ $data['package_unit_volume_in_milliliters']}} mL {{$data['package_unit_type']}}</b> </p>
                            <p><b>Alcohol/Vol:</b>{{$data['alcohol_content']}}</p>
                            <p><b>Made in:</b>{{$data['origin']}}</p>
                            <p><b>Producer:</b>{{$data['producer_name']}}</p>


                        </div>
                    </div>

                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="listDetailsInfo">
                        <div class="detailsInfoBox">
                            <h2>About This Drink</h2>
                            <div style="{display:inline-block}">
                                <p><b>Category: </b>{{$data['primary_category']}}</p>
                                <p><b>Sub Category: </b>{{$data['secondary_category']}}</p>
                            </div>

                            <p><b>Tag: </b>{{$data['tags']}}</p>
                            @if($data['tasting_note']!="ND")
                                <p><b>Testing Notes</b></p>
                                <p>{{$data['tasting_note']}}</p>@endif
                             @if($data['style']!="ND")
                                <p><b>Style</b></p>
                                <p>{{$data['style']}}</p>@endif
                            @if($data['varietal']!="ND")
                                <p><b>Varietal</b></p>
                                <p>{{$data['varietal']}}</p>@endif



                        </div>
                        <!--<div class="detailsInfoBox">
                            <h3>Features</h3>
                            <ul class="list-inline featuresItems">
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Wi-Fi</li>
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Street Parking</li>
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Alcohol</li>
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Vegetarian</li>
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Reservations</li>
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Pets Friendly</li>
                                <li><i class="fa fa-check-circle-o" aria-hidden="true"></i>  Accept Credit Card</li>
                            </ul>
                        </div>-->
                        <div class="detailsInfoBox" data-spy="scroll" data-offset="0" id="reviews">
                            <h3>Reviews ({{sizeof($data['review'])}})</h3>
                            @for($i = 0; $i < sizeof($data['review']); $i++)
                            <div class="media media-comment">
                                <div class="media-left">
                                    <img src="/img/listing/list-user-1.jpg" class="media-object img-circle" alt="Image User">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$data['review'][$i]['fname']}} {{$data['review'][$i]['lname']}}</h4>
                                    <ul class="list-inline rating">
                                        @for($j = 0; $j < $data['review'][$i]['rvw_dc_rate']; $j++)
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     @endfor
                                            @for($k = 0; $k < (5 - $data['review'][$i]['rvw_dc_rate']); $k++)
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            @endfor
                                    </ul>
                                    <p>{{$data['review'][$i]['rvw_st_review']}} </p>
                                </div>
                            </div>
                            @endfor <!--
                            <div class="media media-comment">
                                <div class="media-left">
                                    <img src="/img/listing/list-user-2.jpg" class="media-object img-circle" alt="Image User">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Jessica Brown</h4>
                                    <ul class="list-inline rating">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                    </ul>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudan
                                        totam rem ape riam,</p>
                                </div>
                            </div>
                            <div class="media media-comment">
                                <div class="media-left">
                                    <img src="/img/listing/list-user-3.jpg" class="media-object img-circle" alt="Image User">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Jessica Brown</h4>
                                    <ul class="list-inline rating">
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                    </ul>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudan
                                        totam rem ape riam,</p>
                                </div>
                            </div>-->
                        </div>
                        <div class="detailsInfoBox">
                            <h3>Write A Review </h3>
                            @if(Session::has('email'))
                            <form action="{{ url('drink-page',$data['id'])}}" name="commentform" method="post">
                                {{ csrf_field() }}
                                <div class="formSection formSpace">
                                    <div class="form-group">
                                        <div  class="ratings">
                                            <label>
                                                <input type="radio" name="ratings" value="5" title="5 stars" onclick="changeClass()">
                                            </label>
                                            <label>
                                                <input type="radio" name="ratings" value="4" title="4 stars" onclick="changeClass()">
                                            </label>
                                            <label>
                                                <input type="radio" name="ratings" value="3" title="3 stars" onclick="changeClass()">
                                            </label>
                                            <label>
                                                <input type="radio" name="ratings" value="2" title="2 stars" onclick="changeClass()">
                                            </label>
                                            <label>
                                                <input type="radio" name="ratings" value="1" title="1 star" onclick="changeClass()">
                                            </label>
                                            <input type="hidden" value="{{$data['id']}}" name="idProd">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Comment" id="txtcomment" name="drinkReview"></textarea>
                                    </div>
                                    <div class="form-group mb0">
                                        <button type="submit" class="btn btn-primary">Send Review</button>
                                    </div>
                                </div>
                            </form>
                            @else
                                <form action="#" name="commentform">
                                    <div class="formSection formSpace">
                                        <div class="form-group listingReview">
                                            <div  class="ratings">
                                                <label>
                                                    <input type="radio" name="ratings" value="5" title="5 stars" onclick="changeClass()" disabled="disabled">
                                                </label>
                                                <label>
                                                    <input type="radio" name="ratings" value="4" title="4 stars"onclick="changeClass()" disabled="disabled">
                                                </label>
                                                <label>
                                                    <input type="radio" name="ratings" value="3" title="3 stars" onclick="changeClass()" disabled="disabled">
                                                </label>
                                                <label>
                                                    <input type="radio" name="ratings" value="2" title="2 stars" onclick="changeClass()" disabled="disabled">
                                                </label>
                                                <label>
                                                    <input type="radio" name="ratings" value="1" title="1 star" onclick="changeClass()" disabled="disabled">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Sign In to Write a Review" id="txtcomment" readonly></textarea>
                                        </div>
                                        <div class="form-group mb0">
                                            <button type="submit" class="btn btn-primary" disabled>Send Review</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- FOOTER -->
    <footer style="background-image: url(/img/background/bg-footer.jpg);">
        <!-- FOOTER INFO -->
        <div class="clearfix footerInfo">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-xs-12">
                        <div class="footerText">
                            <a href="index.php" class="footerLogo"><img src="/img/logo-drunkenmonkey.png" alt="Footer Logo"></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor</p>
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
                                        <p>Copyright &copy; 2017. All Rights Reserved by <a href="http://www.iamabdus.com/" target="_blank">Abdus</a></p>
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

@include('footer-img')
</div>

@include('auth.login')
@include('js-load')

</body>

</html>

