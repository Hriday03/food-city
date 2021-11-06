@if (count($errors) > 0)
    <div class="alert" style="color:red">
        All Errors..!
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
