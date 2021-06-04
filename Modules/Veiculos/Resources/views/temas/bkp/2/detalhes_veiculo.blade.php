@extends('veiculos::temas.'.$siteId['tema'].'.app')

@section('content')

<div class="content" style="padding-top: 50px !important">
    <div class="container_12">
        <div class="grid_9">
            <div class="slider_wrapper ">
                <div id="camera_wrap" class="">
                    @foreach( $carroSelecionado['image'] as $fotosVeiculo )
                    <div data-src="{!! $fotosVeiculo !!}"></div>
                    @endforeach
                </div>
            </div>

            <div class="w3-container">
                <h2>Tabs</h2>
                <p>Tabs are perfect for single page web applications, or for web pages capable of displaying different subjects. Click on the links below.</p>
            </div>

            <div class="w3-bar w3-black" style="margin-bottom: 10px; width: 100%;">
                <a class="w3-bar-item w3-button" onclick="openCity('detalhes')" style="cursor: pointer; width: 50% !important; border: 1px solid #cecece; padding: 5px">{!! trataTraducoes('Detalhes do veículo') !!}</a>
                <a class="w3-bar-item w3-button" onclick="openCity('localizacao')" style="cursor: pointer; width: 50% !important; border: 1px solid #cecece; padding: 5px">{!! trataTraducoes('Localização do veículo') !!}</a>
            </div>

            <div style="border: 1px solid #cecece; padding: 15px;">
                <div id="detalhes" class="w3-container city">
                    <p>Checklist dos itens do veículo.</p>
                </div>

                <div id="localizacao" class="w3-container city" style="display:none">
                    <iframe src="{!! $data['nav']['contact']['map']['map'] !!}" style="border:0 !important; width: {!! $data['nav']['contact']['map']['width'] !!} !important; height: {!! $data['nav']['contact']['map']['height'] !!} !important"></iframe>
                </div>
            </div>


            <script>
                function openCity(cityName) {
                    var i;
                    var x = document.getElementsByClassName("city");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";  
                    }
                    document.getElementById(cityName).style.display = "block";  
                }
            </script>

        </div>
        <div class="grid_3">
            <div class="grid_3" style="border: 1px solid #cecece; padding: 5px;">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td>
                            {!! $carroSelecionado['nome'] !!}
                            <hr>
                            <button class="btn" style="background-color: {!! $data['settings']['global']['primary_color'] !!}; width: 100%; border: 0px">{!! $carroSelecionado['valor'] !!}</button>
                            <hr>
                            {!! $siteId['name'] !!}
                            <hr>
                            {!! ( !empty($siteId['qualDado'][0]) ? $siteId['qualDado'][0]['endereco'] . ', ' . $siteId['qualDado'][0]['numero'] . '<br>' . $siteId['qualDado'][0]['bairro'] . '<br>' . $siteId['qualDado'][0]['cidade'] . ' / ' . $siteId['qualDado'][0]['estado'] : ' - ' ) !!}
                            <hr>
                            <form id="form" name="form" action="/cars/details/{!! $carroSelecionado['hash_id'] !!}" method="post">
                                <label class="email">
                                    <input type="email" placeholder="{!! trataTraducoes('Email') !!}:" name="email" required="required" style="width: 100%">
                                </label>
                                <label class="message">
                                    <textarea placeholder="{!! trataTraducoes('Mensagem') !!}:" name="mensagem" id="mensagem" required="required"></textarea>
                                </label>
                                <div>
                                    <div class="clear"></div>
                                    <div class="btns">
                                        <button type="submit" class="btn" style="width: 100%; border: 0px"> <i class="fa fa-envelope"></i> {!! trataTraducoes('Enviar') !!}</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="clear"></div>
            <br>
            <div class="grid_3" style="border: 1px solid #cecece; padding: 5px;">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td>
                            conteudo de publicidade
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

@endsection