<div class="col-sm-12 col-md-12">
    <div class="sidebar-form-wrapper">
        <div class="sidebar-form">
            <form name="formulario" id="formulario" action="car" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true" class="form2">
                @csrf()
                <div class="select1_wrapper">
                    <label>{!! trataTraducoes('Montadora') !!}</label>
                    <div class="select1_inner">
                        <select class="select2 select" style="width: 100%">
                            <option value="0">...</option>
                            @foreach( retornaItensUnicos('montadora') as $montadora )
                            <option value="{!! $montadora['montadora'] !!}">{!! $montadora['montadora'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="select1_wrapper">
                    <label>{!! trataTraducoes('Ano') !!}</label>
                    <div class="select1_inner">
                        <select class="select2 select" style="width: 100%">
                            <option value="0">...</option>
                            @foreach( retornaItensUnicos('ano_fabricacao') as $ano_fabricacao )
                            <option value="{!! $ano_fabricacao['ano_fabricacao'] !!}">{!! $ano_fabricacao['ano_fabricacao'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="slider-range-wrapper">
                    <div class="txt">{!! trataTraducoes('Média de valor') !!}</div>
                    <div class="slider-range"></div>
                    <div class="clearfix">
                        <input type="text" class="amount" readonly="">
                        <input type="text" class="amount2" readonly="">
                    </div>
                </div>
                <button type="submit" class="btn-default btn-form2-submit">{!! trataTraducoes('Filtrar') !!}</button>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-12">
    <div class="banner">
        <figure>
            <a href="#">
                <img src="images/banner.jpg" alt="" class="img-responsive">
            </a>
        </figure>
    </div>
</div>

<?php
    $min = Model('Veiculos','Veiculos')::orderby('valor')->first()['valor'];
    $max = Model('Veiculos','Veiculos')::orderby('valor','desc')->first()['valor'];
?>

<script>
    $(".slider-range").slider({
        range: true,
        min: 0,
        max: {!! $max !!},
        values: [{!! $min !!}, {!! $max !!}],
        slide: function (event, ui) {
            $(".amount").val("$" + ui.values[0]);
            $(".amount2").val("$" + ui.values[1]);
        }
    });

    $(".amount").val("$" + $(".slider-range").slider("values", 0));
    $(".amount2").val("$" + $(".slider-range").slider("values", 1));
</script>