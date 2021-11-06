<!DOCTYPE html>
<html>

@include('layouts.head', ['title' => 'FOOD-CITY: Passenger Registration'])

<body>
    <div class="hero_area sub_pages">
        <!-- header section strats -->
        @include('layouts.header')
        <!-- end header section -->

    </div>


    <!-- contact section -->
    <section class="contact_section3 layout_padding">
        <div class="container">
            <img src="images/airplane.png" alt="" style="height:50px; width:50px" />
            <span class="font-weight-bold" style="font-size:xx-large; margin-left:20px">
                Hi Passenger!
                Create your account
            </span>

            <div class="row" style="margin-top:40px;">
                <div class="col-6">
                    @include('errors.show_errors')
                </div>
            </div>


            <div class="row">
                <div class="col-md-8 mr-auto">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <input type="hidden" name="token" value="2" />

                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input type="text" placeholder="Name" name="name">
                                </div>

                                <div>
                                    <input type="text" placeholder="Phone Number" name="phone">
                                </div>

                                <div>
                                    <input type="email" placeholder="Email" name="email">
                                </div>

                                <div>
                                    <input type="password" placeholder="Password" name="password">
                                </div>

                                <div>
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                </div>

                                <div>
                                    <input type="text" placeholder="Address" name="address">
                                </div>

                                <br><br>

                                <div class="form-group row mb-0">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
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