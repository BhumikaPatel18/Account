{!! Form::label('user_name', 'user_name'); !!}
{!! Form::text('user_name',$account->user_name ?? '',['class'=>'form-control','placeholder'=>'User name','readonly']); !!}   {{--$post->name ?? '' --}}
@error('user_name')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('first_name', 'first_name'); !!}
{!! Form::text('first_name',$account->first_name ?? '',['class'=>'form-control','placeholder'=>'Bhumi']); !!}   {{-- <input type="date" class="form-control" name="DOB" value="{{ $post->DOB ?? '' }}"/> --}}
@error('first_name')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('last_name', 'last_name'); !!}
{!! Form::text('last_name',$account->last_name ?? '',['class'=>'form-control','placeholder'=>'Patel']); !!}
@error('last_name')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('dob','dob'); !!}
{!! Form::date('dob',$account->dob ?? '',['class'=>'form-control']); !!}
@error('dob')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('phone', 'phone'); !!}
{!! Form::text('phone',$account->phone ?? '',['class'=>'form-control','placeholder'=>'1234567890']); !!}
@error('phone')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('email', 'email'); !!}
{!! Form::email('email',$account->email ?? '', ['class'=>'form-control','placeholder'=>'Bhumi18@gmail.com']); !!}
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('address', 'address'); !!}
{!! Form::textarea('address',$account->address ?? '',['class'=>'form-control','placeholder'=>'Current Address','rows'=>'2']); !!}
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

<div class='form-group row'>
{!! Form::label('country', 'country'); !!}
<div class = "col-sm-20">
{!! Form::select('country',
[
    'india'=>'india',
    'nepal'=>'nepal',
    'usa'=>'usa',
    'france'=>'france',
    'rusia'=>'rusia',
    'srilanka'=>'srilanka'],'',[
    'class'=>'form-control','placeholder'=>'select country'
]) !!}
@error('country')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

<div class='form-group row'>
{!! Form::label('state', 'state'); !!}
<div class = "col-sm-20">
{!! Form::select('state',
[
    'dnh'=>'dnh',
    'gujarat'=>'gujarat',
    'maharastra'=>'maharastra',
    'asam'=>'asam',
    'goa'=>'goa',
    'kerala'=>'kerala'],'',[
        'class'=>'form-control','placeholder'=>'select state'
]); !!}<br/>
@error('state')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

<div class='form-group row'>
{!! Form::label('gender','Select Your Gender : '); !!}
<div class = "col-sm-18">

{!! Form::radio('gender','Male',['id'=>'gender','name'=>'gender','class'=>'form-control']); !!}
{!! Form::label('gender','Male'); !!} <br/>

{!! Form::radio('gender','Female',['id'=>'gender','name'=>'gender','class'=>'form-control']); !!}
{!! Form::label('gender','Female'); !!}<br/>
@error('gender')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

<div class='form-group row'>
{!! Form::label('hobby','Select Your Hobbies : '); !!}
<div class = "col-sm-10">
{!! Form::checkbox('hobby[]','Cricket',['class'=>'form-control']); !!}
{!! Form::label('hobby','Cricket'); !!}<br/>

{!! Form::checkbox('hobby[]','Cooking',['class'=>'form-control']); !!}
{!! Form::label('hobby','Cooking'); !!}<br/>

{!! Form::checkbox('hobby[]','Travelling',['class'=>'form-control']); !!}
{!! Form::label('hobby','Travelling'); !!}<br/>
@error('hobby')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('contact_id', 'Contact'); !!}
@php
    $contacts = DB::table('contacts')->select('name','id')->get();
@endphp
<select class="form-control" name="contact_id">
    <option value=""> Select Contact</option>
    @foreach ($contacts as $contact)
    <option value= "{{$contact->id}}">{{$contact->name}}</option>
    @endforeach
</select>

{!! Form::label('project_id', 'Project'); !!}
@php
    $projects = DB::table('projects')->select('name','id')->get();
@endphp
<select class="form-control" name="project_id">
    <option value=""> Select Project</option>
    @foreach ($projects as $project)
    <option value= "{{$project->id}}">{{$project->name}}</option>
    @endforeach
</select>

<input type="hidden" name="relationshipmodulename[]" value="Contact">
<input type="hidden" name="relationshipmodulename[]" value="Project">

{{-- remove account(detach) --}}

{{-- @if (!empty($contact_id) && $routeAction == 'edit') --}}

@php
    $contacts = $account->contacts()->get();
    foreach ($contacts as $contact)
    {
        $contact_id[] = $contact->id;
        $contact_name[] = $contact->name;
    }
@endphp
@if (!empty($contact_id))
{!! Form::label('contact_id_detach', 'Remove Contact'); !!}
        @php
            $option = array_combine($contact_id,$contact_name);
        @endphp
{!! Form::select('contact_id_detach', $option,'',[
'class'=>'form-select', 'id'=>'contact_id','placeholder'=>'select contact to remove']); !!}

@endif

{{-- account to project --}}

@php
    $projects = $account->projects()->get();
    foreach ($projects as $project)
    {
        $project_id[] = $project->id;
        $project_name[] = $project->name;
    }
@endphp
@if (!empty($project_id))
{!! Form::label('project_id_detach', 'Remove Project'); !!}
        @php
            $option = array_combine($project_id,$project_name);
        @endphp
{!! Form::select('project_id_detach', $option,'',[
'class'=>'form-select', 'id'=>'project_id','placeholder'=>'select project to remove']); !!}

@endif

Detach <input type="checkbox" name="checkbox" value="unknown">
