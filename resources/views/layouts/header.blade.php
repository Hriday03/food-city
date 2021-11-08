<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="/">
                <img src="../../images/logo.png" alt="" /><span>
                    FOODCITY
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="/welcome">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/aboutUs"> About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contactUs"> Contact Us </a>
                        </li>

                    </ul>

                </div>
                <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
                    @if (Auth::user())
                        @if (Auth::user()->isCustomer())
                            <a href="/customer/home">
                                Account
                            </a>
                        @else
                            <a href="/passenger/home">
                                Account
                            </a>
                        @endif
                    @else
                        <a href="user-type">
                            Create an Account
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>
