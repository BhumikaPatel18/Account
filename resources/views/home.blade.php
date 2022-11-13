@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="card-body text-center">
                    <a href="{{ route('accounts.index')}}" class="btn btn-primary ">Account</a>
                    <a href="{{ route('contacts.index')}}" class="btn btn-primary ">Contact</a>
                    <a href="{{ route('projects.index')}}" class="btn btn-primary ">Project</a>
                    <a href="{{ route('users.index')}}" class="btn btn-primary ">User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection
