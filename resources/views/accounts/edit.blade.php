@extends('layouts.app')

@section('content')
@php
    $routeAction = "edit";
@endphp
<div class="container">
<div class="card">
    <div class="card-header">
        Edit Records
    </div>

    <div class="card-body">

        {!! Form::open([
            'route'=>['accounts.update',$account->id,'method'=>'post']
        ]) !!}

        @method('PATCH')
        @include('accounts.form')
        <br>
        <button type="submit" class="btn btn-primary">Update Data</button>
        <button type="submit" class="btn btn-primary">Cancel</button>

        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
