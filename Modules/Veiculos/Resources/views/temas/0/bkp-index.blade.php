<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/temas/{!! $siteId['tema'] !!}/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="/temas/{!! $siteId['tema'] !!}/css/css.css?family=Lato:400,700,900&amp;display=swap">
    <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/bootstrap.css">
    <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/fonts.css">
    <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <div class="page">
        <header class="section page-header">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="147px" data-xl-stick-up-offset="147px" data-xxl-stick-up-offset="147px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
                        <span></span>
                    </div>
                    <div class="rd-navbar-custom-toggle rd-navbar-fixed-element-2 rd-custom-toggle" data-custom-toggle=".rd-navbar-link-toggle" data-custom-toggle-disable-on-blur="true">
                        <span class="fa-filter"></span>
                    </div>
                    <div class="rd-navbar-aside-outer rd-navbar-collapse">
                        <div class="rd-navbar-aside">
                            <div class="rd-navbar-aside-element rd-navbar-aside-element-1">
                                <div class="rd-navbar-brand">
                                    <a class="brand" href="index.html">
                                        <img class="brand-logo-dark" src="{!! verificaImagemSistem($siteId['logotipo'],'/temas/2/images/logo.png') !!}" alt="" width="372" height="61"/>
                                        <img class="brand-logo-light" src="/temas/{!! $siteId['tema'] !!}/images/logo-inverse-744x122.png" alt="" width="372" height="61"/>
                                    </a>
                                </div>
                            </div>
                            <div class="rd-navbar-aside-element rd-navbar-aside-element-2">
                                <ul class="list-inline">
                                    <li><a class="link-default" href="#">{!! trataTraducoes('Entrar') !!}</a></li>
                                    <li><a class="link-default" href="#">{!! trataTraducoes('Solicite uma demonstração') !!}</a></li>
                                </ul>
                                @foreach( pegaIdiomasDisponiveis() as $idiomas )
                                <a class="button button-default button-ujarak button-icon button-icon-left" href="?language={!! $idiomas['sigla'] !!}" style="padding: 1px 1px 1px 1px; background-color: transparent !important;">
                                    <img src="{!! $idiomas['imagem'] !!}" style="height: 30px !important;">
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-panel">
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <div class="rd-navbar-brand">
                                    <a class="brand" href="index.html"><img class="brand-logo-dark" src="{!! verificaImagemSistem($siteId['logotipo'],'/temas/2/images/logo.png') !!}" alt="" width="372" height="61"/><img class="brand-logo-light" src="/temas/{!! $siteId['tema'] !!}/images/logo-inverse-744x122.png" alt="" width="372" height="61"/></a>
                                </div>
                            </div>
                            <div class="rd-navbar-main-element">
                                <div class="rd-navbar-nav-wrap">
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item active"><a class="rd-nav-link" href="/">{!! trataTraducoes('Ínício') !!}</a></li>
                                        <?php
/*
<li class="rd-nav-item"><a class="rd-nav-link" href="new-cars.html">{!! trataTraducoes('Últimos carros') !!}</a>
<ul class="rd-menu rd-navbar-dropdown">
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Sedans</a>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Hatchbacks</a>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">MPVs</a>
<ul class="rd-menu rd-navbar-dropdown">
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Citroën C4 Picasso</a>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Chevrolet Orlando</a>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Opel Zafira Tourer</a>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Peugeot 5008</a>
</li>
</ul>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">SUVs</a>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Crossovers</a>
</li>
<li class="rd-dropdown-item"><a class="rd-dropdown-link" href="#">Convertibles</a>
</li>
</ul>
</li>
*/
?>
<li class="rd-nav-item"><a class="rd-nav-link" href="/about">{!! trataTraducoes('Quem somos') !!}</a></li>
<li class="rd-nav-item"><a class="rd-nav-link">{!! trataTraducoes('Veículos') !!}</a>
    <ul class="rd-menu rd-navbar-megamenu">
        <li class="rd-megamenu-item">
            <div class="row">
                @foreach( buscaVeiculosPorMarca() as $data )
                <div class="col-lg-4 rd-megamenu-list-item">
                    <a class="rd-megamenu-list-link" href="/cars?brand={!! $data['nome'] !!}">
                        {!! $data['nome'] !!}
                    </a>
                </div>
                @endforeach
            </div>
        </li>
    </ul>
</li>
<li class="rd-nav-item"><a class="rd-nav-link" href="/stores">{!! trataTraducoes('Lojas') !!}</a></li>
<li class="rd-nav-item"><a class="rd-nav-link" href="/services">{!! trataTraducoes('Serviços') !!}</a></li>
<li class="rd-nav-item"><a class="rd-nav-link" href="/contact">{!! trataTraducoes('Contato') !!}</a></li>
</ul>
</div>
</div>
</div>
</div>
</nav>
</div>
</header>
<section class="section section-xs bg-default">
    <div class="container">
        <div class="row row-30 flex-xl-row-reverse">
            <div class="col-xl-10">
                <div class="row row-ten row-30">
                    <div class="col-xl-10">
                        <div class="swiper-container swiper-slider swiper-slider-1" data-loop="true" data-autoplay="5500" data-simulate-touch="false" data-effect="fade">
                            <div class="swiper-wrapper text-center">
                                <div class="swiper-slide" data-slide-bg="/temas/{!! $siteId['tema'] !!}/images/slide-01.jpg">
                                    <div class="swiper-slide-caption">
                                        <div class="swiper-slide-price" data-caption-animate="fadeIn" data-caption-delay="10" data-caption-duration="900"><span>2019</span></div>
                                        <div class="swiper-slide-caption-bottom" data-caption-animate="fadeIn" data-caption-delay="10" data-caption-duration="900">
                                            <h3 data-caption-animate="fadeInUp" data-caption-delay="100" data-caption-duration="900"><a href="new-cars.html"><span class="font-weight-bold text-primary">$119,965</span> BMW 5 Series Sedan</a></h3>
                                            <p data-caption-animate="fadeInUp" data-caption-delay="250" data-caption-duration="900">Every BMW is built for demanding drivers. With intuitive controls, advanced technology, and a comfortable cabin, the BMW 5 Series Sedan doesn’t just satisfy a driver’s desires – it exceeds all expectations. The BMW 5 Series features technology that’s easy to use and keeps you connected.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-slide-bg="/temas/{!! $siteId['tema'] !!}/images/slide-02.jpg">
                                    <div class="swiper-slide-caption">
                                        <div class="swiper-slide-price" data-caption-animate="fadeIn" data-caption-delay="10" data-caption-duration="900"><span>2019</span></div>
                                        <div class="swiper-slide-caption-bottom" data-caption-animate="fadeIn" data-caption-delay="10" data-caption-duration="900">
                                            <h3 data-caption-animate="fadeInUp" data-caption-delay="100" data-caption-duration="900"><a href="new-cars.html"><span class="font-weight-bold text-primary">$89,965</span> BMW 328i Gran Turismo</a></h3>
                                            <p data-caption-animate="fadeInUp" data-caption-delay="250" data-caption-duration="900">The BMW 3 Series Gran Turismo is one of the quirkier options among small luxury cars. It's not a crossover, but it has elevated seats and standard all-wheel drive. It's not a wagon, but its cargo capacity compares favorably to that of the actual 3 Series wagon.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide" data-slide-bg="/temas/{!! $siteId['tema'] !!}/images/slide-03.jpg">
                                    <div class="swiper-slide-caption">
                                        <div class="swiper-slide-price" data-caption-animate="fadeIn" data-caption-delay="10" data-caption-duration="900"><span>2019</span></div>
                                        <div class="swiper-slide-caption-bottom" data-caption-animate="fadeIn" data-caption-delay="10" data-caption-duration="900">
                                            <h3 data-caption-animate="fadeInUp" data-caption-delay="100" data-caption-duration="900"><a href="new-cars.html"><span class="font-weight-bold text-primary">$189,965</span> Mercedes-Benz C63 AMG</a></h3>
                                            <p data-caption-animate="fadeInUp" data-caption-delay="250" data-caption-duration="900">The most obvious feature of the comprehensive model maintenance of the new C-Class is the AMG-specific radiator trim. The new AMG SPEEDSHIFT MCT 9 sports transmission allows shift times almost at racing level, allowing the driver to focus on what matters most.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tabs-custom tabs-horizontal tabs-products" id="tabs-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-1" data-toggle="tab">Latest new cars</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Latest used cars</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="tabs-1-1">
                                    <div class="row row-30">
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-01-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$119,965</span></h5>
                                                <h6 class="product-title"><a href="new-cars.html">BMW 5 Series Sedan</a></h6>
                                                <div class="product-mile"><span>Mileage: 0 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-02-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$125,896</span></h5>
                                                <h6 class="product-title"><a href="new-cars.html">Bentley continental</a></h6>
                                                <div class="product-mile"><span>Mileage: 0 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-03-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$115,919</span></h5>
                                                <h6 class="product-title"><a href="new-cars.html">Ferrari 599 SA Aperta</a></h6>
                                                <div class="product-mile"><span>Mileage: 0 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-04-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$85,896</span></h5>
                                                <h6 class="product-title"><a href="new-cars.html">2014 Mercedes Benz CLS 550 </a></h6>
                                                <div class="product-mile"><span>Mileage: 0 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-05-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$112,589</span></h5>
                                                <h6 class="product-title"><a href="new-cars.html">Bentley Mulsanne 6.75 V8</a></h6>
                                                <div class="product-mile"><span>Mileage: 0 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-06-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$129,329</span></h5>
                                                <h6 class="product-title"><a href="new-cars.html">2014 Mercedes Benz CLS 550 </a></h6>
                                                <div class="product-mile"><span>Mileage: 0 mi.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-1-2">
                                    <div class="row row-30">
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-04-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$85,896</span></h5>
                                                <h6 class="product-title"><a href="used-cars.html">2014 Mercedes Benz CLS 550 </a></h6>
                                                <div class="product-mile"><span>Mileage: 2,000  mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-05-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$112,589</span></h5>
                                                <h6 class="product-title"><a href="used-cars.html">Bentley Mulsanne 6.75 V8</a></h6>
                                                <div class="product-mile"><span>Mileage: 2,500  mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-06-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$129,329</span></h5>
                                                <h6 class="product-title"><a href="used-cars.html">2014 Mercedes Benz CLS 550 </a></h6>
                                                <div class="product-mile"><span>Mileage: 2,000 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-03-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$115,919</span></h5>
                                                <h6 class="product-title"><a href="used-cars.html">Ferrari 599 SA Aperta</a></h6>
                                                <div class="product-mile"><span>Mileage: 2,100 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-01-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$119,965</span></h5>
                                                <h6 class="product-title"><a href="used-cars.html">BMW 5 Series Sedan</a></h6>
                                                <div class="product-mile"><span>Mileage: 3,500 mi.</span></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-6">
                                            <div class="product">
                                                <div class="product-image"><img src="/temas/{!! $siteId['tema'] !!}/images/product-02-270x175.jpg" alt="" width="270" height="175"/>
                                                </div>
                                                <h5 class="product-price"><span>$125,896</span></h5>
                                                <h6 class="product-title"><a href="used-cars.html">Bentley continental</a></h6>
                                                <div class="product-mile"><span>Mileage: 1,600  mi.</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><a class="button button-primary button-ujarak" href="used-cars.html">see all cars</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row row-30">
                            <div class="col-md-6 col-lg-12">
                                <div class="review-block">
                                    <h4>Car reviews</h4>
                                    <article class="review">
                                        <h6 class="review-title"><a href="#">2019 Audi A4 Review: one of the best small luxury cars</a></h6>
                                        <p class="review-text">The 2019 Audi A4 is an excellent luxury small car. In fact, it’s one of the best upscale sports sedans on the market. Its interior is refined, upscale, and modern...</p>
                                        <ul class="review-meta">
                                            <li>
                                                <div class="link-with-icon"><span class="icon fa-comment"></span><a href="#">23</a></div>
                                            </li>
                                            <li>
                                                <div class="link-with-icon"><span class="icon fa-thumbs-o-up"></span><a href="#">15</a></div>
                                            </li>
                                        </ul>
                                    </article>
                                    <article class="review">
                                        <h6 class="review-title"><a href="#">Mini Cooper S 5-door 2019 review: features and benefits</a></h6>
                                        <p class="review-text">There are many cars out there that will gladly ferry you from one destination safely, reliably, and in comfort. But for drivers that want something a little more...</p>
                                        <ul class="review-meta">
                                            <li>
                                                <div class="link-with-icon"><span class="icon fa-comment"></span><a href="#">23</a></div>
                                            </li>
                                            <li>
                                                <div class="link-with-icon"><span class="icon fa-thumbs-o-up"></span><a href="#">15</a></div>
                                            </li>
                                        </ul>
                                    </article><a class="review-button" href="#">See all reviews</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="box-about">
                                    <h4>About us</h4>
                                    <h6><a href="parts.html">The leading website for new and used cars since 2007</a></h6>
                                    <p>Car Selling is a two-sided digital automotive marketplace that connects car shoppers with sellers. Launched more than 10 years ago and headquartered in San Diego, the company empowers shoppers with the data, resources and digital tools needed to make informed buying decisions and seamlessly connect with automotive retailers that provide the best options for their customers.</p><a class="button button-primary button-ujarak" href="parts.html">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="row row-30">
                    <div class="col-12 col-lg-4 col-xl-12 rd-navbar-link-toggle">
                        <div class="box-select">
                            <form class="rd-mailform" data-form-output="form-output-global" data-form-type="forms" method="post" action="bat/rd-mailform.php">
                                <div class="row row-15">
                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="form-label form-label-outside" for="car-make">Make:</label>
                                            <select class="form-input" id="car-make" name="gender" data-constraints="@Required" data-placeholder="Any Make">
                                                <option label="placeholder"></option>
                                                <option>Audi</option>
                                                <option>Chevrolet</option>
                                                <option>Ford</option>
                                                <option>Toyota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="form-label form-label-outside" for="car-model">Model:</label>
                                            <select class="form-input" id="car-model" name="gender" data-constraints="@Required" data-placeholder="Any Model">
                                                <option label="placeholder"></option>
                                                <option>Audi Q5</option>
                                                <option>Chevrolet Camaro</option>
                                                <option>Ford Focus</option>
                                                <option>Toyota Corolla</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="form-label form-label-outside" for="car-min-year">Min Year:</label>
                                            <select class="form-input" id="car-min-year" name="gender" data-constraints="@Required" data-placeholder="Select Min Year">
                                                <option label="placeholder"></option>
                                                <option>2018</option>
                                                <option>2016</option>
                                                <option>2014</option>
                                                <option>2012</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="form-label form-label-outside" for="car-max-year">Max Year:</label>
                                            <select class="form-input" id="car-max-year" name="gender" data-constraints="@Required" data-placeholder="Select Max Year">
                                                <option label="placeholder"></option>
                                                <option>2019</option>
                                                <option>2017</option>
                                                <option>2015</option>
                                                <option>2013</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="form-label form-label-outside" for="car-min-price">Min Price:</label>
                                            <select class="form-input" id="car-min-price" name="gender" data-constraints="@Required" data-placeholder="Choose Min Price">
                                                <option label="placeholder"></option>
                                                <option>$195.345</option>
                                                <option>$210,250</option>
                                                <option>$300,199</option>
                                                <option>$400,450</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="form-label form-label-outside" for="car-max-price">Max Price:</label>
                                            <select class="form-input" id="car-max-price" name="gender" data-constraints="@Required" data-placeholder="Choose Max Price">
                                                <option label="placeholder"></option>
                                                <option>$243,359</option>
                                                <option>$356,299</option>
                                                <option>$415,219</option>
                                                <option>$520,349</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="button button-block button-default button-ujarak" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-6 col-lg-4 col-xl-12">
                        <div class="banner">
                            <div class="banner-image" style="background-image: url('/temas/{!! $siteId['tema'] !!}/images/banner-01-310x232.jpg')"></div>
                            <div class="banner-body">
                                <h5 class="banner-title"><a href="new-cars.html">A wide selection of electric cars and hybrid vehicles</a></h5>
                                <p class="banner-text">From Tesla Model 3 to Chevrolet Bolt, we have a vast range of cars from all over the world.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-lg-4 col-xl-12">
                        <div class="cta">
                            <div class="cta-image" style="background-image: url('/temas/{!! $siteId['tema'] !!}/images/cta-01-235x325.jpg')"></div>
                            <div class="cta-body">
                                <div class="cta-title">Call Toll Free:</div><a class="cta-tel" href="tel:#">(800) 2345-6789</a>
                                <p class="cta-text">Our expert support team is always ready to answer your questions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="section footer-classic context-dark">
    <div class="container text-center">
        <div class="row row-12 align-items-center">
            <div class="col-lg-6 text-lg-left"><a href="index.html"><img src="{!! verificaImagemSistem($siteId['logotipo'],'/temas/2/images/logo.png') !!}" alt="" width="372" height="61"/></a></div>
            <div class="col-lg-6 text-lg-right">
                <ul class="footer-list-inline">
                    <li><a class="active" href="index.html">Find a car</a></li>
                    <li><a href="used-cars.html">Used cars</a></li>
                    <li><a href="new-cars.html">New cars</a></li>
                    <li><a href="parts.html">Parts</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                </ul>
            </div>
        </div>
        <div class="row row-12 align-items-center flex-lg-row-reverse">
            <div class="col-lg-6 text-lg-right">
                <ul class="list-inline list-inline-sm">
                    <li><a class="icon icon-circle fa-facebook-f" href="#"></a></li>
                    <li><a class="icon icon-circle fa-twitter" href="#"></a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-lg-left">
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span>All Rights Reserved. <a href="privacy-policy.html">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="snackbars" id="form-output-global"></div>
<script src="/temas/{!! $siteId['tema'] !!}/js/core.min.js"></script>
<script src="/temas/{!! $siteId['tema'] !!}/js/script.js"></script>
</html>