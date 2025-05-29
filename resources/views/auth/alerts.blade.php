@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('mesej-success'))
    <div class="alert alert-success">
        {{ session('mesej-success') }}
    </div>
@endif
