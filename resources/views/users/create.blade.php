@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center">
    <h2> Registration User Detail</h2>
      </div>

        <div class="container">
        {!! Form::open ([
            'route'=> 'users.store',
            'method'=>'post'
            ]) !!}


        @include('users.form')

            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            <td><a href="{{ route('users.index')}}" class="btn btn-primary">Cancel</a></td>

    {!!Form::close()!!}
</div>
</div>
@endsection
