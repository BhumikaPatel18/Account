@extends('layouts.app')

@section('content')
<div class="container">
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="uper">

<h2>User Details</h2>
@if (session()->has('stored-msg'))
            <div class="alert alert-success">
                {{session()->get('stored-msg')}}
            </div>
@endif
@if (session()->has('update-msg'))
            <div class="alert alert-success">
                {{session()->get('update-msg')}}
            </div>
@endif
@if (session()->has('delete-msg'))
            <div class="alert alert-success">
                {{session()->get('delete-msg')}}
            </div>
@endif


<div>
    <a href="{{ route('users.create')}}" class="btn btn-primary float-end">Insert new Record</a></td>
</div>

    <table class="table table-bordered shadow text-center table-striped">
        <thead>
            <tr>
              <td>id</td>
              <td>Name</td>
              <td>Email</td>
              <td>project</td>

              <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>

            <td>
                @foreach ( $user->projects as $projects)
                {{$projects->name}}
                @endforeach
            </td>

            <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('users.show', $user->id)}}" class="btn btn-primary">show</a></td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-primary" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
