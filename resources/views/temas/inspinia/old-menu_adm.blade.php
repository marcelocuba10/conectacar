<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="/temas/inspinia/img/profile_small.jpg"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" style="cursor: pointer; color: #fff">
                        <span class="block m-t-xs font-bold">{!! Auth()->user()->name !!}<b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" onclick="">@lang('global-'.idiomaPadrao().'.perfil')</a></li>
                        <li><a class="dropdown-item" onclick="">@lang('global-'.idiomaPadrao().'.contatos')</a></li>
                        <li><a class="dropdown-item" onclick="">@lang('global-'.idiomaPadrao().'.configuracoes')</a></li>
                        <li><a class="dropdown-item" href="/sair">@lang('global-'.idiomaPadrao().'.sair')</a></li>
                    </ul>
                </div>
                <div class="logo-element">IN+</div>
            </li>

            <li class=""><a href="/" style="color: #fff !important;"><i class="fa fa-dashboard"></i> @lang('global-'.idiomaPadrao().'.inicio')</a></li>
            @forelse( $menu as $key => $modulos )
            @if( strlen($modulos['link']) === 0 )
            <li class="">
                <a style="color: #fff !important;"> <i class="{!! $modulos['icone'] !!}"></i> <span class="nav-label">@lang('global-'.idiomaPadrao().'.'.$modulos['menu'])</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    @forelse( $modulos['menuFilho'] as $key => $menuPai  )
                        <li class=""><a onclick="montaTela('{!! $menuPai['link'] !!}');" style="cursor: pointer; color: #fff !important;"><i class="fa fa-caret-right"></i> @lang('global-'.idiomaPadrao().'.'.$menuPai['menu'])</a></li>
                    @empty
                    @endforelse
                </ul>
            </li>
            @else
            <li class=""><a onclick="montaTela('{!! $modulos['link'] !!}');" style="cursor: pointer; color: #fff !important;"><i class="{!! $modulos['icone'] !!}"></i> @lang('global-'.idiomaPadrao().'.'.$modulos['menu'])</a></li>
            @endif
            @empty
            @endforelse
            <li class=""><a href="/sair" style="color: #fff !important;"><i class="fa fa-power-off"></i> @lang('global-'.idiomaPadrao().'.sair')</a></li>
        </ul>
    </div>
</nav>