@include('header')
<head>
    <title>DrunkenMonkey</title>
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
                                    <li class="active"><a href="{{ url('/') }}">home</a></li>
                                    <li class=""><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                                    <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                                    <li class=" dropdown singleDrop">
                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                           role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('fname')}} {{Session::get('lname')}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{ url('profile') }}">Profile</a></li>
                                            <li><a href="{{ url('wishlist') }}">Wish List</a></li>
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
                                    <li class="active"><a href="{{ url('/') }}">home</a></li>
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
                        <img src="{{ url('img/drinks-category/Beer-icon.png') }}"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto"  width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="beers" href="{{ url('drink-category-grid-full') }}">Beer</a></h2>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="{{ url('img/drinks-category/cooler.png') }}"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="coolers" href="{{ url('drink-category-grid-full') }}">Ready-to-drink/Coolers</a></h2>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="{{ url('img/drinks-category/spirits.png') }}"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="spirits" href="{{ url('drink-category-grid-full') }}">Spirits</a></h2>

                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="{{ url('img/drinks-category/wine-bottle.png') }}"  class="img-fluid img-responsive" style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="wine" href="{{ url('drink-category-grid-full') }}">Wine</a></h2>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="{{ url('img/drinks-category/nonalcoholic.png') }}"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="ciders" href="{{ url('drink-category-grid-full') }}">Ciders</a></h2>

                    </div>
                </div>
              {{--  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="categoryItem">
                        <img src="{{ url('img/drinks-category/accessories.png') }}"  class="img-fluid img-responsive"  style="margin-right: auto; margin-left:auto" width="100" height="100"/>
                        <h2 style="text-align: center!important"><a id="accessories" href="{{ url('drink-category-grid-full') }}">Accessories</a></h2>

                    </div>
                </div>--}}
            </div>
        </div>
    </section>

    @include('footer')
</div>

@include('auth.login')
@include('js-load')
<script src="{{ URL::asset('js/index.js') }}"></script>
</body>

</html>