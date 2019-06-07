@extends('layouts.v2.admin')

@section('content')

<h1>{{$genre->name}} Genre <small>{{$genre->products->count()}} products</small></h1>


@endsection