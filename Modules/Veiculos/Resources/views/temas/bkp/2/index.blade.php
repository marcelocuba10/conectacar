@extends('veiculos::temas.'.$siteId['tema'].'.app')

@section('content')

<div class="slider_wrapper ">
    <div id="camera_wrap" class="">
        @foreach( $data['nav']['home']['slider'] as $slider )
        <div data-src="{!! $slider !!}"></div>
        @endforeach
    </div>
</div>
<div class="container_12">
    @foreach( $data['nav']['home']['featured_services'] as $featured_services )
    <div class="grid_4">
        <div class="banner">
            <div class="maxheight">
                <div class="banner_title">
                    {!! verificaImagemouIcone($featured_services['image'],'25%') !!}
                    <div class="extra_wrapper">{!! $featured_services['title'] !!}
                        <div class="color1">{!! $featured_services['subtitle'] !!}</div>
                    </div>
                </div>
                {!! $featured_services['content'] !!}
                <a href="{!! $featured_services['url'] !!}" class="fa fa-share-square"></a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="clear"></div>
</div>
<div class="c_phone">
    <div class="container_12">
        <div class="grid_12">
            <div class="fa fa-phone"></div> {!! $data['settings']['global']['site_telefone'] !!}
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="content">
    <br><br>
    <div class="container_12">
        @foreach( $data['nav']['cars']['content'] as $key => $content )
        @if( $key < $data['settings']['global']['veiculos_na_home'] )
        @include('veiculos::temas.2.cars_box',['data' => $content])
        @endif
        @endforeach
        <div class="clear"></div>
    </div>
</div>

@endsection