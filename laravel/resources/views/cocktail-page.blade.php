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

                  @if(Session::has('email'))
                      <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class="collapse navbar-collapse navbar-ex1-collapse">
                              <ul class="nav navbar-nav navbar-right">
                                  <li class="active"><a href="{{ url('/') }}">home</a></li>
                                  <li class=""><a href="{{ url('cocktail-main') }}">Cocktails </a></li>
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
                                          <li class="active"><a href="#">home</a></li>
                                          <li class=""><a href="{{ url('cocktail-main') }}">Cocktails </a></li>
                                          <li class=""><a href="{{ url('about-us') }}">about us </a></li>
                                      </ul>

                                  </div>
                                  <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal">Sign In</button>
                              @endif

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

                    <img src="{{ $data['cocktail']->strDrinkThumb }}" alt="Cocktail Image"
                         class="img-responsive" width="400" height="400">
                </div>
            </div>
            <div class="col-xs-4">
				<div id="Cocktail">
                    <div class="CocktailName">
                        <h2> {{ $data['cocktail']->strDrink }}</h2>
                    </div>
                    <div class="CoctailRecipe">
                        <h3>Recipe: </h3>
                        <p> {{ $data['cocktail']->strInstructions }}</p>
                    </div>
                    <div class="ServeGlass">
                        <h3>Serve: </h3>
                        <p>{{ $data['cocktail']->strGlass }}</p>

                    </div>
				</div>
            </div>
            <div class="col-xs-4">
                <h3>Ingredients: </h3>
                <div id="ingredientsIMAGES">
                    @if($data['cocktail']->strIngredient1 != "" && $data['cocktail']->strIngredient1 != null)
                            <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient1.".png")}}"
                                 width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient2 != "" && $data['cocktail']->strIngredient2 != null)

                            <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient2.".png")}}"
                                 width="100" height="100" >
                    @endif
                    @if($data['cocktail']->strIngredient3 != "" && $data['cocktail']->strIngredient3 != null)


                            <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient3.".png")}}"
                                 width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient4 != "" && $data['cocktail']->strIngredient4 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient4.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient5 != "" && $data['cocktail']->strIngredient5 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient5.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient6 != "" && $data['cocktail']->strIngredient6 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient6.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient7 != "" && $data['cocktail']->strIngredient7 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient7.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient8 != "" && $data['cocktail']->strIngredient8 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient8.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient9 != "" && $data['cocktail']->strIngredient9 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient9.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient10 != "" && $data['cocktail']->strIngredient10 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient10.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient11 != "" && $data['cocktail']->strIngredient11 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient11.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient12 != "" && $data['cocktail']->strIngredient12 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient12.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient13 != "" && $data['cocktail']->strIngredient13 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient13.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient14 != "" && $data['cocktail']->strIngredient14 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient14.".png")}}"
                             width="100" height="100" >

                    @endif
                    @if($data['cocktail']->strIngredient15 != "" && $data['cocktail']->strIngredient15 != null)


                        <img src="{{ url('http://www.thecocktaildb.com/images/ingredients/'.$data['cocktail']->strIngredient15.".png")}}"
                             width="100" height="100" >

                    @endif
                </div>


                <div id="ingredients">

                    @if($data['cocktail']->strIngredient1 != "" && $data['cocktail']->strIngredient1 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure1) != "" ? $data['cocktail']->strMeasure1. " of" : '')  }} {{$data['cocktail']->strIngredient1}}
                        </h6>
                    @endif
                    @if($data['cocktail']->strIngredient2 != "" && $data['cocktail']->strIngredient2 != null)

                        <h6>
                            {{(trim($data['cocktail']->strMeasure2) != "" ? $data['cocktail']->strMeasure2. " of" : '')  }} {{$data['cocktail']->strIngredient2}}
                        </h6>
                    @endif
                    @if($data['cocktail']->strIngredient3 != "" && $data['cocktail']->strIngredient3 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure3) != "" ? $data['cocktail']->strMeasure3. " of" : '')  }} {{$data['cocktail']->strIngredient3}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient4 != "" && $data['cocktail']->strIngredient4 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure4) != "" ? $data['cocktail']->strMeasure4. " of" : '')  }} {{$data['cocktail']->strIngredient4}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient5 != "" && $data['cocktail']->strIngredient5 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure5) != "" ? $data['cocktail']->strMeasure5. " of" : '')  }} {{$data['cocktail']->strIngredient5}}
                        </h6>
                    @endif
                    @if($data['cocktail']->strIngredient6 != "" && $data['cocktail']->strIngredient6 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure6) != "" ? $data['cocktail']->strMeasure6. " of" : '')  }} {{$data['cocktail']->strIngredient6}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient7 != "" && $data['cocktail']->strIngredient7 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure7) != "" ? $data['cocktail']->strMeasure7. " of" : '')  }} {{$data['cocktail']->strIngredient7}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient8 != "" && $data['cocktail']->strIngredient8 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure8) != "" ? $data['cocktail']->strMeasure8. " of" : '')  }} {{$data['cocktail']->strIngredient8}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient9 != "" && $data['cocktail']->strIngredient9 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure9) != "" ? $data['cocktail']->strMeasure9. " of" : '')  }} {{$data['cocktail']->strIngredient9}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient10 != "" && $data['cocktail']->strIngredient10 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure10) != "" ? $data['cocktail']->strMeasure10. " of" : '')  }} {{$data['cocktail']->strIngredient10}}
                        </h6>
                    @endif
                    @if($data['cocktail']->strIngredient11 != "" && $data['cocktail']->strIngredient11 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure11) != "" ? $data['cocktail']->strMeasure11. " of" : '')  }} {{$data['cocktail']->strIngredient11}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient12 != "" && $data['cocktail']->strIngredient12 != null)
                        <h6>
                            {{(trim($data['cocktail']->strMeasure12) != "" ? $data['cocktail']->strMeasure12. " of" : '')  }} {{$data['cocktail']->strIngredient12}}
                        </h6>


                    @endif
                    @if($data['cocktail']->strIngredient13 != "" && $data['cocktail']->strIngredient13 != null)

                        <h6>
                            {{ $data['cocktail']->strMeasure13 }} of {{$data['cocktail']->strIngredient13}}
                        </h6>
                    @endif
                    @if($data['cocktail']->strIngredient14 != "" && $data['cocktail']->strIngredient14 != null)

                        <h6>
                            {{ $data['cocktail']->strMeasure14 }} of {{$data['cocktail']->strIngredient14}}
                        </h6>

                    @endif
                    @if($data['cocktail']->strIngredient15 != "" && $data['cocktail']->strIngredient15 != null)
                        <h6>
                            {{ $data['cocktail']->strMeasure15 }} of {{$data['cocktail']->strIngredient15}}
                        </h6>

                    @endif

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

