@extends('layouts.app')

@section('content')
<div class='container'>
<div class="row">
	<div class="my-3">
		<ul class="list-group">
			<li class="list-group-item">user_name: {{ $tshow->user_name }}</li>
            <li class="list-group-item">first_name: {{ $tshow->first_name }}</li>
            <li class="list-group-item">last_name: {{ $tshow->last_name }}</li>
			<li class="list-group-item">dob: {{ $tshow->dob }}</li>
            <li class="list-group-item">phone: {{ $tshow->phone }}</li>
            <li class="list-group-item">email: {{ $tshow->email }}</li>
            <li class="list-group-item">Address: {{ $tshow->address }}</li>
            <li class="list-group-item">country: {{ $tshow->country }}</li>
            <li class="list-group-item">state: {{ $tshow->state }}</li>
            <li class="list-group-item">gender: {{ $tshow->gender }}</li>
            <li class="list-group-item">hobby: {{ $tshow->hobby }}</li>
            <li class="list-group-item">Contact : @foreach ( $tshow->contacts as $contacts)
                {{$contacts->name}}
                @endforeach</li>
            <li class="list-group-item">project : @foreach ( $tshow->projects as $projects)
            {{$projects->name}}
            @endforeach </li>
		</ul>
	</div>
</div>

<div class="mt-3">
    <a href="{{ route('accounts.index') }}" class="btn btn-primary">Back</a>
</div>
</div>
@endsection
