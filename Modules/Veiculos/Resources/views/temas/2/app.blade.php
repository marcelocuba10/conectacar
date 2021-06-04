<!DOCTYPE html>
<html lang="en">
		<head>
		<title>{!! !empty($siteId['name']) ? $siteId['name'] : 'site_name'!!}</title>
		<link rel="icon" href="{!! !empty($data['settings']['favicon']) ? $data['settings']['favicon'] : null !!}" type="image/x-icon">
		<meta charset="utf-8">
		<meta name = "format-detection" content = "telephone=no" />
		<link rel="stylesheet" href="/temas/2/booking/css/booking.css">
		<link rel="stylesheet" href="/temas/2/css/style.css">
		<link rel="stylesheet" href="/temas/2/css/gflexSlider.css">
		<link rel="stylesheet" href="/temas/2/css/custom-style.css">
		<link rel="stylesheet" href="/temas/2/css/custom-slider.css">

		<script src="/temas/2/js/jquery.js"></script>
		<script src="/temas/2/js/jquery-migrate-1.2.1.js"></script>
		<script src="/temas/2/js/jquery.easing.1.3.js"></script>
		<script src="/temas/2/js/scroll_to_top.js"></script>
		<script src="/temas/2/js/script.js"></script>
		<script src="/temas/2/js/jquery.equalheights.js"></script>
		<script src="/temas/2/js/superfish.js"></script>
		<script src="/temas/2/js/jquery.mobilemenu.js"></script>
		<script src="/temas/2/js/touchTouch.jquery.js"></script>
		<script src="/temas/2/js/jquery.tools.min.js"></script>
		<script src="/temas/2/js/tmStickUp.js"></script>
		<link rel="stylesheet" href="/temas/2/fonts/font-awesome.css" type="text/css" media="screen">
		</head>
		<body>
			<div id="back-top">
				<i class="fa fa-arrow-circle-o-up"></i>
			</div>
			<div class="main"> 	
				@yield('content')
			</div>
			
			<footer>
				<div class="container" style="padding: 0px 0px 20px 0px;">
					<div class="row">
						<div class="grid_4">
							<div class="left-block" style="text-align: center">
								<div class="col-md-12">
									<a class="footer-brand" href="./">
										<img src="{!! verificaImagemSistem(( !empty($siteId['quaisDados']['logotipo']) ? $siteId['quaisDados']['logotipo'] : Null ),'veiculo_sem_foto.png') !!}" width="176" height="31" alt="">
									</a>
									<p class="privacy" style="margin-top: 10px;">
										<span>{!! !empty($siteId['name']) ? $siteId['name'] : trataTraducoes('site_name') !!}</span>
										<span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span>
									</p>
									<hr>
									<ul class="footer-menu-list" style="margin-top: 10px;">
										@foreach( $data['nav'] as $datas )
											<li>
												<a href="{!! ( strlen($datas['url']) === 1 ? '/' : '/'.$datas['url'] ) !!}">{!! trataTraducoes($datas['label']) !!}</a>
											</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="right-block">
								<div class="footer-menu" style="text-align: center;">
									<ul class="footer-menu-list">
										<iframe src="{!! $data['settings']['localizacao']['url'] !!}" frameborder="0"
										scrolling="no" width="{!! $data['settings']['localizacao']['width'] !!}"
										height="240px"></iframe>
									</ul>
								</div>
							</div>
						</div>
						<div class="grid_4">
							<div class="footer-info">
								<div class="info-address">
									<span aria-hidden="true" class="fa fa-map-marker novi-icon"></span>
									{!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : trataTraducoes('site_endereco') !!}
								</div>
								<div class="info-phone">
									<span aria-hidden="true" class="fa fa-phone novi-icon"></span>
									{!! trataTraducoes('Telefone') !!}: {!! !empty($siteId['quaisDados']['fone_1']) ? $siteId['quaisDados']['fone_1'] : trataTraducoes('site_telefone') !!}
								</div>
								<div class="info-email">
									<span aria-hidden="true" class="fa fa-envelope novi-icon"></span>
									{!! trataTraducoes('Email') !!}: {!! !empty($siteId['email']) ? $siteId['email'] : trataTraducoes('site_email') !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</body>
		<script>
			var slideIndex = 1;
			showSlides(slideIndex);
			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}
			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}
			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active";
			}
		</script>
</html>