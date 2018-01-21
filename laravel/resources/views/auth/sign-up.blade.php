@include('header')
<head>
    <title>Sign up | DrukenMonkey</title>
</head>

<body class="body-wrapper">
<div class="page-loader" style="background:url({{ url('/img/preloader.gif') }}) center no-repeat #fff;"></div>
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


    <!-- PAGE TITLE SECTION -->
    <section class="clearfix pageTitleSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pageTitle">
                        <h2>Sign Up</h2>
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
                    <div class="signUpFormArea">
                        <div class="priceTableTitle">
                            <h2>Account Registration</h2>
                            <p>Please fill out the fields below to create your account. We will send your account information
                                to the email address you enter. Your email address and information will NOT be sold or shared
                                with any 3rd party. If you already have an account, please, <a href="{{ route('login') }}">click here</a>.</p>
                        </div>
                        <div class="signUpForm">
                            <form action="{{ route('register') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="formSection">
                                    <h3>Contact Information</h3>
                                    @if(count($errors))
                                        <div class="form-group">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors -> all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <div class="profileImage">
                                                <img src="{{ url('img/dashboard/blank.jpg') }}" alt="Image User" class="img-circle">
                                                <div class="file-upload profileImageUpload">
                                                    <div class="upload-area">
                                                        <input type="file" name="img[]" class="file">
                                                        <button class="browse" type="button">Upload a Picture <i class="icon-listy icon-upload"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="firstName" class="control-label">First Name*</label>
                                            <input type="text" class="form-control" name="firstName"required>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="lastName" class="control-label">Last Name*</label>
                                            <input type="text" class="form-control" name="lastName" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="email" class="control-label">Email Address*</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>

                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="email_confirmation" class="control-label">Confirm Email Address*</label>
                                            <input type="email" class="form-control" name="email_confirmation" id="email_confirmation" placeholder="info@example.com" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="datepicker" class="control-label">Date of Birth*</label>
                                            <input type="date" class="form-control" name="dateBirth" placeholder="mm/dd/yyyy" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="gender" class="control-label">Gender</label>
                                            <select class="form-control" name="gender" id="gender" required>
                                                <option disabled selected> -- select an option -- </option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="N">Prefer to not inform</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="province" class="control-label">Province*</label>
                                            <select class="form-control" name="province" id="province" required>
                                                <option disabled selected> -- select an option -- </option>
                                                <option value="AB">Alberta</option>
                                                <option value="BC">British Columbia</option>
                                                <option value="MB">Manitoba</option>
                                                <option value="NB">New Brunswick</option>
                                                <option value="NL">Newfoundland and Labrador</option>
                                                <option value="NS">Nova Scotia</option>
                                                <option value="ON">Ontario</option>
                                                <option value="PE">Prince Edward Island</option>
                                                <option value="QC">Quebec</option>
                                                <option value="SK">Saskatchewan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="city" class="control-label">City*</label>
                                            <input type="text" class="form-control" name="city" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="formSection">
                                    <h3>Account Information</h3>
                                    <div class="row">
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="password" class="control-label">Password*</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label for="password_confirmation" class="control-label">Password (re-type)*</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="formSection">
                                    <div class="row">
                                        <div class="form-group col-xs-12 mb0">
                                            <button type="submit" class="btn btn-primary">Create Account</button>
                                        </div>


                                    </div>
                                    <br/>
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