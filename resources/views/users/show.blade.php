@extends('layouts.app')

@section('content')
<div class="row">
	<div class="my-3">
		<ul class="list-group">
			<li class="list-group-item">name: {{ $tshow->name }}</li>
            <li class="list-group-item">email: {{ $tshow->email }}</li>

		</ul>
	</div>
</div>
<div class="mt-3">
    <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection
