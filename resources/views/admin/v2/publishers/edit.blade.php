@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('editpublisher', $publisher->id) }}

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card w-50 m-auto">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit Publisher: {{$publisher->name}}</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
            <form method="POST" action="{{Route('publishers.update', ['publisher' => $publisher])}}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col">
                    <div class="form-group">
                        <label class="bmd-label-floating" for="name">name</label>
                        <input type="text" name="name" value="{{ old('name') ?? $publisher->name}}" class="form-control"> 
                        <div>{{ $errors->first('name')}}</div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col">
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                    <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
                    </form>
                    </div>
                    <div class="col">
                        <form action="{{route('publishers.destroy', $publisher->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger float-right">Delete Publisher: {{$publisher->name}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection