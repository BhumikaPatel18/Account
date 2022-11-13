@extends('layouts.app')

@section('content')
<div class="container">
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="uper">

<h2>Project Details</h2>
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
    {{-- <a href="{{ route('home.index')}}" class="btn btn-primary">Home Page</a> --}}
    <a href="{{ route('projects.create')}}" class="btn btn-primary float-end">Insert new Record</a></td>
</div>

    <table class="table table-bordered shadow text-center table-striped">
        <thead>
            <tr>
              {{-- <td>id</td> --}}
              <td>Assign_to</td>
              <td>Email</td>
              <td>Title</td>
              <td>Description</td>
              <td>Start_date</td>
              <td>Due_date</td>
              <td>Account</td>
              <td>User</td>
              <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($projects as $project)
        <tr>
            {{-- <td>{{$project->id}}</td> --}}
            <td>{{$project->name}}</td>
            <td>{{$project->email}}</td>
            <td>{{$project->title}}</td>
            <td>{{$project->description}}</td>
            <td>{{$project->start_date}}</td>
            <td>{{$project->due_date}}</td>

            <td>
                @foreach ( $project->accounts as $account)
                {{$account->user_name}}<br>
                @endforeach
            </td>

            <td>
                @foreach ( $project->users as $user)
                {{$user->name}}<br>
                @endforeach
            </td>


            <td><a href="{{ route('projects.edit', $project->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('projects.show', $project->id)}}" class="btn btn-primary">show</a></td>
            <td>
                <form action="{{ route('projects.destroy', $project->id)}}" method="post">
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
