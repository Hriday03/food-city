<!DOCTYPE html>
<html>

@include('layouts.head', ['title' => 'FoodCity-Account Activation'])

<body>
    <div class="hero_area sub_pages">
        <!-- header section strats -->
        @include('layouts.header')
        <!-- end header section -->
    </div>

    <!-- contact section -->
    <section class="contact_section4 layout_padding" style="background-image: unset">
        <div class="container" style="padding-top:20px">
            @if ($status == 1)
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="card">
                            <img src="images/success.gif" class="card-img-top" style="height:380px" alt="" />
                            <div class="card-body">
                                <h5 class="card-title">Account Status</h5>
                                <p class="card-text">
                                    {{ $msg }} <strong>{{ Auth::user()->email }}</strong>
                                    <br>
                                    <b>Created at:
                                        {{ Carbon\Carbon::parse(Auth::user()->created_at)->tz('Asia/kolkata')->format('d M, Y h:i a') }}</b>
                                </p>
                                <a href="/login" class="btn btn-success">View Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($status == -1) 
                <p style="display: flex">
                    <img src="images/alert.jpeg" alt="" style="height:50px; width:50px" />
                    <span class="font-weight-bold" style="font-size:xx-large; margin-left:10px;margin-top:2px">
                        {{ $msg }}
                    </span>
                </p>
            @else
                <div class="row" style="margin-top:20px">
                    <p style="display: flex">
                        <img src="images/alert.jpeg" alt="" style="height:50px; width:50px" />
                        <span class="font-weight-bold" style="font-size:xx-large; margin-left:10px;margin-top:2px">
                            Pending account activation
                        </span>
                    </p>
                    <p>
                        @include('success.msg')
                    </p>
                    <p>
                        {{ $msg }} <strong>{{ Auth::user()->email }}</strong>
                        <br>
                        <b>Created at:
                            {{ Carbon\Carbon::parse(Auth::user()->created_at)->tz('Asia/kolkata')->format('d M, Y h:i a') }}</b>
                    </p>
                    <hr>
                    <p>
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},<br> <a
                            href="/resend_verify_account">{{ __('click here to request another') }}</a>.
                    </p>
                </div>
            @endif
        </div>
    </section>
    <!-- end contact section -->

    @include('layouts.footer')
</body>

</html>
