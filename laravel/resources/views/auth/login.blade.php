<!-- LOGIN  MODAL -->
<div id="loginModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Log In to your Account</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="post" class="loginForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control" name="email" placeholder="Email"  value="{{ old('email') }}">
                        {{--Check comment--}}

                    </div>
                    <div class="form-group ">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control" name="password" placeholder="Password">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <div class="checkbox">
                        <label style="visibility: hidden"><input type="checkbox"> Remember me</label>
                        <a href="{{ route('forgot') }}" class="pull-right link">Forgot Password?</a>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <p>Don’t have an Account? <a href="{{ route('register') }}" class="link">Sign up</a></p>
            </div>
        </div>

    </div>
</div>