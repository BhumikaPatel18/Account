{!! Form::label('name', 'name'); !!}
{!! Form::text('name',$project->name ?? '',['class'=>'form-control','placeholder'=>'assign to']); !!}   {{--$post->name ?? '' --}}
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('email', 'email'); !!}
{!! Form::email('email',$project->email ?? '', ['class'=>'form-control','placeholder'=>'abc@gmail.com']); !!}
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('title', 'title'); !!}
{!! Form::textarea('title',$project->title ?? '',['class'=>'form-control','placeholder'=>'add title','rows'=>'2']); !!}
@error('title')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('description', 'description'); !!}
{!! Form::textarea('description',$project->description ?? '',['class'=>'form-control','placeholder'=>'Add Project Description','rows'=>'4']); !!}
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('start_date','start_date'); !!}
{!! Form::date('start_date',$project->start_date ?? '',['class'=>'form-control']); !!}
@error('start_date')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('due_date','due_date'); !!}
{!! Form::date('due_date',$project->due_date ?? '',['class'=>'form-control']); !!}
@error('due_date')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{{-- relationship between project and account --}}
{!! Form::label('account_id', 'Account'); !!}
@php
    $accounts = DB::table('accounts')->select('user_name','id')->get();
@endphp
<select class="form-control" name="account_id">
    <option value=""> Select Account</option>
    @foreach ($accounts as $account)
    <option value= "{{$account->id}}">{{$account->user_name}}</option>
    @endforeach
</select>

<input type="hidden" name="relationshipmodulename[]" value="Account">

{{-- project to user --}}

{!! Form::label('user_id', 'User'); !!}
@php
    $users = DB::table('users')->select('name','id')->get();
@endphp
<select class="form-control" name="user_id">
    <option value=""> Select User</option>
    @foreach ($users as $user)
    <option value= "{{$user->id}}">{{$user->name}}</option>
    @endforeach
</select>

<input type="hidden" name="relationshipmodulename[]" value="User">

<script type="text/javascript" src="{{ asset('bundle/js/form.js') }}"></script>
