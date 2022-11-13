@extends('layouts.app')

@section('content')
<div class="container">
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="uper">

<h2>Contact Details</h2>
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
    <a href="{{ route('contacts.create')}}" class="btn btn-primary float-end">Insert new Record</a></td>
</div>

    <table class="table table-bordered shadow text-center table-striped">
        <thead>
            <tr>
              {{-- <td>id</td> --}}
              <td>Name</td>
              <td>Email</td>
              {{-- <td>Phone</td> --}}
              <td>Contact</td>
              <td>company_name</td>
              <td>Address</td>
              {{-- <td>Message</td> --}}
              <td>Account</td>
              <td colspan="3">Action</td>
            </tr>
        </thead>
        <tbody>

            @foreach($contacts as $contact)
        <tr>
            {{-- <td>{{$contact->id}}</td> --}}
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            {{-- <td>{{$contact->phone}}</td> --}}
            <td>{{$contact->contact}}</td>
            <td>{{$contact->company_name}}</td>
            <td>{{$contact->address}}</td>
            {{-- <td>{{$contact->message}}</td> --}}

            <td>
                @foreach ( $contact->accounts as $account)
               {{$account->user_name}}<br>
                @endforeach
            </td>

            <td><a href="{{ route('contacts.edit', $contact->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('contacts.show', $contact->id)}}" class="btn btn-primary">show</a></td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
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


<span>
    {{$contacts->links()}}
</span>
<style>
    .w-5{
        display: none;
    }
</style>
@endsection
