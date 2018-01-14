@include('header')
<head>
    <title>Profile | DrunkenMonkey</title>
</head>
<body>
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="img/logo-drunkenmonkey.png" alt="logo"></a>
                    </div>

                @if(Session::has('email'))
                    <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class=""><a href="{{ url('/') }}">home</a></li>
                                <li class=""><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
                                <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                                <li class=" dropdown singleDrop">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('fname')}} {{Session::get('lname')}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right active">
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
                        <h2>Profile</h2>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD PROFILE SECTION -->
    <section class="clearfix bg-light profileSection">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="dashboardBoxBg mb30">
                        <div class="profileImage">
                            <img src="img/dashboard/blank.jpg" alt="Image User" class="img-circle">
                            <div class="file-upload profileImageUpload">
                                <div class="upload-area">
                                    <input type="file" name="img[]" class="file">
                                    <button class="browse" type="button">Upload a Picture <i
                                                class="icon-listy icon-upload"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-7 col-xs-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    @if (session()->has('errorsPass'))
                        <div class="alert alert-danger">
                            <ul>
                                <li> {{ session()->get('errorsPass') }}</li>
                            </ul>
                        </div><br />
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session()->get('success') }}</li>
                            </ul>

                        </div>
                    @endif
                    <form method="post" action="{{ route('profile.update') }}">
                        {{ csrf_field() }}
                        <div class="dashboardBoxBg mb30">
                            <div class="profileIntro">
                                <h3>About You </h3>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="firstName">Fast Name</label>
                                        <input type="text" value="{{$user[0]['usr_st_fname']}}" class="form-control" id="firstName" name="firstName" required>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="lastName">Last Name</label>
                                        <input type="text"  value="{{$user[0]['usr_st_lname']}}" class="form-control" id="lastName" name="lastName" required>
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label for="email">Email</label>
                                        <input type="email" value="{{$user[0]['usr_st_email']}}" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="dateBirth" class="control-label">Date of Birth*</label>
                                        <input type="date" value="{{$user[0]['usr_dt_birth']}}" class="form-control" id="dateBirth" name="dateBirth" required>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="gender" class="control-label">Gender</label>
                                        <select class="form-control" name="gender" required>
                                            <option></option>
                                            <option  {{$user[0]['usr_st_gender']=="M" ? 'selected':''}} value="M">Male</option>
                                            <option {{$user[0]['usr_st_gender']=="F" ? 'selected':''}} value="F">Female</option>
                                            <option {{$user[0]['usr_st_gender']=="N" ? 'selected':''}} value="N">Prefer to not inform</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="province" class="control-label">Province*</label>
                                        <select class="form-control" name="province" id="province" required>
                                            <option></option>
                                            <option {{$user[0]['usr_st_province']=="AB" ? 'selected':''}} value="AB">Alberta</option>
                                            <option {{$user[0]['usr_st_province']=="BC" ? 'selected':''}} value="BC">British Columbia</option>
                                            <option {{$user[0]['usr_st_province']=="MB" ? 'selected':''}} value="MB">Manitoba</option>
                                            <option {{$user[0]['usr_st_province']=="NB" ? 'selected':''}} value="NB">New Brunswick</option>
                                            <option {{$user[0]['usr_st_province']=="NL" ? 'selected':''}} value="NL">Newfoundland and Labrador</option>
                                            <option {{$user[0]['usr_st_province']=="NS" ? 'selected':''}} value="NS">Nova Scotia</option>
                                            <option {{$user[0]['usr_st_province']=="ON" ? 'selected':''}} value="ON">Ontario</option>
                                            <option {{$user[0]['usr_st_province']=="PE" ? 'selected':''}} value="PE">Prince Edward Island</option>
                                            <option {{$user[0]['usr_st_province']=="QC" ? 'selected':''}} value="QC">Quebec</option>
                                            <option {{$user[0]['usr_st_province']=="SK" ? 'selected':''}} value="SK">Saskatchewan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="city" class="control-label">City*</label>
                                        <input type="text" value="{{$user[0]['usr_st_city']}}" class="form-control" name="city" id="city">
                                    </div>

                                </div>
                                <div class="btn-area mt30">
                                    <button class="btn btn-primary" type="submit">Save Change</button>
                                </div>

                            </div>
                        </div>
                    </form>

                    <form method="post" action="{{ route('password.reset') }}">
                        {{ csrf_field() }}
                            <div class="dashboardBoxBg mt30">
                                <div class="profileIntro">
                                    <h3>Update password</h3>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <label for="currentPassword">Current Password</label>
                                            <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                                   placeholder="********">
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <label for="password">New Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="New Password">
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                                   placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group col-xs-12">
                                            <button class="btn btn-primary" type="submit">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footerWhite">
        <!-- FOOTER INFO -->
        <div class="clearfix footerInfo">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-xs-12">
                        <div class="footerText">
                            <a href="index.php" class="footerLogo"><img src="img/logo-drunkenmonkey.png"
                                                                        alt="Footer Logo"></a>
                            <p>Information about the team</p>
                            <ul class="list-styled list-contact">
                                <li><i class="fa fa-phone" aria-hidden="true"></i>[88] 657 524 332</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@listy.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-12">
                        <div class="footerInfoTitle">
                            <h4>Links</h4>
                        </div>
                        <div class="useLink">
                            <ul class="list-unstyled">
                                @if(Session::has('email'))
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('cocktail/main') }}">Cocktails</a></li>
                                    <li><a href="{{ url('about-us') }}">About us</a></li>
                                    <li><a href="{{ url('profile') }}">Profile</a></li>
                                    <li><a href="{{ url('profile') }}">Wish List</a></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
                                @else
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('cocktail/main') }}">Cocktails</a></li>
                                    <li><a href="{{ url('about-us') }}">About us</a></li>
                                    <li><a href="{{ route('login') }}">Sign in</a></li>
                                    <li><a href="{{ route('register') }}">Sign up</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- COPY RIGHT -->
        <div class="clearfix copyRight">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="copyRightWrapper">
                            <div class="row">
                                <div class="col-sm-5 col-sm-push-7 col-xs-12">

                                </div>
                                <div class="col-sm-7 col-sm-pull-5 col-xs-12">
                                    <div class="copyRightText">
                                        <p>Copyright &copy; 2017. All Rights Reserved by <a
                                                    href="http://www.iamabdus.com/" target="_blank">Code4Life</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
</div>

<!-- LOGIN  MODAL -->
<div id="loginModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log In to your Account</h4>
            </div>
            <div class="modal-body">
                <form class="loginForm">
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control" id="pwd" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                        <a href="password.html" class="pull-right link">Forgot Password?</a>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <p>Don’t have an Account? <a href="sign-up.html" class="link">Sign up</a></p>
            </div>
        </div>

    </div>
</div>

<!-- JAVASCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<script src="plugins/waypoints/waypoints.min.js"></script>
<script src="plugins/counter-up/jquery.counterup.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.min.js"></script>
<script src="plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
<script src="plugins/rwdtable/js/rwd-table.min.js"></script>
<script src="plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="plugins/isotope/isotope.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/isotope/isotope-triger.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script>
<script src="js/map.js"></script>

<script src="js/custom.js"></script>


</body>

</html>
