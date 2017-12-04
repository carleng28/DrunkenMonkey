@include('header')
<head>
  <title>Sign in | DrukenMonkey</title>
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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url('/') }}">home</a></li>
                <li class=""><a href="{{ url('cocktail-main') }}">Cocktails </a></li>
                <li class=""><a href="{{ url('about-us') }}">about us </a></li>
              </ul>
            </div>
            <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>
          </div>
        </nav>
      </div>
    </header>


<!-- LOGIN SECTION -->
<section class="clearfix loginSection">
	<div class="container">
		<div class="row">
			<div class="center-block col-md-5 col-sm-6 col-xs-12">
				<div class="panel panel-default loginPanel">
					<div class="panel-heading text-center">Members log in</div>
					<div class="panel-body">
						<form class="loginForm">
							<div class="form-group">
								<label for="userName">User Name *</label>
								<input type="text" class="form-control" id="userName">
								<p class="help-block">Enter your Foundation username.</p>
							</div>
							<div class="form-group">
								<label for="userPassword">Password *</label>
								<input type="password" class="form-control" id="userPassword">
								<p class="help-block">Enter the password that accompanies your username.</p>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary pull-left">Log In</button>
								<a href="#" class="pull-right link">Fogot Password?</a>
							</div>
						</form>
					</div>
					<div class="panel-footer text-center">
						<p>Not a member yet? <a href="{{ url('sign-up') }}" class="link">Sign up</a></p>
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
