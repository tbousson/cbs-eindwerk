@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('editserie', $serie->id) }}

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card w-50 m-auto">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit Serie: {{$serie->name}}</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
                <form method="POST" action="{{Route('series.update', ['serie' => $serie])}}">
                    @method('PUT')
                    <label for="name">name:</label>
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') ?? $serie->name}}" class="form-control"> 
                        <div>{{ $errors->first('name')}}</div>
                    </div>
                    
                        @csrf
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" type="submit">SUBMIT</button>
                                <a href="{{ url()->previous() }}" class="btn btn-info">Cancel</a>
                                </form>
                            </div>
                            <div class="col">
                                <form action="{{route('series.destroy', $serie->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger float-right">Delete Serie</button>
                                </form>
                            </div>
                        </div>
        
                </div>
    </div>
</div>
@endsection
