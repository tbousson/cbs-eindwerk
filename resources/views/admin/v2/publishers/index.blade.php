@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('publishers') }}

@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
			<div class="card m-auto w-75">
			  <div class="card-header card-header-primary">
				<h4 class="card-title ">Publishers</h4>
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
						@foreach($publishers as $publisher)
						<tr>
							<td><a href="{{route('publishers.edit',$publisher->id)}}">{{$publisher->id}}</a></td>
							<td>{{$publisher->name}}</td>
							<td><a href="{{route('publishers.edit',$publisher->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
							<td>
								<form action="{{route('publishers.destroy', $publisher->id)}}" method="POST">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-danger btn-sm">Delete Publisher</a>
									
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
			  "paging": false,
			  "pageLength": 0,
			  "columnDefs": [{ 
			  "targets": [-1,-2], 
			  "orderable": false,
			  }],
			  });
		} );
		</script>
		<script> //datatable css
				$(document).ready(function() {
				  $('.dataTables_filter input').addClass('form-control'); // add class form-control to search input
				  
				  $('table').removeClass('no-footer');
				  $('.paginate_button').removeClass('paginate_button', 'current');
				  $('#datatable_filter').append(' <a href="{{route('publishers.create')}}" class="btn btn-success" style="float:left;">Create Publisher</a>');
				 } );
				</script>
@endsection