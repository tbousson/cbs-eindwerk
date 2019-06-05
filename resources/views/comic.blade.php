@extends('layouts.front')

@section('content')
	<!-- Title Page -->
	@include('shared.titlepage', ['title' => "$comic->title",'subtitle' => "Published by $publishername", 'background' => "images/comic-1.jpg"])


	<!-- Content page -->
	@include('shared.sidebar')
<div class="col">
	
			
				<div class="row">
					<div class="col-md-5">
						<div class="view-product">
							<img class="img-responsive" src="{{$comic->photo ? asset($comic->photo->url) : 'http://placehold.it/400x400'}}" alt="" width="300px"/>

						</div>
					

					</div>
					<div class="col-md-7">
						
							
							<h2>{{ $comic->title }}</h2>
							<h3><b>Author:</b> <a class="fs-28" href="{{route("publisher", $comic->author_id)}}">{{$comic->author->name}}</a></h3>
							<h4><b>Publisher:</b> <a class="fs-24" href="{{route("publisher", $comic->publisher_id)}}">{{$comic->publisher->name}}</a></h4>
							
								<p>{{$comic->description}}</p>
								<a href="{{route("publisher", $comic->publisher_id)}}"><span class="fs-15 badge badge-info">{{$comic->serie->name}}</span></a>
								@foreach($comic->genres as $genre) <a href="{{route('genre', $genre)}}"><span class="fs-15 badge badge-info">{{$genre->name}}</span></a>@endforeach
							<div class="row">
								<div class="col">
								<b>Price:</b><span class="price"> € {{ $comic->price }}</span>
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




<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/animsition/js/animsition.min.js")}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/bootstrap/js/popper.js")}}"></script>
	<script type="text/javascript" src="{{asset("vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/select2/select2.min.js")}}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/slick/slick.min.js")}}"></script>
	<script type="text/javascript" src="{{asset("js/slick-custom.js")}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/countdowntime/countdowntime.js")}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/lightbox2/js/lightbox.min.js")}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset("vendor/sweetalert/sweetalert.min.js")}}"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="{{asset("js/main.js")}}"></script>

</body>
</html>
@endsection