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
            <passenger-wallet :formatted-amount="{{ $formattedAmount }}"></passenger-wallet>
        </div>

        <div class="card" style="margin-left: 10%;margin-top: 40px;padding:10px">
            <h4 style="margin-left:4px">Wallet history</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl No:</th>
                        <th style="text-align:center" scope="col">Amount</th>
                        <th style="text-align:center" scope="col">Is Redeem?</th>
                        <th style="text-align:right" scope="col"> Redeem Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $key => $his)    
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td style="text-align:center">Rs {{$his->points}}/-</td>
                            <td style="text-align:center">{{$his->is_redeem ? 'true' : 'false'}}</td>
                            <td style="text-align:right">{{ Carbon\Carbon::parse($his->created_at)->tz('Asia/kolkata')->format('D d, M Y h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ mix('/js/vueApp.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/passenger.js') }}"></script>
</body>
