@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center">
    <h2> Registration project Detail</h2>
      </div>

        <div class="container">
        {!! Form::open ([
            'route'=> 'projects.store',
            'method'=>'post'
            ]) !!}


        @include('projects.form')

            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            <td><a href="{{ route('projects.index')}}" class="btn btn-primary">Cancel</a></td>

    {!!Form::close()!!}
</div>
</div>
@endsection
