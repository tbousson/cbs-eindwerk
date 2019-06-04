@extends('layouts.admin')
@section('content')

            <h1>Edit Publisher: {{$publisher->name}}</h1>

            <form method="POST" action="{{Route('publishers.update', ['publisher' => $publisher])}}">
                @method('PATCH')
                <label for="name">name:</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') ?? $publisher->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                
                    @csrf
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
        </form>
                
            
        <form action="{{route('publishers.destroy', $publisher->id)}}" method="POST">
             @method('DELETE')
             @csrf
             <button type="submit" class="btn btn-danger">Delete Publisher: {{$publisher->name}}</button>
        </form>


@endsection