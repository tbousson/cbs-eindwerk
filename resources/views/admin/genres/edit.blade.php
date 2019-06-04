@extends('layouts.admin')
@section('content')

            <h1>Edit Genre: {{$genre->name}}</h1>

            <form method="POST" action="{{Route('categories.update', ['genre' => $genre])}}">
                @method('PATCH')
                <label for="name">name:</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') ?? $genre->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                
                    @csrf
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
        </form>
                
            
        <form action="{{route('categories.destroy', $genre->id)}}" method="POST">
             @method('DELETE')
             @csrf
             <button type="submit" class="btn btn-danger">Delete Genre: {{$genre->name}}</button>
        </form>


@endsection