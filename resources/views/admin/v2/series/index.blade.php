@extends('layouts.v2.admin')
@section('breadcrumb')
{{ Breadcrumbs::render('series') }}

@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
			<div class="card w-75 m-auto">
			  <div class="card-header card-header-primary">
				<h4 class="card-title ">Series</h4>
				<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
						  <a class="nav-link active" id="table-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Table</a>
						</li>
						<li class="nav-item">
						  <a class="nav-link" id="trashed-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Trashed</a>
						</li>
					  </ul>
				{{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
				
			  </div>
			  <div class="card-body">
				  

				<div>
	<div class="tab-content">
		<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
		
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
		<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<table class="table" id="datatable">
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
									<a class="btn btn-sm btn-warning" href="{{route('series.restore',$serie->id)}}">Restore</a>
									<form action="{{route('series.restore', $serie->id)}}" method="POST">
											@method('PATCH')
											<button type="submit" class="btn btn-danger btn-sm float-right">Restore Serie</button>
											@csrf
										</form>
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