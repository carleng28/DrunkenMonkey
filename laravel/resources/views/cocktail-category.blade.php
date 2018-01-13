@include('header')
<head>
	<title>Drinks Category | DrunkenMonkey</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">  </script>
</head>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script>
    function changePage(category){
        var selectBox = document.getElementById("selectPageBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var category = category.split('%20')[0];
        $.ajax({
            type:'GET',
            url: '/getpage/'+category+'/'+selectedValue,
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data){
                //$("#msg").html(data.msg);
				$("#cocktailList").html(data.data.cocktails);
                for (i = 0; i < data.data.cocktails.length; i++) {

                    $("#cocktailList").append('<div class="col-sm-4"><div class="thingsBox thinsSpace">' +
						'<div class="thingsImage"><img src="'+data.data.cocktails[i].strDrinkThumb+'" width="280" height="270"/>' +
						'<div class="thingsMask"> <a href=../cocktail-page/'+data.data.cocktails[i].idDrink+' >' +
						'<h2>'+ data.data.cocktails[i].strDrink+'</h2></a></div> </div> </div> </div>');

				}

            }
        });
    }
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
								<li class="active"><a href="{{ url('cocktail-main') }}">Cocktails </a></li>
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
						{{--<button class="btn btn-default navbar-btn" type="button" ><a href="{{ url('/profile') }}">{{  Session::get('email') }}</a></button>--}}
						@else
							<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav navbar-right">
										<li class=""><a href="#">home</a></li>
										<li class="active"><a href="{{ url('cocktail-main') }}">Cocktails </a></li>
										<li class=""><a href="{{ url('about-us') }}">about us </a></li>
									</ul>

								</div>
								<button class="btn btn-default navbar-btn" type="button" data-toggle="modal" data-target="#loginModal"><span>Sign In</span></button>
							@endif
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
						<a href="{{ url('user-cocktails/'.implode("-",explode("/",str_replace(' ','',$data['categoryName'])))) }}" >
						Check other user-created cocktails in this category
						</a>
					</span>

					@if($data['size']> 9)
						<div class="paginationCommon blogPagination categoryPagination" style="text-align: center;">
							<nav aria-label="Page navigation">
								<ul class="pagination">
									<li>
										<a href="#" aria-label="Previous">
											<span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
										</a>
									</li>
								<li>Page<li>
									<li>
										<select id="selectPageBox" onchange="changePage('{{$data['originalCategory']}}');" class="form-control"
												style="width:auto;height:auto;display: inline;">
											@for ($i = 1; $i <= ceil($data['size']/9); $i++)
												<option value="{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
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
										<a href="{{ url('cocktail-page/'.$cocktail->idDrink) }}">
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



</body>

</html>
