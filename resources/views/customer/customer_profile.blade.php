<!DOCTYPE html>
<html>

@include('customer.layouts.head', ['title' => 'Food-City: Customer Profile'])

<body>
    @include('customer.layouts.sidebar')

    @include('customer.layouts.header', ['title' => 'Food-City: Customer Profile'])

    <div class="container">
        <div id="customer-app" style="margin-top: 20px">
            <customer-profile :user="{{Auth::user()}}"></customer-profile>
        </div>
    </div>

    <script type="text/javascript" src="{{ mix('js/customer.js') }}"></script>
</body>
