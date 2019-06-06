@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('genres') }}

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		
		<div class="card m-auto w-50">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">Genres</h4>
				<p class="card-category">A genre is a style or category of a Comic Book</p>
			</div>
			<div class="card-body">
				<div>
					<table class="table" id="datatable">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col"></th>
						</tr>
						</thead>
						<tbody>	
							@foreach($genres as $genre)
							<tr>
								<td><a href="{{route('genres.edit',$genre->id)}}">{{$genre->id}}</a></td>
								<td>{{$genre->name}}</td>
								<td>
									<form action="{{route('genres.destroy', $genre->id)}}" method="POST">
										@method('DELETE')
										<button type="submit" class="btn btn-danger btn-sm float-right">Delete Genre</button>
										@csrf
									</form>
									<a href="{{route('genres.edit',$genre->id)}}" class="btn btn-info btn-sm float-right">Edit Genre</a>
								</td>
							</tr>
							@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
$(document).ready( function () {
	$('#datatable').DataTable(
	{
		'iDisplayLength': -1,
		"lengthChange": false,  
		"info": false,  
		"paging": false,
		"pageLength": 0,
		"columnDefs": [{ 
		"targets": [-1], 
		"orderable": false,
		}],
		});
} );
</script>
<script> //datatable css
$(document).ready(function() {
	$('.dataTables_filter input').addClass('form-control'); // add class form-control to search input
	$('table').removeClass('no-footer')
	$('.paginate_button').removeClass('paginate_button', 'current');
	$('#datatable_filter').append(' <a href="{{route('genres.create')}}" class="btn btn-success" style="float:left;">Create Genre</a>');
	} );
</script>
@endsection