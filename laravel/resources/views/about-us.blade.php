@include('header')
<head>
  <title>About us | DrukenMonkey</title>
</head>

<body class="body-wrapper">
  <div class="page-loader" style="background:  url({{ url('/img/preloader.gif') }})center no-repeat #fff;"></div>
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
                  <li class=""><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                  <li class="active"><a href="{{ url('about-us') }}">about us </a></li>
                  <li class=" dropdown singleDrop">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('fname')}} {{Session::get('lname')}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{ url('profile/')}}">Profile</a></li>
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
                  <li class=""><a href="{{ url('/') }}">home</a></li>
                  <li class=""><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                  <li class="active"><a href="{{ url('about-us') }}">about us </a></li>
                </ul>

              </div>
              <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal">Sign In</button>
            @endif
          </div>
        </nav>
      </div>
    </header>


<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection" >
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pageTitle">
					<h2>about us</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- HOW WORKS SECTION -->
<section class="clearfix howWorksSection">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-sm-push-8 col-xs-12">

                  </div>
                  <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                    <div class="howWorksInfo text-left">
                      <h3>Drunken Monkey Project</h3>
                      <p>This is a project for Open Source course, ITS program, for Humber College.</p>
                      <p>The technologies used are HTML, CSS, PHP. Framework used are Laravel and Boostrap.</p>
                      <p>The APIs used are LCBO, Google Maps, and TheCocktailDB . </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="howWorksInner">
              <div class="row">
                <div class="col-sm-4 col-sm-push-8 col-xs-12">
                  <div class="howWorksImage text-right"><img src="{{ url('img/works/carlitos.png') }}" alt="Image Works"></div>
                </div>
                <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                  <div class="howWorksInfo text-left">

                    <h3>Carlos Gomez</h3>
                    <p>carleng28@gmail.com</p>
                  </div>
                </div>
              </div>
            </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    <div class="howWorksImage text-left"><img src="{{ url('img/works/cesar.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-xs-12">
                    <div class="howWorksInfo text-right">
                      <h3>Cesar Sarmiento</h3>
                      <p>sarmiento_cesar@hotmail.com</p>
                      <p> </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-sm-push-8 col-xs-12">
                    <div class="howWorksImage text-right"><img src="{{ url('img/works/cintia.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                    <div class="howWorksInfo text-left">
                      <h3>Cintia Yorinori</h3>
                      <p>cintiayurika@gmail.com</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    <div class="howWorksImage text-left"><img src="{{ url('img/works/erika.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-xs-12">
                    <div class="howWorksInfo text-right">
                      <h3>Erika Pepe</h3>
                      <p>erikapepes@gmail.com</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-sm-push-8 col-xs-12">
                    <div class="howWorksImage text-right"><img src="{{ url('img/works/kristina.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                    <div class="howWorksInfo text-left">
                      <h3>Kristina Kirpichnikova</h3>
                      <p>kristkirp@gmail.com</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    <div class="howWorksImage text-left"><img src="{{ url('img/works/sada.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-xs-12">
                    <div class="howWorksInfo text-right">
                      <h3>Sadanand Rao</h3>
                      <p>sadanand.srinivasan@gmail.com </p>
                    </div>
                  </div>
                </div>
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
