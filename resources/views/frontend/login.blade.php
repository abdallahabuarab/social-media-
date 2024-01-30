@extends('frontend.main_master')

@section('body')
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Orange</h1>
						<p>
							Orange is free to use for as long as you want with two active projects.
						</p>
						<div class="friend-logo">
							<span><img src="images/wink.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h2 class="log-title">Login</h2>
							<p>
								Don’t use Orange Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
							<div class="form-group">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">
                                <input id="password" type="password" class="" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							  <label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <i class="check-box"></i>Always Remember Me.
							  </label>
							</div>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" title="" class="forgot-pwd">Forgot Password?</a>

                            @endif
							<div class="submit-btns">
								<button class="mtr-btn signin" type="submit"><span>Login</span></button>
                                {{-- @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" title="" class="forgot-pwd">Forgot Password?</a>

                                @endif --}}
								<button class="mtr-btn signup" type="button"><span>Register</span></button>
							</div>
						</form>
					</div>
					<div class="log-reg-area reg">
						<h2 class="log-title">Register</h2>
							<p>
								Don’t use Orange Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
							<div class="form-group">
                                <input id="name" type="text" class="" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  <label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">
                                <input id="password" type="password" class="" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>

							<div class="form-group">
                                <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
							  <label class="control-label" for="input"> Confirm password</label>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Accept Terms & Conditions ?
							  </label>
							</div>
							<a href="#" title="" class="already-have">Already have an account</a>
							<div class="submit-btns">
								<input type="submit" class="mtr-btn signup">
                                  {{-- <span style="color: white;">register </span> --}}
                                {{-- </button> --}}
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        @if($errors->any())
        <ul>
        @foreach ($errors->all() as $key )
            <li>{{$key}}</li>

        @endforeach
        </ul>
        @endif
	</div>
</div>


@endsection
