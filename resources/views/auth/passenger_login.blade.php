<!DOCTYPE html>
<html>

@include('layouts.head', ['title' => 'Food-City: Passenger LogIn'])

<body>
    <div class="hero_area sub_pages">
        <!-- header section strats -->
        @include('layouts.header')
        <!-- end header section -->
    </div>


    <!-- contact section -->
    <section class="contact_section1 layout_padding">
        <div class="container">
            <img src="images/airplane.png" alt="" style="height:50px; width:50px" />
            <span class="font-weight-bold" style="font-size:xx-large; margin-left:20px">
                Welcome back Passenger!
            </span>

            @include('errors.show_errors')

            <div class="row">
                <div class="col-md-8 mr-auto">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input type="text" name="email" placeholder="Enter your Name">
                                </div>
                                <br>
                                <div>
                                    <input type="password" name="password" placeholder="Enter the Password">
                                </div>
                                <div class="mt-5">
                                    <button type="submit">
                                        LOG IN
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
