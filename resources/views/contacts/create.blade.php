@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center">
    <h2>Contact Registration</h2>
      </div>

        <div class="container">
        {!! Form::open ([
            'route'=> 'contacts.store',
            'method'=>'post'
            ]) !!}


        @include('contacts.form')

            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            <td><a href="{{ route('contacts.index')}}" class="btn btn-primary">Cancel</a></td>

    {!!Form::close()!!}
</div>
</div>
@endsection
