@extends('layouts.admin')
@section('content')

            <h1>Edit Author: {{$author->name}}</h1>

            <form method="POST" action="{{Route('authors.update', ['author' => $author])}}">
                @method('PATCH')
                <label for="name">name:</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') ?? $author->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                
                    @csrf
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
        </form>
                
            
        <form action="{{route('authors.destroy', $author->id)}}" method="POST">
             @method('DELETE')
             @csrf
             <button type="submit" class="btn btn-danger">Delete Author: {{$author->name}}</button>
        </form>


@endsection