<!DOCTYPE html>
<html>

@include('layouts.head', ['title' => 'FoodCity - Customer LogIn'])

<body>
    <div class="hero_area sub_pages">
        <!-- header section strats -->
        @include('layouts.header')
        <!-- end header section -->
    </div>


    <!-- contact section -->
    <section class="contact_section layout_padding">
        <div class="container">
            <img src="../../images/hamburger.png" alt="" style="height:50px; width:50px" />

            <span class="font-weight-bold" style="font-size:xx-large; margin-left:20px">
                Welcome back Customer!
            </span>

            <div class="row" style="margin-top:40px;">
                <div class="col-6">
                    @include('errors.show_errors')
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mr-auto">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->

    @include('layouts.footer')
</body>

</html>
