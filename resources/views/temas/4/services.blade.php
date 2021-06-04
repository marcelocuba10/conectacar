@extends('temas.4.app')

@section('content')

<!--==============================header=================================-->
@include('temas.4.menu')
<!--=======content================================-->

			<div class="container">
				<h2>{!! trataTraducoes('Nossos servicos') !!}</h2>
				<div class="row" style="margin-bottom: 30px;">
					<div class="grid_6 section_1">
						<h2 class="v3"><a href="#">Service 1</a></h2>
						<p>Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, 
							nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
							Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor.</p>
							<a href="#" class="link_img">
								<div class="img_section">
									<img src="{!! verificaImagemSistem("image") !!}" alt="">
									<div class="img_more_btn_section">
										<div href="#" class="more_btn3">{!! trataTraducoes('Details') !!}</div>
									</div>
								</div>
							</a>
						<h2 class="v3"><a href="#">Service 2</a></h2>
						<p>Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, 
							nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
							Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor.</p>
							<a href="#" class="link_img">
								<div class="img_section">
									<img src="{!! verificaImagemSistem("image") !!}" alt="">
									<div class="img_more_btn_section">
										<div href="#" class="more_btn3">{!! trataTraducoes('Details') !!}</div>
									</div>
								</div>
							</a>
					</div>

					<div class="grid_6">
						<h2 class="v3"><a href="#">Service 3</a></h2>
						<p>Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, 
							nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
							Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor.</p>
							<a href="#" class="link_img">
								<div class="img_section">
									<img src="{!! verificaImagemSistem("image") !!}" alt="">
									<div class="img_more_btn_section">
										<div href="#" class="more_btn3">{!! trataTraducoes('Details') !!}</div>
									</div>
								</div>
							</a>
						<h2 class="v3"><a href="#">Service 4</a></h2>
						<p>Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, 
							nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. 
							Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. Lorem ipsum dolor.</p>
							<a href="#" class="link_img">
								<div class="img_section">
									<img src="{!! verificaImagemSistem("image") !!}" alt="">
									<div class="img_more_btn_section">
										<div href="#" class="more_btn3">{!! trataTraducoes('Details') !!}</div>
									</div>
								</div>
							</a>
					</div>
				</div>
            </div>
            
@endsection