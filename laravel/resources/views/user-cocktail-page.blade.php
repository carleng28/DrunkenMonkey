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
                              <li class="active"><a href="{{ url('cocktail-main') }}">Cocktails </a></li>

                              <li class=""><a href="{{ url('about-us') }}">about us </a></li>

                          </ul>
                      </div>
                      <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>
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

                    <img src="{{ url('img/cocktail/img_not_available.png')}}" alt="Cocktail Image"
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
				</div>
            </div>
            <div class="col-xs-4">
                <h3>Ingredients: </h3>



                <div id="ingredients">

                    @foreach ($data['cocktail']->ingredients as $ingredient)
                        <h6>{{$ingredient->pivot->cki_st_measure}} of {{$ingredient->igr_st_name}}</h6>
                    @endforeach

                    {{--@if($data['cocktail']->strIngredient1 != "" && $data['cocktail']->strIngredient1 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure1) != "" ? $data['cocktail']->strMeasure1. " of" : '')  }} {{$data['cocktail']->strIngredient1}}--}}
                        {{--</h6>--}}
                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient2 != "" && $data['cocktail']->strIngredient2 != null)--}}

                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure2) != "" ? $data['cocktail']->strMeasure2. " of" : '')  }} {{$data['cocktail']->strIngredient2}}--}}
                        {{--</h6>--}}
                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient3 != "" && $data['cocktail']->strIngredient3 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure3) != "" ? $data['cocktail']->strMeasure3. " of" : '')  }} {{$data['cocktail']->strIngredient3}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient4 != "" && $data['cocktail']->strIngredient4 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure4) != "" ? $data['cocktail']->strMeasure4. " of" : '')  }} {{$data['cocktail']->strIngredient4}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient5 != "" && $data['cocktail']->strIngredient5 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure5) != "" ? $data['cocktail']->strMeasure5. " of" : '')  }} {{$data['cocktail']->strIngredient5}}--}}
                        {{--</h6>--}}
                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient6 != "" && $data['cocktail']->strIngredient6 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure6) != "" ? $data['cocktail']->strMeasure6. " of" : '')  }} {{$data['cocktail']->strIngredient6}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient7 != "" && $data['cocktail']->strIngredient7 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure7) != "" ? $data['cocktail']->strMeasure7. " of" : '')  }} {{$data['cocktail']->strIngredient7}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient8 != "" && $data['cocktail']->strIngredient8 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure8) != "" ? $data['cocktail']->strMeasure8. " of" : '')  }} {{$data['cocktail']->strIngredient8}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient9 != "" && $data['cocktail']->strIngredient9 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure9) != "" ? $data['cocktail']->strMeasure9. " of" : '')  }} {{$data['cocktail']->strIngredient9}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient10 != "" && $data['cocktail']->strIngredient10 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure10) != "" ? $data['cocktail']->strMeasure10. " of" : '')  }} {{$data['cocktail']->strIngredient10}}--}}
                        {{--</h6>--}}
                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient11 != "" && $data['cocktail']->strIngredient11 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure11) != "" ? $data['cocktail']->strMeasure11. " of" : '')  }} {{$data['cocktail']->strIngredient11}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient12 != "" && $data['cocktail']->strIngredient12 != null)--}}
                        {{--<h6>--}}
                            {{--{{(trim($data['cocktail']->strMeasure12) != "" ? $data['cocktail']->strMeasure12. " of" : '')  }} {{$data['cocktail']->strIngredient12}}--}}
                        {{--</h6>--}}


                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient13 != "" && $data['cocktail']->strIngredient13 != null)--}}

                        {{--<h6>--}}
                            {{--{{ $data['cocktail']->strMeasure13 }} of {{$data['cocktail']->strIngredient13}}--}}
                        {{--</h6>--}}
                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient14 != "" && $data['cocktail']->strIngredient14 != null)--}}

                        {{--<h6>--}}
                            {{--{{ $data['cocktail']->strMeasure14 }} of {{$data['cocktail']->strIngredient14}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}
                    {{--@if($data['cocktail']->strIngredient15 != "" && $data['cocktail']->strIngredient15 != null)--}}
                        {{--<h6>--}}
                            {{--{{ $data['cocktail']->strMeasure15 }} of {{$data['cocktail']->strIngredient15}}--}}
                        {{--</h6>--}}

                    {{--@endif--}}

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

