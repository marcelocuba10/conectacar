<div class="box-select">
    <form class="rd-mailform" data-form-output="form-output-global" data-form-type="forms" method="get" action="/cars">
        <div class="row row-15">
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="form-label form-label-outside" for="car-make">{!! trataTraducoes('Montadora') !!}:</label>
                    <select class="form-input" id="carmaker" name="carmaker">
                        <option value="all">{!! trataTraducoes('Todos') !!}</option>
                        @foreach( listaPorTipodeItem('montadoras') as $key => $montadoras )
                        <option value="{!! $montadoras['id'] !!}" {!! !empty($_GET['carmaker']) ? (int)$_GET['carmaker'] === (int)$montadoras['id'] ? ' selected="selected"' : null : null !!}>{!! $montadoras['nome'] !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="form-label form-label-outside" for="car-model">{!! trataTraducoes('Modelo') !!}:</label>
                    <select class="form-input" id="model" name="model">
                        <option value="all">{!! trataTraducoes('Todos') !!}</option>
                        @foreach( listaVeiculosUnicosPorCampo('modelo') as $key => $modelo )
                        <option value="{!! $modelo['id'] !!}" {!! !empty($_GET['carmaker']) ? (int)$_GET['model'] === (int)$modelo['id'] ? ' selected="selected"' : null : null !!}>{!! $modelo['modelo'] !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="form-label form-label-outside" for="car-model">{!! trataTraducoes('Carroceria') !!}:</label>
                    <select class="form-input" id="bodywork" name="bodywork">
                        <option value="all">{!! trataTraducoes('Todos') !!}</option>
                        @foreach( listaVeiculosPorCarroceria() as $key => $carroceria )
                        <option value="{!! $carroceria['id'] !!}" {!! !empty($_GET['carmaker']) ? (int)$_GET['bodywork'] === (int)$carroceria['id'] ? ' selected="selected"' : null : null !!}>{!! $carroceria['variacao'] !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="form-label form-label-outside" for="car-min-year">{!! trataTraducoes('Ano mínimo') !!}:</label>
                    <select class="form-input" id="car-min-year" name="min_year">
                        <option value="all">{!! trataTraducoes('Todos') !!}</option>
                        @foreach( listaAnosDosVeiculos() as $key => $anosveiculos )
                        <option value="{!! $anosveiculos['ano_veiculo'] !!}" {!! !empty($_GET['carmaker']) ? (int)$_GET['min_year'] === (int)$anosveiculos['id'] ? ' selected="selected"' : null : null !!}>{!! $anosveiculos['ano_veiculo'] !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="form-label form-label-outside" for="car-max-year">{!! trataTraducoes('Ano máximo') !!}:</label>
                    <select class="form-input" id="car-max-year" name="max_year">
                        <option value="all">{!! trataTraducoes('Todos') !!}</option>
                        @foreach( listaAnosDosVeiculos() as $key => $anosveiculos )
                        <option value="{!! $anosveiculos['ano_veiculo'] !!}" {!! !empty($_GET['carmaker']) ? (int)$_GET['max_year'] === (int)$anosveiculos['id'] ? ' selected="selected"' : null : null !!}>{!! $anosveiculos['ano_veiculo'] !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="form-label form-label-outside" for="car-min-price">{!! trataTraducoes('Preço mínimo') !!}:</label>
                    <input class="form-input" id="car-min-price" name="min_value" placeholder="0.00">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="form-label form-label-outside" for="car-max-price">{!! trataTraducoes('Preço máximo') !!}:</label>
                    <input class="form-input" id="car-max-price" name="max_value" placeholder="0.00">
                </div>
            </div>
        </div>
        <button class="button button-block button-default button-ujarak" type="submit"><i class="fa fa-search"></i> &nbsp; {!! trataTraducoes('Filtrar') !!}</button>
    </form>
</div>