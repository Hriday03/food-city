<!DOCTYPE html>
<html>

@include('passenger.layouts.head', ['title' => 'Food-City: passenger Profile'])

<body>
    @include('passenger.layouts.sidebar')

    @include('passenger.layouts.header')

    <div class="container">
        <nav aria-label="breadcrumb" style="margin-left: 9%;margin-top: 20px;width: 98%">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="">Passenger Profile</a></li>
            </ol>
        </nav>

        <div id="passenger-app" style="margin-top: 20px">
            <passenger-profile :user="{{Auth::user()}}"></passenger-profile>
        </div>
    </div>

    <script type="text/javascript" src="{{ mix('js/passenger.js') }}"></script>
</body>
