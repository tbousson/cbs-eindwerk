@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('authors') }}

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card w-75 m-auto">
			<div class="card-header card-header-primary">
			<h4 class="card-title ">Authors</h4>
			{{-- <p class="card-category"> Here is a subtitle for this table</p> --}}	
			</div>
			<div class="card-body">
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
				<td><a href="{{route('authors.edit',$author->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
				<td>
					<form action="{{route('authors.destroy', $author->id)}}" method="POST">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn-danger btn-sm">Delete Author</a>
					</form>
				</td>
			</tr>
			@endforeach
	</tbody>
	</table>
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
			  "pageLength": 15,
			  "columnDefs": [{ 
			  "targets": [-1,-2], 
			  "orderable": false,
			  }],
			  });
		} );
		</script>
</script>
<script> //datatable css
$(document).ready(function() {

$('.dataTables_filter input').addClass('form-control'); // add class form-control to search input


} );
</script>

<script>
 $(document).ready(function() {
  $('table').removeClass('no-footer')
  $('.paginate_button').removeClass('paginate_button', 'current');
  $('#datatable_filter').append(' <a href="{{route('authors.create')}}" class="btn btn-success" style="float:left;">Create Author</a>');
} );

</script>
@endsection