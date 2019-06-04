@extends('layouts.admin')

@section('content')
<a href="{{route('genres.create')}}" class="btn btn-primary">Create Genre</a>

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
			@foreach($genres as $genre)
			<tr>
				<td><a href="{{route('genres.edit',$genre->id)}}">{{$genre->id}}</a></td>
				<td><a href="{{route('genres.show', $genre->id)}}">{{$genre->name}}</a></td>
				<td><a href="{{route('genres.edit',$genre->id)}}" class="btn btn-outline-primary btn-sm">Edit</a></td>
				<td>
					<form action="{{route('genres.destroy', $genre->id)}}" method="POST">
						@method('DELETE')
						<button type="submit" class="btn btn-outline-danger btn-sm">Delete Genre</a>
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