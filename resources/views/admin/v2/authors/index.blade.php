@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('authors') }}

@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card w-50 m-auto">
			<div class="card-header card-header-primary">
			<h4 class="card-title ">Authors</h4>
			@if($authorsTrashed->count())<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
					  <a class="nav-link" id="table-tab" data-toggle="tab" href="#activetab" role="tab" aria-controls="active" aria-selected="true">Active</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" id="trashed-tab" data-toggle="tab" href="#trashtab" role="tab" aria-controls="trash" aria-selected="false">Trashed</a>
					</li>@endif
				  </ul>	
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active" id="activetab" role="tabpanel" aria-labelledby="active-tab">
						<table class="table" id="datatable">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>	
							@foreach($authors as $author)
							<tr>
								<td><a href="{{route('authors.edit',$author->id)}}">{{$author->id}}</a></td>
								<td>{{$author->name}}</td>
								<td>
									<form action="{{route('authors.destroy', $author->id)}}" method="POST">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger btn-sm float-right">Delete Author</button>
									</form>
									<a href="{{route('authors.edit',$author->id)}}" class="btn btn-info btn-sm float-right">Edit</a></td>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div class="tab-pane" id="trashtab" role="tabpanel" aria-labelledby="trash-tab">
						<table class="table" id="datatableTrash">
								<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Name</th>
									<th scope="col"></th>
								</tr>
								</thead>
								<tbody>	
									@foreach($authorsTrashed as $author)
									
									<tr> 
										<td>{{$author->id}}</td>
										<td>{{$author->name}}</td>
										<td>
											<form method="POST" action="{{Route('authors.update', ['author' => $author])}}">
													@method('PATCH')
													<button type="submit" class="btn btn-success btn-sm float-right">Restore Author</button>
													@csrf
												</form>
									</tr>
									@endforeach
							</tbody>
							</table>
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
			  "targets": [-1], 
			  "orderable": false,
			  }],
			  });
		} );
		$(document).ready( function () {
			$('#datatableTrash').DataTable(
			{
			  'iDisplayLength': -1,
			  "lengthChange": false,  
			  "info": false,  
			  "paging": false,
			  "pageLength": 25,
			  "columnDefs": [{ 
			  "targets": [-1], 
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