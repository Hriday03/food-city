<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Food-City: Customer Registration</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area sub_pages">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logo.png" alt="" /><span>
                            FOOD-CITY
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="welcome">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="aboutUs"> About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contactUs"> Contact Us </a>
                                </li>

                            </ul>

                        </div>
                        <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                            <a href="user-type">
                                Create an Account
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

    </div>


    <!-- contact section -->
    <section class="contact_section2 layout_padding">
        <div class="container">
            <img src="images/hamburger.png" alt="" style="height:50px; width:50px" />
            <span class="font-weight-bold" style="font-size:xx-large; margin-left:20px">
                Hi Customer!
                Create your account
            </span>

            <div class="row">
                <div class="col-md-8 mr-auto">
                    <form>

                        <div class="contact_form-container">
                            <div>
                                <div>
                                    <input type="text" placeholder="Name">
                                </div>
                                <div>
                                    <input type="text" placeholder="Phone Number">
                                </div>
                                <div>
                                    <input type="email" placeholder="Email">
                                </div>
                                <div>
                                    <input type="password" placeholder="Password">
                                </div>


                                <div class="mt-5">
                                    <input type="text" placeholder="Address">
                                </div>
                                <div class="mt-5">
                                    <button type="submit">
                                        Create
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->





    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {
                lat: 40.645037,
                lng: -73.880224
            },
        });

        var image = 'images/maps-and-flags.png';
        var beachMarker = new google.maps.Marker({
            position: {
                lat: 40.645037,
                lng: -73.880224
            },
            map: map,
            icon: image
        });
    }
    </script>
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
    </script>
    <!-- end google map js -->
</body>

</html>