@extends('layouts.admin')

@section('content')
<a href="{{route('authors.create')}}" class="btn btn-primary">Create Author</a>

	<table class="table" id="datatable">
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">name</th>
			<th scope="col">edit</th>
			<th scope="col">delete</th>
		</tr>
		</thead>
		<tbody>	
			@foreach($authors as $author)
			<tr>
				<td><a href="{{route('authors.edit',$author->id)}}">{{$author->id}}</a></td>
				<td>{{$author->name}}</td>
				<td><a href="{{route('authors.edit',$author->id)}}" class="btn btn-outline-primary btn-sm">Edit</a></td>
				<td>
					<form action="{{route('authors.destroy', $author->id)}}" method="POST">
						@method('DELETE')
						<button type="submit" class="btn btn-outline-danger btn-sm">Delete Author</a>
						@csrf
					</form>
				</td>
			</tr>
			@endforeach
	</tbody>
	</table>




@endsection

@section('js')
<script>
		$(document).ready( function () {
			$('#datatable').DataTable(
			{
			  'iDisplayLength': -1,
			  "lengthChange": false,  
			  "info": false,  
			  "paging": true,
			  "pageLength": 15,
			  "columnDefs": [{ 
			  "targets": [-1,-2], 
			  "orderable": false,
			  }],
			  });
		} );
		</script>
@endsection