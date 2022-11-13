@extends('layouts.app')

@section('content')
<div class="row">
	<div class="my-3">
		<ul class="list-group">
			<li class="list-group-item">name: {{ $tshow->name }}</li>
            <li class="list-group-item">email: {{ $tshow->email }}</li>
            <li class="list-group-item">phone: {{ $tshow->phone }}</li>
            <li class="list-group-item">contact: {{ $tshow->contact }}</li>
            <li class="list-group-item">company_name: {{ $tshow->company_name }}</li>
            <li class="list-group-item">Address: {{ $tshow->address }}</li>
            <li class="list-group-item">message: {{ $tshow->message }}</li>
            <li class="list-group-item">Account : @foreach ( $tshow->accounts as $account)
                {{$account->name}}
                @endforeach</li>
		</ul>
	</div>
</div>
<div class="mt-3">
    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection
