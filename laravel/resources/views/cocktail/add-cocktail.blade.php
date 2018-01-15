@include('header')
<head>
    <title>Add Cocktail | DrukenMonkey</title>
<link rel="stylesheet" type="text/css" href="{{ url('/css/cocktailstyle.css') }}">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var counter = 1;
    var limit = 5;
    function showIngredient(divName){
        if (counter == limit)  {
        }
        else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "Ingredient " + (counter + 1) + " <br><input type='text' name='ingr"+(counter+1) +"' class='form-control'>";
            var newdivM = document.createElement('div');
            newdivM.innerHTML = "Measure " + (counter + 1) + " <br><input type='text' name='msr"+(counter+1) +"' class='form-control'>";
            document.getElementById(divName).appendChild(newdivM);
            document.getElementById(divName).appendChild(newdiv);
            counter++;
        }
    }

    var loadFile = function(event) {
        var output = document.getElementById('thereImg');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
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
                        </div>
                    {{--<button class="btn btn-default navbar-btn" type="button" ><a href="{{ url('/profile') }}">{{  Session::get('email') }}</a></button>--}}
                @else
                    <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class=""><a href="{{route('home')}}">home</a></li>
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


    <!-- PAGE TITLE SECTION -->
    <section class="clearfix paddingAdjustTopBottom">
        <ul class="list-inline listingImage">
            <li><img src="{{ url('img/listing/alcohol-bar-party-cocktail.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
            <li><img src="{{ url('img/listing/black-and-white-alcohol-bar-drinks.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
            <li><img src="{{ url('img/listing/bar-1839361_960_720.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
            <li><img src="{{ url('img/listing/pexels-photo-110472.jpeg') }}" alt="Image Listing" class="img-responsive"></li>
        </ul>
    </section>

    <!-- ADD COCKTAIL SECTION -->
    <section class="clearfix signUpSection">
        <div class="container">
            @if ($response==1)
                <div class="alert alert-success" style="text-align:center;">
                    <strong>Your cocktail has been created successfully!</strong>
                </div>
            @endif
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" style="text-align:center;">
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="signUpFormArea">
                        <div class="priceTableTitle">
                            <h2>Add Your Recipe of Cocktail</h2>
                            <p>Please fill out the fields below to add your cocktail.</p>
                        </div>
                        <div class="signUpForm">
                            <form action="{{ url('/cocktail/add-my-cocktail') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="formSection">
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <div class="profileImage">
                                                <img width="200" height="200" src="{{ url('img/dashboard/userCocktail.png') }}" alt="Your Cocktail" id="thereImg" class="img-circle">
                                                <div class="file-upload profileImageUpload">
                                                    <div class="upload-area">
                                                        <input onchange="loadFile(event)" type="file" id="imageInput" name="imageInput" class="file">
                                                        <button class="browse" type="button">Upload a Picture of the Cocktail <i class="icon-listy icon-upload"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xs-2"></div>
                                        <div class="form-group col-xs-8">
                                            <label for="cocktailName" class="control-label">Cocktail Name*</label>
                                            <input type="text" class="form-control" name="cocktailName">

                                            <form method="post">
                                            <div id="dynamicInput">
                                            Ingredient 1<br><input type="text" name="ingr1"  class="form-control">
                                            Measure 1<br><input type="text" name="msr1"  class="form-control">
                                            </div>
                                            <button class="btn" id="wish" type="button" onclick="showIngredient('dynamicInput')"  data-target="#"><span>More Ingredients</span></button>
                                            </form>
                                                <label for="lastName" class="control-label">Recipe*</label>
                                            <input type="text" class="form-control" name="recipe">
                                            <label for="emailAdress" class="control-label">Serve*</label>
                                            <input type="text" class="form-control" name="serve">
                                           <label for="gender" class="control-label">Category*</label>
                                            <select class="form-control" name="category">
                                                <?php foreach ($categories as $category) {?>
                                                <option value="{{$category->cgr_id_category}}">{{$category->cgr_st_name}}</option>
                                                <?php } ?>
                                            </select>
                                    </div>
                                            <div class="form-group col-xs-2"></div>
                                        </div>
                                        <div class="form-group col-xs-12 mb0">
                                            <button type="submit" class="btn btn-primary" >Create Cocktail</button>
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

@include('js-load')

</body>

</html>
