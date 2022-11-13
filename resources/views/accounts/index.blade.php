@extends('layouts.app')

@section('content')
<div class="container">
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="uper">

<h2>Account Details</h2>
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
    <a href="{{ route('accounts.create')}}" class="btn btn-primary float-end">Insert new Record</a></td>
</div>

    <table class="table table-bordered shadow text-center table-striped">
        <thead>
            <tr>
              {{-- <td>id</td> --}}
              <td>user_name</td>
              {{-- <td colspan="2">Name</td> --}}
              {{-- <td>date of birth</td> --}}
              <td>phone</td>
              <td>email</td>
              {{-- <td>address</td>
              <td>country</td>
              <td>state</td>
              <td>Accounts</td>
              <td>Gender</td> --}}
              <td>Contact</td>
              <td>project</td>
              <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>

            @foreach($accounts as $account)
        <tr>
            {{-- <td>{{$acc->id}}</td> --}}
            <td>{{$account->user_name}}</td>
            <td>{{$account->phone}}</td>
            <td>{{$account->email}}</td>

       <td>
            @foreach ( $account->contacts as $contacts)
            {{$contacts->name}}<br>
            @endforeach
        </td>

        <td>
            @foreach ( $account->projects as $projects)
            {{$projects->name}}<br>
            @endforeach
        </td>
            <td><a href="{{ route('accounts.edit', $account->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('accounts.show', $account->id)}}" class="btn btn-primary">show</a></td>
            <td>
                <form action="{{ route('accounts.destroy', $account->id)}}" method="post">
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
