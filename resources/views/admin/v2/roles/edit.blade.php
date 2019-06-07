@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('editrole', $role->id) }}

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card w-50 m-auto">
            <div class="card-header card-header-primary">
            <h4 class="card-title ">Edit Role: {{$role->name}}</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
            <form method="POST" action="{{Route('roles.update', ['role' => $role])}}">
            @method('PATCH')
            
            <div class="form-group">
                <label class="bmd-label-floating" for="name">name</label>
                <input type="text" name="name" value="{{ old('name') ?? $role->name}}" class="form-control"> 
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
                            <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right">Delete Role</button>
                            </form>
                    </div>
                </div>
            
    </div>
</div>
                
            
        
    


@endsection