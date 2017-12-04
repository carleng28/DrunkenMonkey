@include('header')
<head>
  <title>About us | DrukenMonkey</title>
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
                <li class="">
                  <a href="{{ url('/') }}">home <!--<i class="fa fa-angle-down" aria-hidden="true"></i>--></a>
                  <!--<ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="index.php">Map Version</a></li>
                    <li><a href="index-2.html">Travel Version</a></li>
                    <li><a href="index-3.html">Automobile Version</a></li>
                  </ul>-->
                </li>
                <li class=""><a href="{{ url('cocktail-main') }}">Cocktails </a></li>

                <li class="active"><a href="{{ url('about-us') }}">about us </a></li>

              </ul>
            </div>
            <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>
          </div>
        </nav>
      </div>
    </header>


<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection" style="background-image: url();">
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
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
                  </div>
                </div>
              </div>
            </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    <div class="howWorksImage text-left"><img src="{{ url('img/works/works-big-2.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-xs-12">
                    <div class="howWorksInfo text-right">
                      <h3>Cesar Sarmiento</h3>
                      <p>sarmiento_cesar@hotmail.com</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-sm-push-8 col-xs-12">
                    <div class="howWorksImage text-right"><img src="{{ url('img/works/works-big-3.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                    <div class="howWorksInfo text-left">
                      <h3>Cintia Yorinori</h3>
                      <p>Step 3</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    <div class="howWorksImage text-left"><img src="{{ url('img/works/works-big-2.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-xs-12">
                    <div class="howWorksInfo text-right">
                      <h3>Erika Pepe</h3>
                      <p>Step 2</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-sm-push-8 col-xs-12">
                    <div class="howWorksImage text-right"><img src="{{ url('img/works/works-big3.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                    <div class="howWorksInfo text-left">
                      <h3>Kristina Kirpichnikova</h3>
                      <p>Step 3</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="howWorksInner">
                <div class="row">
                  <div class="col-sm-4 col-xs-12">
                    <div class="howWorksImage text-left"><img src="{{ url('img/works/works-big-2.png') }}" alt="Image Works"></div>
                  </div>
                  <div class="col-sm-8 col-xs-12">
                    <div class="howWorksInfo text-right">
                      <h3>Sadanand Rao</h3>
                      <p>Step 2</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
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


  @include('login')
  @include('js-load')

</body>

</html>
