@extends('veiculos::temas.1.app')
@section('content')

<div class="section novi-background bg-cover" style="margin-bottom: 50px;">
    @include('veiculos::temas.1.breadcrumb',['dados' => ['Contato']])
    <div class="container">
        <div class="row" style="margin-top: 20px">
            @foreach( $data['conteudo'] as $key => $datas )
            @include('veiculos::temas.1.'.$datas['layout'])
            @endforeach
        </div>
    </div>
</div>

@endsection