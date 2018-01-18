@include('header')
<head>
    <title>Cocktail Recipe | DrukenMonkey</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">  </script>
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
                          {{--<button class="btn btn-default navbar-btn" type="button" ><a href="{{ url('/profile') }}">{{  Session::get('email') }}</a></button>--}}
                          @else
                              <!-- Collect the nav links, forms, and other content for toggling -->
                                  <div class="collapse navbar-collapse navbar-ex1-collapse">
                                      <ul class="nav navbar-nav navbar-right">
                                          <li class=""><a href="#">home</a></li>
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


<!-- LISTINGS DETAILS TITLE SECTION -->
<section class="clearfix paddingAdjustBottom">
	<div class="container">
		<div class="row">
            <div class="col-xs-4">
                <div id="mainImage">


                    <img src="{{ ($data['picture'] != null ? $data['picture'] -> pic_st_picture: url('img/cocktail/img_not_available.png'))}}" alt="Cocktail Image"
                         class="img-responsive" width="400" height="400">
                </div>
            </div>
            <div class="col-xs-4">
				<div id="Cocktail">
                    <div class="CocktailName">
                        <h2> {{ $data['cocktail']->ckt_st_name }}</h2>
                    </div>
                    <div class="CoctailRecipe">
                        <h3>Recipe: </h3>
                        <p> {{ $data['cocktail']->ckt_st_recipe }}</p>
                    </div>
                    <div class="ServeGlass">
                        <h3>Serve: </h3>
                        <p>{{ $data['cocktail']->ckt_st_serve }}</p>

                    </div>
                    <div class="createdGlass">
                        <h3>Created by: </h3>
                        <p>{{ $data['creator']->usr_st_fname }}&nbsp;{{ $data['creator']->usr_st_lname }}</p>

                    </div>
				</div>
            </div>
            <div class="col-xs-4">
                <h3>Ingredients: </h3>



                <div id="ingredients">

                    @foreach ($data['cocktail']->ingredients as $ingredient)
                        <h6>{{$ingredient->pivot->cki_st_measure}} of {{$ingredient->igr_st_name}}</h6>
                    @endforeach

                </div>
		    </div>
	    </div>
    </div>
</section>

      @include('footer-img')
  </div>


  @include('auth.login')
  @include('js-load')


</body>

</html>

