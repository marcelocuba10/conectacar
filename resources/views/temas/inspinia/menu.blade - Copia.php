<style>
    .fonteMenuCabecalho{
        font-size: 16pt !important;
        font-weight: bold !important;
    }
    .fonteMenuGeral{
        font-size: 12pt !important;
        font-weight: bold !important;
        white-space: nowrap !important;
    }
</style>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center fonteMenuCabecalho" style="line-height: 1; color: #fff !important">
                    <a href="/{!! strtolower(Auth()->user()->modulo) !!}/painel">
                        <img src="{!! site_id()['quaisDados']['logotipo'] !!}" style="max-width: 100% !important; height: auto !important; padding-bottom: 15px;" />
                    </a>
                    {{trataTraducoes('Bem vindo')}} <br /> {!! explode(' ',Auth()->user()->name)[0] !!}
                </div>
                <div class="logo-element">
                    <img src="{!! site_id()['quaisDados']['icone'] !!}" style="max-width: 40px;">
                </div>
            </li>

            <li class=""><a href="/{!! strtolower(Auth()->user()->modulo) !!}/painel" style="color: #fff !important;"><i class="fonteMenuGeral fa fa-dashboard"></i> <span class="nav-label fonteMenuGeral">{!! trataTraducoes('Início') !!}</span></a></li>
            @forelse( MenuSistema() as $key => $modulos )
                @if( strlen($modulos['link']) === 0 )
                    <li class="">
                        <a style="color: #fff !important;"> <i class="fonteMenuGeral {!! $modulos['icone'] !!}"></i> <span class="nav-label fonteMenuGeral">{!! trataTraducoes($modulos['menu']) !!}</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            @forelse( $modulos['menuFilho'] as $key => $menuPai  )
                            <li class=""><a class="fonteMenuGeral" onclick="montaTela('/{!! strtolower(Auth()->user()->modulo) !!}{!! $menuPai['link'] !!}');fechaMenu();" style="cursor: pointer; color: #fff !important;line-height: 1; margin: 15px 0px 15px 0px !important"><i class="fonteMenuGeral fa fa-caret-right"></i>{!! trataTraducoes($menuPai['menu']) !!}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </li>
                @else
                    <li class="">
                        <a onclick="montaTela('/{!! strtolower(Auth()->user()->modulo) !!}{!! $modulos['link'] !!}');fechaMenu();" style="cursor: pointer; color: #fff !important;">
                            <i class="fonteMenuGeral {!! $modulos['icone'] !!}"></i>
                            <span class="nav-label" style="line-height: 1">{!! trataTraducoes($modulos['menu']) !!}</span>
                        </a>
                    </li>
                @endif
            @empty
            @endforelse
            <li class=""><a href="/painel/sair" style="color: #fff !important;"><i class="fonteMenuGeral fa fa-power-off"></i> <span class="fonteMenuGeral nav-label">{!! trataTraducoes('Sair') !!}</span></a></li>
        </ul>
    </div>
</nav>