<div id="wrapper" style="background-image: url('{!! site_id()['fundo'] !!}'); background-size: auto 100% !important; background-repeat: no-repeat !important;">
    @include('temas.inspinia.menu')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('temas.inspinia.navegacaotopo')
        <section class="content" id="destinoHtml" style="margin-top: -20px !important;">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">

                            <h4 style="float: right;">
                                <a href="/{{Auth()->user()->modulo}}" style="cursor: pointer;">
                                    <span class="nav-label">Atualizar página</span>
                                </a>
                            </h4>
                            <div class="ibox-title">
                                <h5>{!! trataTraducoes('Início') !!}</h5>
                            </div>

                            <div class="ibox-content">
                                <div class="table-responsive">
                                    chamar componente pra montar os widgets do usuário logado
                                    <br><br>
                                    {!! Auth()->user()->modulo !!} - \temas\inspinia\dashboard
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="footer">
            <div class="float-right">&copy; Copyright {!! date('Y') !!} {!! site_id()['name'] !!} - {!! trataTraducoes('Todos os direitos reservados') !!}</div>
        </div>
    </div>
    <?php
    /*
    include('temas.inspinia.menudireita')
    */
    ?>
</div>