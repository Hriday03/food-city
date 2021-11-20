<!DOCTYPE html>
<html>

@include('passenger.layouts.head', ['title' => 'Food-City: Passenger Order History'])

<body>
    @include('passenger.layouts.sidebar')

    @include('passenger.layouts.header')

    <div class="container">
        <nav aria-label="breadcrumb" style="margin-left: 9%;margin-top: 20px;width: 98%">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="">Order History</a></li>
            </ol>
        </nav>

        <div id="passenger-app" style="margin-top: 20px">
            <order-history></order-history>

            <order-details></order-details>

            <alert-tost></alert-tost>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ mix('/js/vueApp.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/passenger.js') }}"></script>
</body>
