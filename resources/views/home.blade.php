@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <script>
                        @if(Auth::user()->level == 'admin')
                            window.location.href = '/admin';
                        @endif
                        @if(Auth::user()->level == 'petugas')
                            window.location.href = '/petugas';
                        @endif
                        @if(Auth::user()->level == 'masyarakat')
                            window.location.href = '/';
                        @endif
                    </script>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
