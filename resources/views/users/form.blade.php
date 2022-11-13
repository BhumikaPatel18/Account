{!! Form::label('name', 'name'); !!}
{!! Form::text('name',$user->name ?? '',['class'=>'form-control','placeholder'=>'name']); !!}   {{--$post->name ?? '' --}}
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('email', 'email'); !!}
{!! Form::email('email',$user->email ?? '', ['class'=>'form-control','placeholder'=>'abc@gmail.com']); !!}
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('password','password'); !!}
{!! Form::text('password',$user->password ?? '', ['class'=>'form-control','placeholder'=>'password']); !!}
@error('password')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror


{!! Form::label('project_id', 'Project'); !!}
@php
    $projects = DB::table('projects')->select('name','id')->get();
@endphp
<select class="form-control" name="project_id">
    @foreach ($projects as $project)
    <option value= "{{$project->id}}">{{$project->name}}</option>
    @endforeach
</select>

<input type="hidden" name="relationshipmodulename" value="Project">

{{-- remove account(detach) --}}

@php
    $users = $project->users()->get();
    dd($project->users());
    foreach ($users as $user)
    {
        $user_id[] = $user->id;
        $user_name[] = $user->user_name;
    }
@endphp
@if (!empty($user_id))
    {!! Form::label('user_id_detach', 'Remove Project'); !!}
        @php
            $option = array_combine($user_id,$user_name);
 @endphp
        {!! Form::select('user_id_detach', $option,'',[
        'class'=>'form-select',
        'id'=>'user_id',
        'placeholder'=>'select Project to remove']); !!}
@endif





{{-- <script type="text/javascript" src="{{ asset('bundle/js/form.js') }}"></script> --}}
