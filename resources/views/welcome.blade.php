<!DOCTYPE html>
<html>

@include('layouts.head', ['title' => 'FoodCity-Home'])

<body>
    <div class="hero_area sub_pages">
        <!-- header section strats -->
        @include('layouts.header')
        <!-- end header section -->
    </div>

    <!-- slider section -->
    <section class=" slider_section position-relative">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="slider_item-box">
                        <div class="slider_item-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="slider_item-detail">
                                            <div>
                                                <h1>
                                                    Welcome to <br />
                                                    Food-City
                                                </h1>
                                                <p>
                                                    The one destination to fulfill all your <b>inter-city</b>
                                                    <b> food </b>cravings! Want the famous samosas from Bengal?
                                                    We've got it covered! Vada-pav from the streets of Mumbai? Consider
                                                    it done!
                                                    Cholle Kulche from Delhi? Easy Peasy!! Everything you want to have
                                                    is just a click
                                                    away from you! Ohh wait, there's more to the list! Want to earn
                                                    money for free? Register
                                                    as a passenger!
                                                </p>

                                                @if (!Auth::user())    
                                                    <div class="d-flex ">
                                                        <a href="login" class="text-uppercase custom_orange-btn mr-3"
                                                            style="width:200px">
                                                            Login as a customer
                                                        </a>
                                                        <a href="passenger_login" class="text-uppercase custom_dark-btn"
                                                            style="width:200px">
                                                            Login as a passenger
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="slider_img-box">
                                            <div>
                                                <img src="images/samosa.png" alt="" class="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider_item-box">
                        <div class="slider_item-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="slider_item-detail">
                                            <div>
                                                <h1>
                                                    Welcome to <br />
                                                    Food-City
                                                </h1>
                                                <p>
                                                    The one destination to fulfill all your <b>inter-city</b>
                                                    <b> food </b>cravings! Want the famous samosas from Bengal?
                                                    We've got it covered! Vada-pav from the streets of Mumbai? Consider
                                                    it done!
                                                    Cholle Kulche from Delhi? Easy Peasy!! Everything you want to have
                                                    is just a click
                                                    away from you! Ohh wait, there's more to the list! Want to earn
                                                    money for free? Register
                                                    as a passenger!
                                                </p>
                                                @if (!Auth::user())    
                                                    <div class="d-flex ">
                                                        <a href="login" class="text-uppercase custom_orange-btn mr-3"
                                                            style="width:200px">
                                                            Login as a customer
                                                        </a>
                                                        <a href="passenger_login" class="text-uppercase custom_dark-btn"
                                                            style="width:200px">
                                                            Login as a passenger
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="slider_img-box">
                                            <div>
                                                <img src="images/VP.png" alt="" class="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider_item-box">
                        <div class="slider_item-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="slider_item-detail">
                                            <div>
                                                <h1>
                                                    Welcome to <br />
                                                    Food-City
                                                </h1>
                                                <p>
                                                    The one destination to fulfill all your <b>inter-city</b>
                                                    <b> food </b>cravings! Want the famous samosas from Bengal?
                                                    We've got it covered! Vada-pav from the streets of Mumbai? Consider
                                                    it done!
                                                    Cholle Kulche from Delhi? Easy Peasy!! Everything you want to have
                                                    is just a click
                                                    away from you! Ohh wait, there's more to the list! Want to earn
                                                    money for free? Register
                                                    as a passenger!
                                                </p>
                                                @if (!Auth::user())    
                                                    <div class="d-flex ">
                                                        <a href="login" class="text-uppercase custom_orange-btn mr-3"
                                                            style="width:200px">
                                                            Login as a customer
                                                        </a>
                                                        <a href="passenger_login" class="text-uppercase custom_dark-btn"
                                                            style="width:200px">
                                                            Login as a passenger
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="slider_img-box">
                                            <div>
                                                <img src="images/CB.png" alt="" class="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom_carousel-control">
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    </div>
    <!-- end slider section -->

    @include('layouts.footer')
</body>
</html>
