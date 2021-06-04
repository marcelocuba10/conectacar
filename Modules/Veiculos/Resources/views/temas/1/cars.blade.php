@extends('veiculos::temas.1.app')
@section('content')

<div class="section">
    <div class="top3-wrapper novi-background bg-cover" style="display: none;">
        <div class="container">
            <div class="top3 clearfix">
                <div class="tabs-wrapper">
                    <div class="txt">SELECT VIEW</div>
                    <div class="tabs1-wrapper">
                        <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                            <li class="active"><a href="#tabs2-2"><i class="fa fa-list"></i></a></li>
                            <li><a href="#tabs2-2"><i class="fa fa-th"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('veiculos::temas.1.breadcrumb',['dados' => ['Carros']])
    <div class="section-md-bottom content novi-background bg-cover">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        @forelse( retornaCarros() as $key => $retornaCarros )
                        @include('veiculos::temas.1.cars_box',compact('retornaCarros'))
                        @empty
                        {!! trataTraducoes('Sem veículos no momento') !!}
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! retornaCarros()->links() !!}
                        </div>
                    </div>
                </div>
                <?php
                /*
                <div class="col-sm-12 col-md-3">
                    @include('veiculos::temas.1.busca_lateral')
                </div>
                */
                ?>
            </div>
        </div>
    </div>
</div>

@endsection