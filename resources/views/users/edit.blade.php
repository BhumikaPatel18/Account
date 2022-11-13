@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-uper">
    <div class="card-header">
        Edit Users Records
    </div>

    <div class="card-body">

        {!! Form::open([
            'route'=>['users.update',$user->id,'method'=>'post']
        ]) !!}

        @method('PATCH')
        @include('users.form')

        <button type="submit" class="btn btn-primary">Update Data</button>
        

        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
