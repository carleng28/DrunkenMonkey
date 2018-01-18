@include('header')
<head>
	<title>Drinks Category | DrunkenMonkey</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">  </script>
</head>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>


<body class="body-wrapper">
  <div class="page-loader" style="background: url({{ url('/img/preloader.gif') }}) center no-repeat #fff;"></div>
  <div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">

      <!-- TOP INFO BAR -->
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
								<li class=""><a href="#">home</a></li>
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
										<li class=""><a href="#">home</a></li>
										<li class="active"><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
										<li class=""><a href="{{ url('about-us') }}">about us </a></li>
									</ul>

								</div>
								<button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal">Sign In</button>
							@endif
				</div>
				</div>
			</nav>
		</div>

    </header>

<!-- CATEGORY GRID SECTION -->
<section class="clerfix categoryGrid" id="section">
	<div class="container">
		<div class="row" id="center">
			<h2>{{ $data['categoryName'] }}</h2>
	</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="resultBar">
					<h2>We found <span>{{ $data['size'] }}</span> Results for you</h2>

					<span class="pull-right">
						Still want more? &nbsp;
						<a href="{{ url('cocktail/user-cocktails/'.explode("/",explode(" ",$data['categoryName'])[0])[0]) }}" >
						Check other user-created cocktails in this category
						</a>
					</span>

					@if($data['size']> 9)
						<div class="paginationCommon blogPagination categoryPagination" style="text-align: center;">
							<nav aria-label="Page navigation">
								<ul class="pagination">
									<li>
										<a href="#" aria-label="Previous" onclick="onClickPrevious('{{$data['originalCategory']}}')" style="line-height: 32px !important;height: auto;">
											<span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
										</a>
									</li>
									<li>
										<select id="selectPageBox" onchange="changePage('{{$data['originalCategory']}}');" class="form-control"
												style="width:auto;height:auto;display: inline;">
											@for ($i = 1; $i <= ceil($data['size']/9); $i++)
												<option value="{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</li>
									<li>
										<a href="#" aria-label="Next" onclick="onClickNext('{{$data['originalCategory']}}')" style="line-height: 32px !important;height: auto;">
											<span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
										</a>
									</li>
								</ul>

							</nav>
						</div>
					@endif
				</div>
				<div id="cocktailList" class="row">
					@foreach ($data['cocktails'] as $cocktail)
						<div class="col-sm-4"><div class="thingsBox thinsSpace">
								<div class="thingsImage"><img src="{{ $cocktail->strDrinkThumb }}" width="280" height="270"/>
									<div class="thingsMask">
										<a href="{{ url('cocktail/view/'.$cocktail->idDrink) }}">
											<h2> {{$cocktail->strDrink }}</h2>
										</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach

				</div>
			</div>

		</div>
	</div>
</section>

	  @include('footer-img')
  </div>


  @include('auth.login')
  @include('js-load')
  @include('pagination', ['url' => "/getpage/", 'divElement' => "#cocktailList"]);



</body>

</html>
