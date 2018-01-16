@include('header')
<head>
    <title>Cocktails | DrukenMonkey</title>
</head>

<body class="body-wrapper">
<div class="page-loader" style="background: url({{ url('/img/preloader.gif') }}) center no-repeat #fff;"></div>
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

                @if(Session::has('email'))
                    <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class=""><a href="{{ url('/') }}">home</a></li>
                                <li class="active"><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                                <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                                <li class=" dropdown singleDrop">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('fname')}} {{Session::get('lname')}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
                                        <li class=""><a href="{{route('home')}}">home</a></li>
                                        <li class="active"><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                                        <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                                    </ul>

                                </div>
                                <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal">Sign In</button>
                            @endif
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
                                    <a href="{{ url('cocktail/category/'.explode("/",explode(" ",$category->strCategory)[0])[0]) }}">
                                        {{$category->strCategory}}
                                    </a>
                                </h2>
                        </div>
                    </div>
                @endforeach
                    <div class="col-md-3 col-sm-6 col-xs-12"><div class="categoryItem">
                            <img src="{{ url('img/CocktailCategoriesPics/plus.png')}}"
                                 class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                            <h2 style="text-align: center!important">

                                <a href="{{ url('cocktail/add-cocktail') }}">Add Your own Cocktail
                                </a>

                            </h2>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    @include('footer-img')
</div>

@include('auth.login')
@include('js-load')

</body>

</html>
