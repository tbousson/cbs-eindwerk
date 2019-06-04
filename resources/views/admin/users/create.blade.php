@extends('layouts.admin')
@section('content')

    
    <h1>Create User</h1>
    
        
    <form method="POST" action="{{Route('users.store')}}">
        <div class="row">
        <div class="col">
            <label for="name">name:</label>
            <div class="form-group">
                <input type="text" name="name" value="{{ old('name') ?? $user->name}}" class="form-control"> 
                <div>{{ $errors->first('name')}}</div>
            </div>
            <label for="email">email:</label>
            <div class="form-group">
                <input type="text" name="email" value="{{old('email') ?? $user->email}}" class="form-control">
                <div>{{ $errors->first('email')}}</div>
            </div>
            <label for="password">Password:</label>
            <div class="form-group">
            <input type="password" name="password" id="password" class="form-control">
            <div>{{ $errors->first('password')}}</div>
            </div>

            <label for="password-confirm">Confirm Password:</label>
            <div class="form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
            <div>{{ $errors->first('password_confirmation')}}</div>
            

            <label for="role_id">Role:</label>
            <div class="form-group">
                <select name="role_id" id="role_id" class="form-control">
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
                <label for="address">address:</label>
                <div class="form-group">
                    <input type="text" name="address" value="{{old('address') ?? $user->address}}" class="form-control">
                    <div>{{ $errors->first('address')}}</div>
                </div>
                <label for="postcode">postcode:</label>
                <div class="form-group">
                    <input type="text" name="postcode" value="{{old('postcode') ?? $user->postcode}}" class="form-control">
                    <div>{{ $errors->first('postcode')}}</div>
                </div>
                <label for="city">city:</label>
                <div class="form-group">
                    <input type="text" name="city" value="{{old('city') ?? $user->city}}" class="form-control">
                    <div>{{ $errors->first('city')}}</div>
                </div>
                <label for="country">country:</label>
                <div class="form-group">
                    <input type="text" name="country" value="{{old('country') ?? $user->country}}" class="form-control">
                    <div>{{ $errors->first('country')}}</div>
                </div>
                <label for="phone">phone:</label>
                <div class="form-group">
                    <input type="text" name="phone" value="{{old('phone') ?? $user->phone}}" class="form-control">
                    <div>{{ $errors->first('phone')}}</div>
                </div>
        </div>
    </div>
        <button class="btn btn-primary" type="submit">SUBMIT</button>
        @csrf
    </form>
    <div>{{ $errors}}</div>

@endsection
