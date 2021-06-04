@extends('temas.inspinia.layout_login')
@section('content')

<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <div class="col-lg-12">
                    <h2 class="font-bold text-center">{!! trataTraducoes('novos_cadastros_precisam_de_indicacao') !!}</h2>
                    <div style="height: 30vh !important; overflow: auto;">
                        <p>
                            {!! trataTraducoes('novos_cadastros_precisam_de_indicacao_conteudo') !!}
                        </p>
                    </div>
                    <a class="btn btn-sm btn-white btn-block" href="/">{!! trataTraducoes('Início') !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection