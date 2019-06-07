@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('editgenre', $genre->id) }}

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card w-50 m-auto">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit Genre: {{$genre->name}}</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
            <form method="POST" action="{{Route('genres.update', ['genre' => $genre])}}">
                @method('PATCH')
                
                <div class="form-group">
                        <label for="name" class="bmd-label-floating">name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $genre->name}}" class="form-control"> 
                    <div>{{ $errors->first('name')}}</div>
                </div>
                    @csrf
                    <div class="row">
                        <div class="col">    
                        <button class="btn btn-primary" type="submit">SUBMIT</button>
                        <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
                        </div>
            </form>
                        <div class="col">
                        <form action="{{route('genres.destroy', $genre->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger float-right">Delete Genre</button>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


@endsection