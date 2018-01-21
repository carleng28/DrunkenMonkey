@include('header')
<head>
    <title>WishList | DrunkenMonkey</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>

<body>
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


<!-- LISTINGS SECTION -->
<section class="clearfix bg-dark listyPage">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-header text-center">
					<h2>My WishList</h2>
				</div>
				<table class="table listingsTable">
					<thead>
						<tr class="rowItem">
							<th data-priority="">Drinks</th>
							<th data-priority="2"></th>
							<th data-priority="6"></th>
							<th data-priority="1">Reviews</th>
							<th data-priority="3">Liked On</th>
							<th data-priority="4"></th>
							<th data-priority="5">Remove</th>
						</tr>
					</thead>
					<tbody>
						<tr class="rowItem">
							<td>
								<ul class="list-inline listingsInfo">
									<li><a href="#"><img src="img/dashboard/listing.jpg" alt="Image Listings"></a></li>
									<li>
										<h3>Glory Hole Doughnuts</h3>
										<h5>1569 Queen Street West <span class="cityName">Toronto</span></h5>
										<span class="cityName">Category: </span><span class="category">Restaurant</span>
										<p>From $50.00 /Night</p>
									</li>
								</ul>
							</td>
							<td></td>
							<td></td>
							<td>
								<ul class="list-inline rating">
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li>(9)</li>
								</ul>

							</td>
							<td>15/12/2016 <br>9.15am</td>
							<td></td>
							<td><span class="label label-warning">Pending</span></td>
						</tr>
						<tr class="rowItem">
							<td>
								<ul class="list-inline listingsInfo">
									<li><a href="#"><img src="img/dashboard/listing.jpg" alt="Image Listings"></a></li>
									<li>
										<h3>Glory Hole Doughnuts</h3>
										<h5>1569 Queen Street West <span class="cityName">Toronto</span></h5>
										<span class="cityName">Category: </span><span class="category">Restaurant</span>
										<p>From $50.00 /Night </p>
									</li>
								</ul>
							</td>
							<td></td>
							<td></td>
							<td>
								<ul class="list-inline rating">
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li>(9)</li>
								</ul>

							</td>
							<td>15/12/2016 <br>9.15am</td>
							<td></td>
							<td><span class="label label-success">Active</span></td>
						</tr>
					</tbody>
				</table>
				<div class="paginationCommon blogPagination text-center">
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

	<!-- FOOTER -->
	@include('footer-img')
</div>

@include('auth.login')
@include('js-load')

</body>

</html>
