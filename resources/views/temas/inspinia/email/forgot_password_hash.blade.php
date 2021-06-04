@extends('temas.inspinia.layout_login')
@section('content')
<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold text-center">{!! trataTraducoes('Altere sua senha') !!}</h2>
                <p>{!! trataTraducoes('Informe sua nova senha') !!}</p>
                @include('temas.inspinia.mostra_erros')
                <div class="row">
                    <div class="col-lg-12">
                        <form autocomplete="off" name="formulario" id="formulario" action="/forgot_password/{!! $hash !!}" method="post" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true, finalizaSummernote()">
                        @csrf
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="{!! trataTraducoes('Senha') !!}" required="">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="re-password" placeholder="{!! trataTraducoes('Confirme sua senha') !!}" required="">
                            </div>

                            <button type="submit" class="btn btn-primary block full-width m-b"> {!! trataTraducoes('Alterar senha') !!}</button>
                        </form>
                        @include('temas.inspinia.formulario_rodape')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
          .register("/clientes/{!! site_id()['id'] !!}/pwa/service-worker.js")
          .then(function (reg) {
            console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
          });
    }else{
      console.log('Else service woerker')
    }
</script>

@endsection