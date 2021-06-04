@extends('veiculos::temas.'.$siteId['tema'].'.app')

@section('content')

<!--==============================Content=================================-->
<div class="content">
<div class="container_12">
    <div class="grid_5">
        <h3>{!! $data['nav']['contact']['data']['title'] !!}</h3>
        <div class="map">
            <div class="text1 color2">{!! $data['nav']['contact']['data']['subtitle'] !!}</div>
            <p>{!! $data['nav']['contact']['data']['content'] !!}</p>
            <address>
                <dl>
                    <dt>{!! $data['settings']['global']['site_address'] !!}</dt>
                    <dd><span>{!! trataTraducoes('Telefone') !!}:</span> {!! $data['settings']['global']['site_telefone'] !!} </dd>
                    <dd>{!! trataTraducoes('Email') !!}: <span class="color1"> {!! $data['settings']['global']['site_email'] !!} </span></dd>
                </dl>
            </address>
        </div>
    </div>
    <div class="grid_6 prefix_1">
        <h3>{!! trataTraducoes('Formulário de contato') !!}</h3>
        <form id="form" name="form" action="/contact" method="post">
            <label class="name">
                <input type="text" placeholder="{!! trataTraducoes('Nome') !!}:" name="nome" id="nome" required="required">
            </label>
            <label class="email">
                <input type="text" placeholder="{!! trataTraducoes('Email') !!}:" name="email" id="email" required="required">
            </label>
            <label class="phone">
                <input type="text" placeholder="{!! trataTraducoes('Telefone') !!}:" name="telefone" id="telefone" required="required">
            </label>
            <label class="message">
                <textarea placeholder="{!! trataTraducoes('Mensagem') !!}:" name="mensagem" id="mensagem" required="required"></textarea>
            </label>
            <div>
                <div class="clear"></div>
                <div class="btns">
                    <button type="submit" class="btn" style="border: 0px">{!! trataTraducoes('Enviar') !!}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="grid_12">
        <h3>{!! $data['nav']['contact']['map']['title'] !!}</h3>
        <div class="map">
            <figure>
                <iframe src="{!! $data['nav']['contact']['map']['map'] !!}" style="border:0 !important; width: {!! $data['nav']['contact']['map']['width'] !!} !important; height: {!! $data['nav']['contact']['map']['height'] !!} !important"></iframe>
            </figure>
        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
</div>

@endsection