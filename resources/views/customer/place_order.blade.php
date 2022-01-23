<!DOCTYPE html>
<html>

@include('customer.layouts.head', ['title' => 'Food-City: Customer Place Order'])

<body>
    @include('customer.layouts.sidebar')

    @include('customer.layouts.header',['title' => 'Food-City: Customer Place Order'])

    <div class="container">
        <div id="customer-app">
            <place-order :user="{{Auth::user()}}"></place-order>
        </div>
    </div>

    <script type="text/javascript" src="{{ mix('js/customer.js') }}"></script>
</body>
