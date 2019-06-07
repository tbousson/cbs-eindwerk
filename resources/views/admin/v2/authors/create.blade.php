@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('createauthor') }}

@endsection
@section('content')
<form method="POST" action="{{Route('authors.store')}}">

    <div class="card w-50 m-auto">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Create New Author</h4>
            <p class="card-category"></p>
        </div>
        <div class="card-body">
            <div class="form-group">
            <label class="bmd-label-floating" for="name">name</label>
            <input type="text" name="name" value="{{ old('name') ?? $author->name}}" class="form-control"> 
                <div>{{ $errors->first('name')}}</div>
            </div>
        @csrf
            <button class="btn btn-primary" type="submit">SUBMIT</button>
            <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
        </div>
    </div>
</form>



@endsection
