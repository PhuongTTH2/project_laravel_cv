@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <a id="logout" href="{{ route('logout') }}"><p class="glyphicon glyphicon-log-out"><span class="bold">Logout</span></p></a>
                    <br/>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
