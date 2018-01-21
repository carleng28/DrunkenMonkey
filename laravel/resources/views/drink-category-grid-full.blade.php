	@include('header')
<head>
	<title>Drinks Category | DrunkenMonkey</title>
</head>

<!--hello-->
<!--cesar-->
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

			  @if(Session::has('email'))
				  <!-- Collect the nav links, forms, and other content for toggling -->
					  <div class="collapse navbar-collapse navbar-ex1-collapse">
						  <ul class="nav navbar-nav navbar-right">
							  <li class="active"><a href="{{ url('/') }}">home</a></li>
							  <li class=""><a href="{{ url('cocktail/main') }}">Cocktails </a></li>
							  <li class=""><a href="{{ url('about-us') }}">about us </a></li>
							  <li class=" dropdown singleDrop">
								  <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('fname')}} {{Session::get('lname')}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
					<h2>We found <span>{{$data['size']}}</span> Results for you</h2>
					<ul class="list-inline">
						<li class="active"><a href="{{ url('drink-category-grid-full') }}"><i class="fa fa-th" aria-hidden="true"></i></a></li>
						<li><a href="cocktail-category.php"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
					</ul>
				</div>

				<div class="row">
					@foreach ($data['drinks'] as $drink)
					<div class="col-sm-4 col-xs-12">
						<div class="thingsBox thinsSpace">
							<div class="thingsImage">
								<img src="{{ url($drink['image_thumb_url']) }}" alt="Image things">
								<div class="thingsMask">
									<a href={{url('drink-page/'.$drink['id'])}}><h2>{{$drink['name']}} <i class="fa fa-check-circle" aria-hidden="true"></i></h2></a>
									<p>{{$drink['description']}}</p>
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
				@endforeach

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
								@if($page>0)
								<a href="{{$page-1}}" aria-label="Previous">
								@endif
									<span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
								</a>
							</li>
@php
$pages=$data['total_pages'];

$blocks=round($pages/15);

@endphp
							@php
								$block=ceil($page/15);
								if($block<$blocks+1){
									$startpage=1+(($block-1)*15);
									$limit=(($block)*15)+1;}

								else{	
										$startpage=1+(($block-1)*15);
										$limit=$pages+1;
									}
							@endphp
						@for($i=$startpage;$i<$limit;$i++)
							<li @if($i==$page) @echo Class='active' @endif><a href="{{$i}}">{{$i}}</a></li>
						@endfor
							<li>
								<a href="@php
										if($page==$limit-1){
												$block++;
												echo $page+1;
												}else{
												echo $page+1;}
										@endphp" aria-label="Next">
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

  @include('auth.login')
  @include('js-load')

</body>

</html>

