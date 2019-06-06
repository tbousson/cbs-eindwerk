@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('roles') }}

@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
			<div class="card w-50 m-auto">
			  <div class="card-header card-header-primary">
				<h4 class="card-title ">Roles</h4>
				{{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
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
							@foreach($roles as $role)
							<tr>
								<td><a href="{{route('roles.edit',$role->id)}}">{{$role->id}}</a></td>
								<td>{{$role->name}}</td>
								<td>
									<form action="{{route('roles.destroy', $role->id)}}" method="POST">
										@method('DELETE')
										<button type="submit" class="btn btn-danger btn-sm float-right">Delete Role</button>
										@csrf
									</form>
									<a href="{{route('roles.edit',$role->id)}}" class="btn btn-info btn-sm float-right">Edit</a>
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
<script> //datatable css
	$(document).ready(function() {
		$('.dataTables_filter input').addClass('form-control'); // add class form-control to search input
		$('table').removeClass('no-footer')
		$('.paginate_button').removeClass('paginate_button', 'current');
		$('#datatable_filter').append(' <a href="{{route('roles.create')}}" class="btn btn-success" style="float:left;">Create Role</a>');
	} );
</script>
				
@endsection