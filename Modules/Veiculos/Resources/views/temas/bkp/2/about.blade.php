@extends('veiculos::temas.'.$siteId['tema'].'.app')

@section('content')
    <!--==============================Content=================================-->
			<div class="content">
            <div class="container_12">
                <div class="grid_7">
                    <h3>{!! $data['nav']['about']['left']['title'] !!}</h3>
                    <img src="{!! $data['nav']['about']['left']['image'] !!}" alt="" class="img_inner fleft">
                    <div class="extra_wrapper">
                        <div class="text1 color2">
                            <a>{!! $data['nav']['about']['left']['subtitle'] !!}</a>
                        </div>
                        <p>{!! $data['nav']['about']['left']['content'] !!}</p>
                    </div>
                </div>
                <div class="grid_4 prefix_1">
                    <h3>{!! $data['nav']['about']['right']['title'] !!}</h3>
                    @foreach( $data['nav']['about']['right']['content'] as $key => $content )
                    <ul class="list li">
                        <li class="list_count">{!! $key+1 !!}</li>
                        <li class="extra_wrapper">
                            <div class="text1 color2"><a href="#">{!! $content['title'] !!}</a></div>
                            {!! $content['content'] !!}
                        </li>
                    </ul>
                    @endforeach
                </div>
                <div class="clear"></div>
                <div class="grid_12">
                    <h3 class="h3__ind1">{!! $data['nav']['about']['testimonials']['title'] !!}</h3>
                </div>
                @foreach( $data['nav']['about']['testimonials']['content'] as $key => $testimonials )
                <?php
                if( $key === 3 ){
                    break;
                }
                ?>
                <div class="grid_4">
                    <blockquote class="bq1">
                        <p><i>{!! $testimonials['content'] !!}</i></p>
                        <div class="color2">{!! $testimonials['author'] !!}</div>
                    </blockquote>
                </div>
                @endforeach
                <div class="clear"></div>
            </div>
        </div>
    </div>
@endsection