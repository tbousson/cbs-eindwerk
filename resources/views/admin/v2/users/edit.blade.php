@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('edituser', $user->id) }}

@endsection
@section('content')



@section('content')

<div class="row">
  <div class="col-md-12">
      <div class="card m-auto w-50">
        <div class="card-header card-header-primary">
          <h4 class="card-title text-capitalize">Edit User -  {{$user->name}}</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{Route('users.update', ['user' => $user])}}">
                @method('PATCH')
                
                 <div class="row">
        <div class="col">
            
            <div class="form-group">
                <label class="bmd-label-floating" for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') ?? $user->name}}" class="form-control"> 
                <div>{{ $errors->first('name')}}</div>
            </div>
            
            <div class="form-group">
                <label class="bmd-label-floating" for="email">Email</label>
                <input type="text" name="email" value="{{old('email') ?? $user->email}}" class="form-control">
                <div>{{ $errors->first('email')}}</div>
            </div>
            
            <div class="form-group">
            <label class="bmd-label-floating" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <div>{{ $errors->first('password')}}</div>
            </div>

            
            <div class="form-group">
            <label class="bmd-label-floating" for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
            <div>{{ $errors->first('password_confirmation')}}</div>
            

            
            <div class="form-group">
                <label class="" for="role_id">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="address">Address</label>
                    <input type="text" name="address" value="{{old('address') ?? $user->address}}" class="form-control">
                    <div>{{ $errors->first('address')}}</div>
                </div>
                
                <div class="form-group">
                        <label class="bmd-label-floating" for="postcode">Postcode</label>
                    <input type="text" name="postcode" value="{{old('postcode') ?? $user->postcode}}" class="form-control">
                    <div>{{ $errors->first('postcode')}}</div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="city">City</label>
                    <input type="text" name="city" value="{{old('city') ?? $user->city}}" class="form-control">
                    <div>{{ $errors->first('city')}}</div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="country">Country</label>
                    <input type="text" name="country" value="{{old('country') ?? $user->country}}" class="form-control">
                    <div>{{ $errors->first('country')}}</div>
                </div>
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="phone">Phone</label>
                    <input type="text" name="phone" value="{{old('phone') ?? $user->phone}}" class="form-control">
                    <div>{{ $errors->first('phone')}}</div>
                </div>
        </div>
    </div>
        <button class="btn btn-primary" type="submit">SUBMIT</button>
        <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
        @csrf
    </form>
        
       


@endsection