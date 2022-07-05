@extends('layouts.customer.master')
@section('content')
<div class="row">
    <div class="container">

        <h4>{{$buttonTitle}}</h4>
        {{Form::open(['route' => 'customer.customerAddProcess'])}}
        <input type="hidden" class="form-control" name="id" @if(isset($customer)) value="{{$customer->user_id}}"@endif/>
            <div class="col-md-4 form-group">
                <label for="email">{{__('Email')}}</label>
                <input type="email" class="form-control" name="email" id="email" @if(isset($customer)) value="{{$customer->user->email}}" @endif/>
                @if ($errors->first('email'))
                    <pre class="text-danger">{{$errors->first('email')}}</pre>
                @endif
            </div>
            <div class="col-md-4 form-group">
                <label for="username">{{__('Username')}}</label>
                <input type="text" class="form-control" name="username" id="username" @if(isset($customer)) value="{{$customer->user->username}}" @endif/>
                @if($errors->first('username'))
                    <pre class="text-danger">{{$errors->first('username')}}</pre>
                    @endif
            </div>
            <div class="col-md-4 form-group">
                <label for="password">{{__('Password')}}</label>
                <input type="password" class="form-control" name="password" id="password" @if(isset($customer)) value="{{$customer->password_text}}" @endif/>
                @if($errors->first('password'))
                    <pre class="text-danger">{{$errors->first('password')}}</pre>
                    @endif
            </div>
            <div class="col-md-4 form-group">
                <select name="gender" class="form">
                    <option  value="">@if(isset($customer)) {{$customer->gender}} @else Select gender @endif</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="nid">{{__('Nid')}}</label>
                <input type="text" class="form-control" name="nid" id="nid" @if(isset($customer)) value="{{$customer->nid}} @endif"/>
                @if($errors->first('nid'))
                    <pre class="text-danger">{{$errors->first('nid')}}</pre>
                    @endif
            </div>
            <div class="col-md-4 form-group">
                <label for="image">{{__('Upload Image')}}</label>
                <input type="file" class="form-control" name="image"/>
            </div>
            <div class="col-md-4 form-group">
                <button type="submit" class="btn btn-primary button">{{$buttonTitle}}</button>
            </div>
        {{Form::close()}}
    </div>
</div>
@endsection
