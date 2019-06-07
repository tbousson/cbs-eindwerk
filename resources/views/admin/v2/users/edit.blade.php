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
                
                <div class="form-group">
                    <label class="bmd-label-floating" for="name">name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $user->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
               
                <div class="form-group">
                    <label class="bmd-label-floating" for="email">email</label>
                    <input type="text" name="email" value="{{old('email') ?? $user->email}}" class="form-control">
                    <div>{{ $errors->first('email')}}</div>
                    
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="submit">SUBMIT</button>
                            <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
                        </div>
        </form> 
                        <div class="col">
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right">Delete User</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
</div>
        
       


@endsection