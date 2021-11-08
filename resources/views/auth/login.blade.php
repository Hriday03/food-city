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
            <img src="images/hamburger.png" alt="" style="height:50px; width:50px" />

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
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input type="text" name="email" placeholder=" Enter your name">
                                </div>
                                <br>
                                <div>
                                    <input type="password" name="password" placeholder="Enter the Password">
                                </div>
                                <div class="mt-5">
                                    <button type="submit">
                                        Log in
                                    </button>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}"
                                        style="font-family: verdana;font-size: 17px">
                                        Forgot Password
                                    </a>
                                @endif
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
