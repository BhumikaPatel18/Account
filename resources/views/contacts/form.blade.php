{!! Form::label('name', 'Name'); !!}
{!! Form::text('name',$contact->name ?? '',['class'=>'form-control','placeholder'=>'User name']); !!}   {{--$post->name ?? '' --}}
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('email', 'Email'); !!}
{!! Form::email('email',$contact->email ?? '', ['class'=>'form-control','placeholder'=>'Bhumi18@gmail.com']); !!}
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('phone', 'Phone'); !!}
{!! Form::text('phone',$contact->phone ?? '',['class'=>'form-control','placeholder'=>'1234567890']); !!}
@error('phone')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('contact', 'Contact'); !!}
{!! Form::text('contact',$contact->contact ?? '',['class'=>'form-control','placeholder'=>'1234567890']); !!}
@error('contact')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('company_name', 'Company_name'); !!}
{!! Form::text('company_name',$contact->company_name ?? '',['class'=>'form-control','placeholder'=>'companyname',]); !!}   {{--$post->name ?? '' --}}
@error('company_name')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('address', 'Address'); !!}
{!! Form::textarea('address',$contact->address ?? '',['class'=>'form-control','placeholder'=>'Current Address','rows'=>'2']); !!}
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{!! Form::label('message', 'Message'); !!}
{!! Form::textarea('message',$contact->message ?? '',['class'=>'form-control','placeholder'=>'drop message here','rows'=>'2']); !!}
@error('message')
<div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
@enderror

{{-- attach account --}}

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

{{-- remove account(detach) --}}

@php
    $accounts = $contact->accounts()->get();
    //dd($contact->accounts());
    foreach ($accounts as $account)
    {
        $account_id[] = $account->id;
        $account_name[] = $account->user_name;
    }
@endphp
@if (!empty($account_id))
    {!! Form::label('account_id_detach', 'Remove Account'); !!}
        @php
            $option = array_combine($account_id,$account_name);
 @endphp
        {!! Form::select('account_id_detach', $option,'',[
        'class'=>'form-select',
        'id'=>'account_id',
        'placeholder'=>'select account to remove']); !!}
@endif
