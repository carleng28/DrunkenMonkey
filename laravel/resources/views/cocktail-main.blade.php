@include('header')
<head>
    <title>Cocktails | DrukenMonkey</title>
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
                        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('img/logo-drunkenmonkey.png') }}" alt="logo"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li >
                                <a href="{{ url('/') }}">home <!--<i class="fa fa-angle-down" aria-hidden="true"></i>--></a>
                                <!--<ul class="dropdown-menu dropdown-menu-right">
                                  <li><a href="index.php">Map Version</a></li>
                                  <li><a href="index-2.html">Travel Version</a></li>
                                  <li><a href="index-3.html">Automobile Version</a></li>
                                </ul>-->
                            </li>
                            <li class="active"><a href="{{ url('cocktail-main') }}">Cocktails </a></li>

                            <li class=""><a href="{{ url('about-us') }}">about us </a></li>

                        </ul>
                    </div>
                    <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>
                </div>
            </nav>
        </div>
    </header>

    <section class="clearfix paddingAdjustTopBottom">
        <ul class="list-inline listingImage">
            <li><img src="{{ url('img/listing/alcohol-bar-party-cocktail.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
            <li><img src="{{ url('img/listing/black-and-white-alcohol-bar-drinks.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
            <li><img src="{{ url('img/listing/bar-1839361_960_720.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
            <li><img src="{{ url('img/listing/pexels-photo-110472.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
        </ul>
    </section>


    <!-- CATEGORY SECTION -->
    <section class="clearfix bg-light" style="padding: 25px;">
        <div class="container">
            <div class="page-header text-center">
                <h2>Categories </h2>
            </div>
            <div id="SingleCategory">
                @foreach ($data['categories'] as $category)
                    <div class="col-md-3 col-sm-6 col-xs-12"><div class="categoryItem">
                            <img src="{{ url('img/CocktailCategoriesPics/'.trim(explode("/",$category->strCategory)[0]).'-icon.png')}}"
                                 class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                                <h2 style="text-align: center!important">
                                    <a href="{{ url('cocktail-category/'.implode("",explode("/",$category->strCategory))) }}">
                                        {{$category->strCategory}}
                                    </a>
                                </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    @include('footer-img')
</div>

@include('login')
@include('js-load')

</body>

</html>
