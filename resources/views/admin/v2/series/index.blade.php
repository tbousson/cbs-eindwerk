@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('series') }}

@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
			<div class="card w-50 m-auto">
			  <div class="card-header card-header-primary">
				<h4 class="card-title ">Series</h4>
				@if($seriesTrashed->count())<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
						  <a class="nav-link" id="table-tab" data-toggle="tab" href="#activetab" role="tab" aria-controls="home" aria-selected="true">Active</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" id="trashed-tab" data-toggle="tab" href="#trashtab" role="tab" aria-controls="profile" aria-selected="false">Trashed</a>
						</li>@endif
					  </ul>
				{{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
				
			  </div>
			  <div class="card-body">
				  

				<div>
	<div class="tab-content">
		<div class="tab-pane active" id="activetab" role="tabpanel" aria-labelledby="home-tab">
		
			<table class="table" id="datatable">
				<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Name</th>
					<th scope="col"></th>
				</tr>
				</thead>
				<tbody>	
					@foreach($series as $serie)
					<tr>
						<td><a href="{{route('series.edit',$serie->id)}}">{{$serie->id}}</a></td>
						<td>{{$serie->name}}</td>
						<td>
							<form action="{{route('series.destroy', $serie->id)}}" method="POST">
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm float-right">Delete Serie</button>
								@csrf
							</form>
							<a href="{{route('series.edit',$serie->id)}}" class="btn btn-info btn-sm float-right">Edit</a></td>
					</tr>
					@endforeach
			</tbody>
			</table>
		</div>
		<div class="tab-pane" id="trashtab" role="tabpanel" aria-labelledby="profile-tab">
				<table class="table" id="datatableTrash">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col"></th>
						</tr>
						</thead>
						<tbody>	
							@foreach($seriesTrashed as $serie)
							
							<tr> 
								<td>{{$serie->id}}</td>
								<td>{{$serie->name}}</td>
								<td>
									<form method="POST" action="{{Route('series.update', ['serie' => $serie])}}">
											@method('PATCH')
											<button type="submit" class="btn btn-success btn-sm float-right">Restore Serie</button>
											@csrf
										</form>
									</td>
							</tr>
							@endforeach
					</tbody>
					</table>
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
			  "pageLength": 25,
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
			  
			   
		   } );
				</script>
		   
				<script>
				  $(document).ready(function() {
				   $('table').removeClass('no-footer')
				   $('.paginate_button').removeClass('paginate_button', 'current');
				   $('#datatable_filter').append(' <a href="{{route('series.create')}}" class="btn btn-success" style="float:left;">Create Serie</a>');
			} );
				 
				 </script>
@endsection