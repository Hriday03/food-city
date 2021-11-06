<!DOCTYPE html>
<html>

@include('layouts.head', ['title' => 'FoodCity User Type '])

<body>
<div class="hero_area sub_pages">
        <!-- header section strats -->
        @include('layouts.header')
        <!-- end header section -->

    </div>
        <section class="service_section layout_padding ">
            <div class="container">
                <h2 class="custom_heading">Choose User-Type</h2>
                <p class="custom_heading-text">
                    Register either as a customer or as a passenger
                </p>
                <div class=" layout_padding2">
                    <div class="card-deck">

                        <div class="card">
                            <a href="register" style="color:black">
                                <img class="card-img-top" src="images/hamburger.png" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">Customer</h5>
                                    <p class="card-text">
                                        Register as a customer to benefit from a large variety
                                        of <b>food-items</b> that you can order from <b>anywhere in the
                                            country</b> with just a click of a button.
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="card">
                            <a href="passenger_register" style="color:black">
                                <img class="card-img-top" src="images/airplane.png" alt="Card image cap" />
                                <div class="card-body">
                                    <h5 class="card-title">Passenger</h5>
                                    <p class="card-text">
                                        Register as a passenger to<b> earn money by literally doing
                                            nothing.</b> You just have to carry a parcel with you during
                                        a journey you were <b>anyway pursuing</b>
                                    </p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="aboutUs" class="custom_dark-btn">
                        Read More
                    </a>
                </div>
            </div>
        </section>

        @include('layouts.footer')
</body>

</html>