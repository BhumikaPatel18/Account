@extends('layouts.app')

@section('content')
<div class='container'>
<div class="row">
	<div class="my-3">
		<ul class="list-group">
			<li class="list-group-item">name: {{ $tshow->name }}</li>
            <li class="list-group-item">email: {{ $tshow->email }}</li>
            <li class="list-group-item">title: {{ $tshow->title }}</li>
            <li class="list-group-item">description: {{ $tshow->description }}</li>
            <li class="list-group-item">start_date: {{ $tshow->start_date }}</li>
            <li class="list-group-item">due_date: {{ $tshow->due_date }}</li>
            <li class="list-group-item">account : @foreach ( $tshow->accounts as $account)
                {{$account->user_name}}
                @endforeach</li>
             <li class="list-group-item">User : @foreach ( $tshow->users as $user)
                {{$user->name}}
                @endforeach</li>
		</ul>
	</div>
</div>
<div class="mt-3">
    <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
</div>
</div>
@endsection
