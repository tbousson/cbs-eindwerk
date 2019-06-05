@extends('layouts.home')


@section('titlebar')
	<!-- Title Page -->
	@include('shared.titlepage', ['title' => "$user->name",'subtitle' => "$role"])
@endsection

    @section('content')
	<!-- Content page -->
	
				

						

    <section class="" style="height: 70%">
			<div class="container p-t-55 p-b-65 bgwhite" style="height: 100%">
				<div class="sec-title p-b-60">
						<h3 class="m-text5 t-center">
							Profile: {{$user->name}} - <span class="badge badge-info">{{$user->role->name}}</span>
						</h3>
					</div>
			
					<div class="row">
                        <div class="container">
                            <p class="fs-20"><b>id:</b> {{$user->id}}</p>
                        <p class="fs-20 capitalize"><b>name:</b> {{$user->name}}</p>
                        <p class="fs-20"><b>email:</b> {{$user->email}}</p>
                        <p class="fs-20"><b>address:</b> {{$user->address}}</p>
                        <p class="fs-20"><b>postcode:</b> {{$user->postcode}}</p>
                        <p class="fs-20"><b>city:</b> {{$user->city}}</p>
                        <p class="fs-20"><b>country:</b> {{$user->country}}</p>
                        <p class="fs-20"><b>phone:</b> {{$user->phone}}</p>
                        <p class="fs-20"><b>role:</b> {{$user->role->name}}</p>
                        <p class="fs-20"><b>created:</b> {{$user->created_at}}</p>
                    </div> 

						

				</div>
			</div>
		</div>
	</section>



@endsection