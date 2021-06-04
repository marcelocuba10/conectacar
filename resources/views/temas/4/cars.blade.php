@extends('temas.4.app');

@section('content')

<!--==============================header=================================-->
@include('temas.4.menu')	

<!--=======content================================-->

			<div class="container">
				<div class="row">

					<div class="grid_12">
						<h2>{!! trataTraducoes('NOSSA FROTA') !!}</h2>
						<div class="row">
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
							@include('temas.4.cars_box_index')
						</div>
					</div>
				</div>
			</div>

@endsection