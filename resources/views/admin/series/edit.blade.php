@extends('layouts.admin')
@section('content')

            <h1>Edit Serie: {{$serie->name}}</h1>

            <form method="POST" action="{{Route('series.update', ['serie' => $serie])}}">
                @method('PATCH')
                <label for="name">name:</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') ?? $serie->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                
                    @csrf
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
        </form>
                
            
        <form action="{{route('series.destroy', $serie->id)}}" method="POST">
             @method('DELETE')
             @csrf
             <button type="submit" class="btn btn-danger">Delete Serie: {{$serie->name}}</button>
        </form>


@endsection