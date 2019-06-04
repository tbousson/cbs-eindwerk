@extends('layouts.admin')
@section('content')

            <h1>Edit Role: {{$role->name}}</h1>

            <form method="POST" action="{{Route('roles.update', ['role' => $role])}}">
                @method('PATCH')
                <label for="name">name:</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') ?? $role->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                
                    @csrf
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
        </form>
                
            
        <form action="{{route('roles.destroy', $role->id)}}" method="POST">
             @method('DELETE')
             @csrf
             <button type="submit" class="btn btn-danger">Delete Role: {{$role->name}}</button>
        </form>


@endsection