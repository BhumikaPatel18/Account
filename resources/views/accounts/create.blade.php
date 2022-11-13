@extends('layouts.app')

@section('content')
@php
    $routeAction = "create";
@endphp
<div class="container">

    <div class="text-center">
    <h2>Registration</h2>
      </div>

        <div class="container">
        {!! Form::open ([
            'route'=> 'accounts.store',
            'method'=>'post'
            ]) !!}


        @include('accounts.form')

            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            <td><a href="{{ route('accounts.index')}}" class="btn btn-primary">Cancel</a></td>

    {!!Form::close()!!}
</div>
</div>
@endsection
