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
							<th data-priority="2">Category</th>
							<th data-priority="6"></th>
							<th data-priority="1">Price</th>
							<th data-priority="3"></th>
							<th data-priority="4"></th>
							<th data-priority="5">Remove</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data['drinks'] as $drink)
							<tr class="rowItem">
								<td>
									<ul class="list-inline listingsInfo">
										<li><a href={{url('drink-page/'.$drink['id'])}}><img height="135" width="200" src="{{ url($drink['image_thumb_url']) }}" alt="Image Listings"></a></li>
										<li>
											<h3><a href={{url('drink-page/'.$drink['id'])}}>{{$drink['name']}}</a></h3>
											<span class="cityName">Description: </span><span class="category">{{ $drink['package_unit_volume_in_milliliters']}} mL {{$drink['package_unit_type']}}</span><br>
											<span class="cityName">Alcohol/Vol: </span><span class="category">{{ $drink['alcohol_content']}}</span><br>
											<span class="cityName">Made in: </span><span class="category">{{ $drink['origin']}}</span><br>
										</li>
									</ul>
								</td>
								<td><a href="{{ url('drink-category-grid-full/'.$drink['primary_category']) }}">{{ $drink['primary_category']}}</a></td>
								<td></td>
								<td>{{ $drink['price_in_cents']}} {{$drink['package_unit_type']}} / {{$drink['total_package_units']}}. units</td>
								<td></td>
								<td></td>
								<td><a class="label btn-primary" width="63" height="21" href="{{ url('wishlist/deleteDrink',$drink['id']) }}" role="button">Remove</a></td>
							</tr>
						@endforeach
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
