@extends('layouts.admin')
@section('content')

            <h1>Edit User: {{$user->name}}</h1>

            <form method="POST" action="{{Route('users.update', ['user' => $user])}}">
                @method('PATCH')
                <label for="name">name:</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') ?? $user->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                <label for="email">email:</label>
                <div class="form-group">
                    <input type="text" name="email" value="{{old('email') ?? $user->email}}" class="form-control">
                    <div>{{ $errors->first('email')}}</div>
                    <label for="role_id">Role:</label>
                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
        </form>
                </div>
            </div>



    </div>
            
        <form action="{{route('users.destroy', $user->id)}}" method="POST">
             @method('DELETE')
             @csrf
             <button type="submit" class="btn btn-danger">Delete User: {{$user->name}}</button>
        </form>


@endsection