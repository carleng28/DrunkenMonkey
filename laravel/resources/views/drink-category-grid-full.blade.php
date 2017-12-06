@include('header')
<head>
	<title>Drinks Category | DrunkenMonkey</title>
</head>


<body class="body-wrapper">
  <div class="page-loader" style="background: url({{ url('/img/preloader.gif') }}) center no-repeat #fff;"></div>
  <div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">

      <!-- TOP INFO BAR -->

      <div class="nav-wrapper navbarWhite">

        <!-- NAVBAR -->
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
						  <li class=""><a href="{{ url('cocktail-main') }}">Cocktails </a></li>

						  <li><a href="{{ url('about-us') }}">about us </a></li>

					  </ul>
				  </div>
				  <button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>ton>
			  </div>
		  </nav>
      </div>
    </header>


<!--&lt;!&ndash; MAP SECTION &ndash;&gt;-->
<!--<section class="clearfix p0">-->
	<!--<div id="map-canvas"></div>-->
<!--</section>-->

<!-- CATEGORY GRID SECTION -->
<section class="clerfix categoryGrid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="resultBar">
					<h2>We found <span>8</span> Results for you</h2>
					<ul class="list-inline">
						<li class="active"><a href="{{ url('drink-category-grid-full') }}"><i class="fa fa-th" aria-hidden="true"></i></a></li>
						<li><a href="cocktail-category.php"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="{{ url('img/drinks-category/tequila.png') }}" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef description of the drink</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="{{ url('img/drinks-category/beer.png') }}" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef Description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="{{ url('img/drinks-category/vodka.png') }}" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="{{ url('img/drinks-category/wine.png') }}" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="{{ url('img/drinks-category/vodka.png') }}" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="{{ url('img/drinks-category/licor.png') }}" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>breef description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="i" alt="Image things">
								<div class="thingsMask">
									<ul class="list-inline rating">
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
									</ul>
									<a href="drink-page.html"><h2>The City Theater <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>reef description</p>
								</div>
							</div>
							<div class="thingsCaption ">
								<ul class="list-inline captionItem">
									<!--<li><i class="fa fa-heart-o" aria-hidden="true"></i> 10 k</li>-->
									<!--<li><a href="category-list-left.html">Hotel, Restaurant</a></li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div class="sidebarInner sidebarCategory mt20 pull-left">
							<div class="panel panel-default">
								<div class="panel-heading">Find Location</div>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="What are you looking for?" aria-describedby="basic-addon2">
									<a href="#" class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="sidebarInner sidebarCategory mt20 pull-left">
							<div class="panel panel-default">
								<div class="panel-heading">Filter by Area</div>
								<div class="panel-body">
									<ul class="list-unstyle categoryList">
										<li><a href="#">Tequila</a></li>
										<li><a href="#">Beer</a></li>
										<li><a href="#">Ron</a></li>
										<li><a href="#">wiskie</a></li>
										<li><a href="#">Licor</a></li>
										<li><a href="#">Vodka</a></li>

									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-xs-12">
						<div class="sidebarInner sidebarCategory mt20 pull-left">
							<div class="panel panel-default">
								<div class="panel-heading">Related Categories</div>
								<div class="panel-body">
									<ul class="list-unstyle categoryList">
										<li><a href="#">Fast food</a></li>
										<li><a href="#">Chinese restaurants</a></li>
										<li><a href="#">Creole restaurants</a></li>
										<li><a href="#">Seafood</a></li>
										<li><a href="#">Thai restaurants</a></li>
										<li><a href="#">Street food</a></li>
										<li><a href="#">Japanese restaurants</a></li>
										<li><a href="#">Greek restaurants</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
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

