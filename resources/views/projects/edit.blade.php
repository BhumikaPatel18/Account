@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-uper">
    <div class="card-header">
        Edit Project Records
    </div>

    <div class="card-body">

        {!! Form::open([
            'route'=>['projects.update',$project->id,'method'=>'post']
        ]) !!}

        @method('PATCH')
        @include('projects.form')

        <button type="submit" class="btn btn-primary">Update Data</button>
        <button type="submit" class="btn btn-primary">Cancel</button>

        {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
