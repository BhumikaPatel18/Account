@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-uper">
    <div class="card-header">
        Edit Records
    </div>

    <div class="card-body">

        {!! Form::open([
            'route'=>['contacts.update',$contact->id,'method'=>'post']
        ]) !!}

        @method('PATCH')
        @include('contacts.form')

        <button type="submit" class="btn btn-primary">Update Data</button>
        <button type="submit" class="btn btn-primary">Cancel</button>

        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
