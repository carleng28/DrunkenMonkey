@include('header')
<head>
	<title>Drinks Category | DrunkenMonkey</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">  </script>
</head>


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
						<a class="navbar-brand" href="index.php"><img src="img/logo-drunkenmonkey.png" alt="logo"></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="index.php">home </a>

							</li>
							<li class="active"><a href="cocktail-main.html">Cocktails </a></li>

							<li class=""><a href="#">about us </a></li>

						</ul>
					</div>
					<button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>
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

				</div>
				<div id="cocktailList" class="row">
					@foreach ($data['cocktails'] as $cocktail)
						<div class="col-sm-4"><div class="thingsBox thinsSpace">
								<div class="thingsImage"><img src="{{ $cocktail->strDrinkThumb }}" width="280" height="270"/>
									<div class="thingsMask">
										<a href="#">
											<h2> {{$cocktail->strDrink }}</h2>
										</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach

				</div>
				<div class="paginationCommon blogPagination categoryPagination">
					<nav aria-label="Page navigation">
						<ul class="pagination">
							<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
								</a>
							</li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
									<span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
								</a>
							</li>
						</ul>
					</nav>
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
