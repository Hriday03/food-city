<!DOCTYPE html>
<html>

@include('passenger.layouts.head', ['title' => 'Food-City: Passenger wallet'])
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<body>
    @include('passenger.layouts.sidebar')

    <div class="container">
        <nav aria-label="breadcrumb" style="margin-left: 9%;margin-top: 20px;width: 98%">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="">wallet</a></li>
            </ol>
        </nav>
        <div id="passenger-app" style="margin-left: 8%;margin-top: 20px">
            <passenger-wallet :formatted-amount="{{$formattedAmount}}"></passenger-wallet>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ mix('/js/vueApp.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/passenger.js') }}"></script>
</body>
