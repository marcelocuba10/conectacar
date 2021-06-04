<div id="resposta_erro_camera" style="display: block;">{!! trataTraducoes('nao_foi_possivel_acessar_o_dispositivo_da_camera') !!}</div>

<video id="js-video" class="reader-video" autoplay playsinline></video>
<canvas style="display:none" id="js-canvas"></canvas>

<br><br><br>

<a href="{!! url('/financial/payments/create/qrcode/') !!}/" id="js-link" class="modal-btn" target="_blank">
<span id="js-result" class="modal-result"></span>
</a>

<div id="js-modal-close"></div>

<script src="/qrcode/js/jsQR.js"></script>
<script src="/qrcode/js/app.js"></script>