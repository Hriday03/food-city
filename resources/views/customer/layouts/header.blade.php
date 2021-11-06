<div class="sidenav">
    <a class="navbar-brand" href="welcome">
        <img src="images/logo.png" alt="" /><span style="color:white">
            FOOD-CITY
        </span>
    </a>
    <a href="#about">Order History</a>
    <a href="#services">My Addresses</a>
    <a href="#clients">Favourite orders</a>
    
    <img src="images/hamburger.png" alt="" style="height:160px; width:160px; margin-left:19px; position: fixed;bottom:0" />
</div>

<div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
                <a class="navbar-brand" href="" style="margin-left:80px">
                    <img src="images/hamburger.png" alt="" /><span>
                        Customer Home Page
                    </span>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="welcome">
                                    Home <span class="sr-only">(current)</span>
                                </a>
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
                        <a href="{{ route('logout') }}">
                            Log Out
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
