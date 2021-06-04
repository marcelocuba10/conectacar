<div data-src="{!! verificaImagemSistem("imagen") !!}">
    <div class="caption fadeIn">
      <div class="heading">
        <span class="first">{!! !empty($retornaCarros['ano']) ? $retornaCarros['ano'] : null !!}, {!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : 'nome_veiculo' !!}</span>
        <span class="second">{!! !empty($retornaCarros['carroceria']) ? $retornaCarros['carroceria'] : 'carroceria' !!} <span class="price">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</span></span>
      </div>
      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
        <span class="first">
          <strong>{!! !empty($retornaCarros['km']) ? $retornaCarros['km'] : 123 !!}</strong> km
        </span>
        <span class="second">
          <strong>{!! !empty($retornaCarros['combustivel']) ? $retornaCarros['combustivel'] : 'combustivel' !!}</strong>l
        </span>
      </div>
    </div>
  </div>