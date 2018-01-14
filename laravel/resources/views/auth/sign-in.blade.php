@include('header')
<head>
  <title>Sign in | DrukenMonkey</title>
</head>


<body class="body-wrapper">
  <div class="page-loader" style="background:  url({{ url('/img/preloader.gif') }}) center no-repeat #fff;"></div>
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
                              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <i class="fa fa-angle-down" aria-hidden="true"></i></a>
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


<!-- LOGIN SECTION -->
<section class="clearfix loginSection">
	<div class="container">
		<div class="row">
			<div class="center-block col-md-5 col-sm-6 col-xs-12">
				<div class="panel panel-default loginPanel">
					<div class="panel-heading text-center">Members log in</div>
					<div class="panel-body">
                        <form action="{{ route('login') }}" method="post" class="loginForm">
                            {{ csrf_field() }}
							<div class="form-group">
								<label for="email">E-Mail Address</label>
								<input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}">
								<p class="help-block">Enter your E-Mail Address.</p>
                                {{--Check comment--}}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="userPassword">Password *</label>
								<input name="password" type="password" class="form-control" id="password">
								<p class="help-block">Enter your password.</p>
                                {{--Check comment--}}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary pull-left">Log In</button>
								<a href="#" class="pull-right link">Forgot Password?</a>
							</div>
						</form>
					</div>
					<div class="panel-footer text-center">
                        <p>Not a member yet? <a href="{{ route('register') }}" class="link">Sign up</a></p>
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
