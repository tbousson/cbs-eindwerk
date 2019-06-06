@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('editauthor', $author->id) }}

@endsection
@section('content')

            


<div class="card w-50 m-auto">
    <form method="POST" action="{{Route('authors.update', ['author' => $author])}}">
                @method('PATCH')
                @csrf
    <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Author</h4>
        <p class="card-category"></p>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label class="bmd-label-floating" for="name">name</label>
            <input type="text" name="name" value="{{ old('name') ?? $author->name}}" class="form-control"> 
            <div>{{ $errors->first('name')}}</div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" type="submit">SUBMIT</button>
                <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
            </div>
    </form>
            <div class="col">
    <form action="{{route('authors.destroy', $author->id)}}" method="POST">
    @method('DELETE')
    @csrf
                <button type="submit" class="btn btn-danger float-right">Delete Author</button>
        
    </form>
            </div>
</div>


@endsection