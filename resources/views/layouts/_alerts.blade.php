
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible card" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('errors'))
    <div class="alert alert-danger alert-dismissible card" role="alert">
        @if ($errors->count() > 1)
            Errors: {{ $errors->count() }}
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ $errors->first() }}
        @endif
    </div>
@endif
