@extends('temas.4.app')

<!--==============================header=================================-->
<div id="stuck_container">
    <header class="page1">
            
            @include('temas.4.menu')

            @include('temas.4.banner')

    </header>
</div>

@section('content')
    
<div class="box-1">
    <div class="container">
        <div class="row">
            <div class="grid_6 preffix_6">
                <p class="txt5">{!! trataTraducoes('Rent exclusive car for your') !!}</p>
                <p class="txt6">{!! trataTraducoes('special occasion!') !!}</p>
                <p class="txt7">{!! trataTraducoes('Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ') !!}</p>
                <a href="/tema/cars" class="more_btn2">{!! trataTraducoes('See all cars') !!}</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2>{!! trataTraducoes('OUR VEHICLES') !!}</h2>
    <div class="row">
        @include('temas.4.cars_box_index')
        @include('temas.4.cars_box_index')
        @include('temas.4.cars_box_index')
        @include('temas.4.cars_box_index')
        @include('temas.4.cars_box_index')
        @include('temas.4.cars_box_index')
    </div>
    <p class="txt11"><a href="/tema/cars" class="link1">{!! trataTraducoes('See all cars') !!}</a></p>

</div>

@include('temas.4.map')

@endsection