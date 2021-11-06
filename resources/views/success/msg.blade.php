@if (session()->has('message'))
    <div class="alert alert-success" style="background:white; color:green;padding:20px;margin-top:20px">
        {{ session()->get('message') }}
    </div>
@endif
