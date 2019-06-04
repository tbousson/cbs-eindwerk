@extends('layouts.admin')
@section('content')

            <h1>Create Publisher</h1>

            <form method="POST" action="{{Route('publishers.store')}}">

                <label for="name">name:</label>
                <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') ?? $publisher->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                
                @csrf
         




        <button class="btn btn-primary" type="submit">SUBMIT</button>

    </form>



@endsection
