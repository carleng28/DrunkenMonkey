@include('header')
<head>
    <title>Sign up | DrukenMonkey</title>
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('img/logo-drunkenmonkey.png') }}"
                                                                           alt="logo"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="{{ url('/') }}">home</a></li>
                            <li class=""><a href="{{ url('cocktail-main') }}">Cocktails </a></li>
                            <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                        </ul>
                    </div>
                    <button class="btn btn-default navbar-btn" type="button" data-toggle="modal"
                            data-target="#loginModal">Sign In
                    </button>
                </div>
            </nav>
        </div>
    </header>


    <!-- PAGE TITLE SECTION -->
    <section class="clearfix pageTitleSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pageTitle">
                        <h2>Password Recovery</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SIGN UP SECTION -->
    <section class="clearfix signUpSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="signUpFormArea">                        <div class="priceTableTitle">
                            <h2>Account Recovery</h2>
                            <p>Please fill out the field below in order to receive a e-mail with the instructions to
                                create a new password.</p>
                        </div>
                        <div class="signUpForm">
                            <form method="post" action="{{route('forgot.submit')}}">
                                {{ csrf_field() }}
                                <div class="formSection">
                                    <div class="row">
                                        @if ($errors->has('email'))
                                        <span class="form-group col-sm-8 col-xs-12 alert alert-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                            <div class="form-group col-xs-12">
                                                <label for="email" class="control-label">Email Address*</label>
                                            </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-primary">Send E-mail</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
