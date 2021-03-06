<!-- FOOTER -->

<footer style="background-image: url({{ url('img/background/bg-footer.jpg') }});">
    <!-- FOOTER INFO -->
    <div class="clearfix footerInfo">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-xs-12">
                    <div class="footerText">
                        <a href="{{ url('/') }}" class="footerLogo"><img src="{{ url('img/logo-drunkenmonkey.png') }}" alt="Footer Logo"></a>
                        <p>Information about the team</p>
                        <ul class="list-styled list-contact">
                            <li><i class="fa fa-phone" aria-hidden="true"></i>[88] 657 524 332</li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">info@listy.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                    <div class="footerInfoTitle">
                        <h4>Links</h4>
                    </div>
                    <div class="useLink">
                        <ul class="list-unstyled">
                            @if(Session::has('email'))
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('cocktail/main') }}">Cocktails</a></li>
                                <li><a href="{{ url('about-us') }}">About us</a></li>
                                <li><a href="{{ url('profile') }}">Profile</a></li>
                                <li><a href="{{ url('wishlist') }}">Wish List</a></li>
                                <li><a href="{{route('logout')}}">Logout</a></li>
                            @else
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('cocktail/main') }}">Cocktails</a></li>
                                <li><a href="{{ url('about-us') }}">About us</a></li>
                                <li><a href="{{ route('login') }}">Sign in</a></li>
                                <li><a href="{{ route('register') }}">Sign up</a></li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- COPY RIGHT -->
    <div class="clearfix copyRight">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyRightWrapper">
                        <div class="row">
                            <div class="col-sm-5 col-sm-push-7 col-xs-12">

                            </div>
                            <div class="col-sm-7 col-sm-pull-5 col-xs-12">
                                <div class="copyRightText">
                                    <p>Copyright &copy; 2017. All Rights Reserved by Code4Life</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
</div>


