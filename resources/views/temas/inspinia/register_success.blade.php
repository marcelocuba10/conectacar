@extends('temas.inspinia.layout_login')
@section('content')

<meta http-equiv="refresh" content="3; URL='{!! url('/') !!}'"/>

<div class="passwordBox animated fadeInDown" style="width: 100% !important;">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="col-lg-12">
                    <h3>{!! trataTraducoes('titulo_registro_com_sucesso') !!}</h3>
                    @include('temas.inspinia.mostra_erros')

                    {!! trataTraducoes('texto_tela_registro_com_sucesso') !!}
                    <br><br>
                    <a href="{!! url('/') !!}">{!! trataTraducoes('clique_aqui') !!}</a> {!! trataTraducoes('texto_direcionar_usuario') !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection