@extends('layouts.admin')

@section('content')
<a href="{{route('comics.create')}}" class="btn btn-primary">Create Comic</a>

			<table class="table" id="datatable">
				<thead>
						
				<tr>
					<th scope="col">id</th>
					<th scope="col">image</th>
					<th scope="col">name</th>
					
					<th scope="col">price</th>
					<th scope="col">serie</th>
					<th scope="col">genres</th>
					<th scope="col">edit</th>
					<th scope="col">delete</th>

					


				</tr>
				</thead>
				<tbody>	
				@foreach($comics as $comic)
				<tr>
					<td><a href="{{route('comics.edit',$comic->id)}}">{{$comic->id}}</a></td>
					<td>@if($comic->photo_id)<img src="{{url($comic->photo->thumbnail)}}" height="50px;">@endif
					</td>
					<td>{{$comic->title}}</td>
					
					<td>{{$comic->price}}</td>
					<td>{{$comic->serie ? $comic->serie->name : 'no serie'}}</td>
					<td>@foreach($comic->genres as $genre)
							<span class="badge badge-info">{{$genre->name}}</span>
						@endforeach
					
					
					</td>
					<td><a href="{{route('comics.edit',$comic->id)}}" class="btn btn-outline-primary btn-sm">Edit</a></td>
					<td><form action="{{route('comics.destroy', $comic->id)}}" method="POST">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn-outline-danger btn-sm">Delete Comic</a>
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
			  "targets": [1,-1,-2], 
			  "orderable": false,
			  }],
			  });
		} );
		</script>
@endsection