@include('header')
<head>
    <title>Profile | DrunkenMonkey</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/cocktailstyle.css') }}">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var pathImageToShare;
    function showImg(a){
        document.getElementById('bigImg').src = a.src;
    }

    function loadFile(event) {
        var output = document.getElementById('thereImg');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    function sharePicture(){

        pathImageToShare=$("#bigImg").attr("src").replace("http://localhost:8000/", "");
        document.getElementById('pathToImage').setAttribute('value', pathImageToShare);
    }

</script>
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
                        <h2>My Images</h2>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD PROFILE SECTION -->
    <section class="clearfix bg-light profileSection">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
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
                    <div class="profileImage">
                        <form method="post" action="{{url('myImages-add')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <img width="200" height="200" src="{{ url('img/dashboard/no-image.svg') }}" alt="Your Photos" id="thereImg">
                            <div class="file-upload profileImageUpload">
                                <div class="upload-area">
                                    <input onchange="loadFile(event)" type="file" id="imageInput" name="imageInput" class="file">
                                    <button class="browse" type="button">You can upload photos in your profile <i class="icon-listy icon-upload"></i></button>
                                </div>

                                <button type="submit" class="btn" id="tasted" >Add Photo</button>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    @if(!empty($pictures[2]))

        @php $i = count($pictures); $i = $i-2; @endphp

        @if($i >= 3)
            @php $i = 3; @endphp
            <div class="row is-table-row" align="center">
                <div class="col-lg-6" id="ii" style="padding-right:0!important;" >
                    <div class="dashboardBoxBg mb30" id="iiii" >

        @else
             <div class="row is-table-row" align="center" style=" padding-left: 10%!important;
             padding-right: 10%!important;">
             <div class="col-lg-6" id="ii">
                 <div class="dashboardBoxBg mb30" id="iiii">
        @endif
             <div id="photos" style=" -webkit-column-count: <?php echo $i?>;">

        @foreach ($pictures as $pic)
            @if(!in_array($pic, $ignore))
                <div class="thumbnail">
                     <img src="{{ url($dirname.$pic) }}" alt="Images" onclick="showImg(this)"></img>
                </div>
            @endif
        @endforeach
            </div>
                 </div>
             </div>
                 @if($i>2)
                     <div class="col-md-6" id="iii"style="
                padding-left: 0!important;
                padding-top: 0!important;
                margin-top: 0!important;">
                         @if(!empty($pictures[2]))
                             <img src="{{ url($dirname.$pic) }}" id="bigImg" style="
                padding-left: 0!important;
                padding-top: 0!important;
                margin-top: 0!important;cursor:pointer;" onclick = "sharePicture()" data-toggle="modal" data-target="#shareModal">
                         @endif
                         @else
                             <div class="col-md-6" id="iii" style="

                margin-right: 10%!important;
                margin-top: 0!important;cursor:pointer;" onclick = "sharePicture()" data-toggle="modal" data-target="#shareModal">
                                 @if(!empty($pictures[2]))
                                     <img src="{{ url($dirname.$pic) }}" id="bigImg" style="
                                    /*margin-left: 8%!important;
                                    margin-right: 8%!important;*/">
                                 @endif
                                 @endif


                             </div>
                     </div>
    @endif

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
                                    <li><a href="{{ url('wishlist') }}">Wish List</a></li>
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
                                                    href="" target="_blank">Code4Life</a></p>
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

<!-- share  MODAL -->
<div id="shareModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Share this image with a friend</h4>
            </div>
            <div class="modal-body">
                <form class="loginForm" method="post" action="{{url('shareImage')}}">
                    {{csrf_field()}}
                    <input id="pathToImage" type="hidden" name="imagePath" value="">
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Share</button>
                    </div>

                </form>
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