@extends('layouts.front')

@section('titlebar')
	<!-- Title Page -->
	@include('shared.titlepage', ['title' => "$comic->title",'subtitle' => "Published by $publishername", 'background' => "images/comic-1.jpg"])
@endsection
	@section('content')
	<!-- Content page -->
	
<div class="col">
	
			
				<div class="row">
					<div class="col-md-5">
						<div class="view-product">
							<img class="img-responsive" src="{{$comic->photo ? asset($comic->photo->url) : 'http://placehold.it/400x400'}}" alt="" width="350px"/>

						</div>
					

					</div>
					<div class="col-md-7">
						
							
							<h2>{{ $comic->title }}</h2>
							<h3><b>Author:</b> <a class="fs-28" href="{{route("publisher", $comic->author_id)}}">{{$comic->author->name}}</a></h3>
							<h4><b>Publisher:</b> <a class="fs-24" href="{{route("publisher", $comic->publisher_id)}}">{{$comic->publisher->name}}</a></h4>
							
								<p>{{$comic->description}}</p>
								<a href="{{route("publisher", $comic->publisher_id)}}"><span class="fs-15 badge badge-info">{{$comic->serie->name}}</span></a>
								@foreach($comic->genres as $genre) <a href="{{route('genre', $genre)}}"><span class="fs-15 badge badge-info">{{$genre->name}}</span></a>@endforeach
							
								<div class="row mt-3">
								<div class="col">
								<b class="fs-22">Price:</b><span class="price fs-20"> € {{ $comic->price }}</span>
							</div>
								<div class="ralign col">
								<form action="{{url('cart')}}" method="post">
									<input type="hidden" name="comic_id" value="{{$comic->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}"></input>

									<button type="submit" class="btn btn-info cart">
									<i class="fa fa-shopping-cart"></i>
									Add to cart
								</button>
								</form>
							</div>
						</div>



							
						
					</div>
				</div><!--/comic-details-->
			</div>
		</div>

			
		
</div>




@endsection