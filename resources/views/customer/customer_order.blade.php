<!DOCTYPE html>
<html>

@include('customer.layouts.head', ['title' => 'Food-City: Customer Order History'])

<body>
    @include('customer.layouts.sidebar')

    @include('customer.layouts.header')

    <div class="container">
        <div id="customer-app" style="margin-top: 20px">
            <order-history></order-history>

            <order-details></order-details>

            <alert-tost></alert-tost>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ mix('/js/vueApp.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/customer.js') }}"></script>
</body>
