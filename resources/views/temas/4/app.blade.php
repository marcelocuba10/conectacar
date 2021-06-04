<!DOCTYPE html>

<!-- https://livedemo00.template-help.com/wt_50771/index.html -->

<html lang="en">
	<head>
	<title>{!! !empty($data['settings']['site_name']) ? $data['settings']['site_name'] : 'site_name'!!}</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="stylesheet" href="/temas/4/booking/css/booking.css">
	<link rel="stylesheet" href="/temas/4/css/style.css">
	<link rel="stylesheet" href="/temas/4/css/gflexSlider.css">

	<script src="/temas/4/js/jquery.js"></script>
	<script src="/temas/4/js/jquery-migrate-1.2.1.js"></script>
	<script src="/temas/4/js/jquery.easing.1.3.js"></script>
	<script src="/temas/4/js/scroll_to_top.js"></script>
	<script src="/temas/4/js/script.js"></script>
	<script src="/temas/4/js/jquery.equalheights.js"></script>
	<script src="/temas/4/js/superfish.js"></script>
	<script src="/temas/4/js/jquery.mobilemenu.js"></script>
	<script src="/temas/4/js/touchTouch.jquery.js"></script>
	<script src="/temas/4/js/jquery.tools.min.js"></script>
	<script src="/temas/4/js/tmStickUp.js"></script>
	<link rel="stylesheet" href="/temas/4/fonts/font-awesome.css" type="text/css" media="screen">
	</head>
<body>

<!--button back top-->
<div id="back-top"><i class="fa fa-arrow-circle-o-up"></i></div>  

<!--=======content================================-->
<div class="main">
	<div class="div-content">  	
		@yield('content');
	</div>
<!--=======footer=================================-->
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
</div>

</html>