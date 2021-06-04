@extends('veiculos::temas.'.$siteId['tema'].'.app')

@section('content')

<!--==============================Content=================================-->
<div class="content">
    <div class="container_12">
        <div class="grid_12">
            <h3>{!! $data['nav']['services']['title'] !!}</h3>
        </div>
        @foreach( $data['nav']['services']['content'] as $content )
        <div class="grid_4">
            <div class="box">
                <div class="maxheight">
                    <img src="{!! $content['image'] !!}" alt="">
                    <div class="text1 color2">
                        {!! $content['title'] !!}
                    </div>
                    <div style="height: 150px; overflow: auto !important;">
                        {!! $content['content'] !!}
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="clear"></div>
    </div>
</div>

@endsection