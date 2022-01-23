<!DOCTYPE html>
<html>

@include('customer.layouts.head', ['title' => 'Food-City: Customer Home'])

<body>
    @include('customer.layouts.sidebar')

    @include('customer.layouts.header', ['title' => 'Food-City: Customer Home'])

    <div class="container">
        <div id="customer-app" style="margin-top: 20px">
            
        </div>
    </div>

    <script type="text/javascript" src="{{ mix('js/customer.js') }}"></script>
</body>
