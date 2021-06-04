<!-- https://livedemo00.template-help.com/wt_52302/ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>{!! !empty($data['settings']['site_name']) ? $data['settings']['site_name'] : 'site_name'!!}</title>
  <meta charset="utf-8">
  <meta name = "format-detection" content = "telephone=no" />
  
  <link rel="stylesheet" href="/temas/3/css/grid.css">
  <link rel="stylesheet" href="/temas/3/css/search.css">
  <link rel="stylesheet" href="/temas/3/css/camera.css">
  <link rel="stylesheet" href="/temas/3/booking/css/booking.css">
  <link rel="stylesheet" href="/temas/3/css/style.css">
  <link rel="stylesheet" href="/temas/3/css/contact-form.css">
  
  <script src="/temas/3/js/jquery.js"></script>
  <script src="/temas/3/js/jquery-migrate-1.2.1.js"></script>
  <script src="/temas/3/js/camera.js"></script>
  <script src="/temas/3/js/jquery.equalheights.js"></script>
  <script src="/temas/3/search/search.js"></script>
  <script src="/temas/3/booking/js/booking.js"></script>
  <script src="/temas/3/booking/js/jquery.placeholder.js"></script>
  <script src="/temas/3/js/jquery.mobile.customized.min.js"></script>
  <script src="/temas/3/js/wow/wow.js"></script>
  <script src="/temas/3/js/TMForm.js"></script>
  <script src="/temas/3/js/modal.js"></script>

  <script>
    $(document).ready(function () {
      $('#camera_wrap').camera({
        loader: true,
        pagination: true,
        minHeight: '',
        thumbnails: false,
        height: '52.8735632183908%',
        caption: true,
        navigation: false,
        fx: 'simpleFade',
        onLoaded: function () {
          $('.slider-wrapper')[0].style.height = 'auto';
        }
      });
      $("#tabs").tabs();
      $('#bookingForm').bookingForm({
        ownerEmail: '#'
      });
      $('#bookingForm2').bookingForm({
        ownerEmail: '#'
      });
    });
  </script>
  <script src="/temas/3/js/jquery.tabs.js"></script>

</head>

<body>
  <!--============= NAV ====================-->

  @include('veiculos::temas.3.nav')

  <!--============= CONTENT ====================-->

  @yield('content')

  <!--====================== FOOTER =======================-->

	<footer>
    <div class="container">
      <div class="row">
        <div class="grid_4">
          <div class="left-block">
            <div class="col-md-12">
              <div class="footer-logo">
                <a href="/tema/4" class="logo2">
                  <img src="/temas/4/img/logo.png" alt="" class="img-responsive" style="width: 70% !important;">
                </a>
              </div>
              <div style="margin-top: 20px;">
                <span>©&nbsp; </span>
                <span class="copyright-year">2021</span>
                <span>&nbsp;</span>
                <span>{!! !empty($data['settings']['site_name']) ? $data['settings']['site_name'] : 'site_name'!!}</span>
                <span>.&nbsp;</span>
              </div>
            </div>
          </div>
        </div>
        <div class="grid_4">
          <div class="right-block">
            <div class="footer-menu">
              <ul class="footer-menu-list">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Cars</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="contato">Contacts</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="grid_4">
          <div class="footer-info">
            <div class="info-address">
              <span aria-hidden="true" class="fa fa-map-marker novi-icon"></span>
              {!! !empty($data['settings']['site_endereco']) ? $data['settings']['site_endereco'] : 'site_endereco' !!}
            </div>
            <div class="info-phone">
              <span aria-hidden="true" class="fa fa-phone novi-icon"></span>
              {!! trataTraducoes('Telefone') !!}: {!! !empty($data['settings']['site_telefone']) ? $data['settings']['site_telefone'] : 'site_telefone' !!}
            </div>
            <div class="info-email">
              <span aria-hidden="true" class="fa fa-envelope novi-icon"></span>
              {!! trataTraducoes('Email') !!}:{!! !empty($data['settings']['site_email']) ? $data['settings']['site_email'] : 'site_email' !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="/temas/3/js/script.js"></script>
  
</body>
</html>