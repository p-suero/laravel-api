@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Il mio profilo</h1>
            <p>
                <strong>Username:</strong> {{ Auth::user()->name }}
            </p>
            <p>
                <strong>Email:</strong> {{ Auth::user()->email }}
            </p>
            <p>
                @if(Auth::user()->api_token)
                    <strong>API token:</strong> {{ Auth::user()->api_token }}
                @else
                    <form action="{{ route('admin.token') }}" method="post">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Genera API token">
                    </form>
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
