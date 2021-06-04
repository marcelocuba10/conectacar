<?php
$data=["imagen"=>"imagen"];
?>

@extends('veiculos::temas.'.$siteId['tema'].'.app')
@section('content')

<section id="content">
  <div class="width-wrapper width-wrapper__inset1">
    <div class="wrapper1">
      <div class="container">
        <div class="row">
          <div class="grid_3">
            <div id="tabs">
              <div class="row">
                <div class="grid_3">
                  <ul class="tabs-list">
                    <li>
                      <a href="#tabs-1">
                        <div class="tab tab-first maxheight">
                          Used cars
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#tabs-2">
                        <div class="tab maxheight">
                          New cars
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div id="tabs-1">
                <form id="bookingForm" class="bookingForm1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                  <span class="heading">Make:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any Make</option>
                    <option>Any Make 1</option>
                    <option>Any Make 2</option>
                    <option>Any Make 3</option>
                    <option>Any Make 4</option>
                    <option>Any Make 5</option>
                  </select>
                  <span class="heading">Model:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any Model</option>
                    <option>Any Model 1</option>
                    <option>Any Model 2</option>
                    <option>Any Model 3</option>
                    <option>Any Model 4</option>
                    <option>Any Model 5</option>
                  </select>
                  <span class="heading">Region:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any</option>
                    <option>Any 1</option>
                    <option>Any 2</option>
                    <option>Any 3</option>
                    <option>Any 4</option>
                    <option>Any 5</option>
                  </select>
                  <div class="narrow-selects">
                    <div class="block-left">
                      <span class="heading">Min Year:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>Min</option>
                        <option>Min 1</option>
                        <option>Min 2</option>
                        <option>Min 3</option>
                        <option>Min 4</option>
                        <option>Min 5</option>
                      </select>
                    </div>
                    <div class="block-right">
                      <span class="heading">Max Year:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>2014</option>
                        <option>2013</option>
                        <option>2012</option>
                        <option>2011</option>
                        <option>2010</option>
                        <option>2009</option>
                      </select>
                    </div>

                    <div class="block-left">
                      <span class="heading">Min Price:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>Min</option>
                        <option>Min 1</option>
                        <option>Min 2</option>
                        <option>Min 3</option>
                        <option>Min 4</option>
                        <option>Min 5</option>
                      </select>
                    </div>
                    <div class="block-right">
                      <span class="heading">Max Price:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>Max</option>
                        <option>Max 1</option>
                        <option>Max 2</option>
                        <option>Max 3</option>
                        <option>Max 4</option>
                        <option>Max 5</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <span class="heading">Body Type:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any Make</option>
                    <option>Any Make 1</option>
                    <option>Any Make 2</option>
                    <option>Any Make 3</option>
                    <option>Any Make 4</option>
                    <option>Any Make 5</option>
                  </select>
                  <a href="#" class="btn-big" data-type="submit">Find a car</a>
                  <a href="#" class="simple">Detailed Search</a>
                </form>
              </div>
              <div id="tabs-2">
                <form id="bookingForm2" class="bookingForm1">
                  <span class="heading">Make:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any Make</option>
                    <option>Any Make 1</option>
                    <option>Any Make 2</option>
                    <option>Any Make 3</option>
                    <option>Any Make 4</option>
                    <option>Any Make 5</option>
                  </select>
                  <span class="heading">Model:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any Model</option>
                    <option>Any Model 1</option>
                    <option>Any Model 2</option>
                    <option>Any Model 3</option>
                    <option>Any Model 4</option>
                    <option>Any Model 5</option>
                  </select>
                  <span class="heading">Region:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any</option>
                    <option>Any 1</option>
                    <option>Any 2</option>
                    <option>Any 3</option>
                    <option>Any 4</option>
                    <option>Any 5</option>
                  </select>
                  <div class="narrow-selects">
                    <div class="block-left">
                      <span class="heading">Min Year:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>Min</option>
                        <option>Min 1</option>
                        <option>Min 2</option>
                        <option>Min 3</option>
                        <option>Min 4</option>
                        <option>Min 5</option>
                      </select>
                    </div>
                    <div class="block-right">
                      <span class="heading">Max Year:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>2014</option>
                        <option>2013</option>
                        <option>2012</option>
                        <option>2011</option>
                        <option>2010</option>
                        <option>2009</option>
                      </select>
                    </div>

                    <div class="block-left">
                      <span class="heading">Min Price:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>Min</option>
                        <option>Min 1</option>
                        <option>Min 2</option>
                        <option>Min 3</option>
                        <option>Min 4</option>
                        <option>Min 5</option>
                      </select>
                    </div>
                    <div class="block-right">
                      <span class="heading">Max Price:</span>
                      <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                        <option>Max</option>
                        <option>Max 1</option>
                        <option>Max 2</option>
                        <option>Max 3</option>
                        <option>Max 4</option>
                        <option>Max 5</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <span class="heading">Body Type:</span>
                  <select name="Make" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="@Required">
                    <option>Any Make</option>
                    <option>Any Make 1</option>
                    <option>Any Make 2</option>
                    <option>Any Make 3</option>
                    <option>Any Make 4</option>
                    <option>Any Make 5</option>
                  </select>
                  <a href="#" class="btn-big" data-type="submit">Find a car</a>
                  <a href="#" class="simple">Detailed Search</a>
                </form>
              </div>
            </div>
            <div class="banner1">
              <h2 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <a href="#">About our Services</a>
              </h2>
              <p class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
            </div>
            <div class="post1">
              <h2 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">Latest REVIEWS</h2>
              <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
              <time class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" datetime="2014-01-01">Monday, June 24, 2013</time>
              <h3 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                <a href="#">Lorem ipsum dolor sit amet conse</a>
              </h3>
              <p class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
            </div>
          </div>
          <div class="grid_9">
            <div class="slider-wrapper">
              <div id="camera_wrap">
                <div data-src="{!! verificaImagemSistem($data["imagen"]) !!}">
                  <div class="caption fadeIn">
                    <div class="heading">
                      <span class="first">2014 Mercedes-Benz</span>
                      <span class="second">GLK-Class <span class="price">$89999</span></span>
                    </div>
                    <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                      <span class="first">
                        Mileage: <strong>130 000</strong> km
                      </span>
                      <span class="second">
                        Volume capacity: <strong>1.3</strong>l
                      </span>
                    </div>
                  </div>
                </div>
                <div data-src="{!! verificaImagemSistem($data["imagen"]) !!}">
                  <div class="caption fadeIn">
                    <div class="heading">
                      <span class="first">2014 Lexus</span>
                      <span class="second">GX 460 <span class="price">$89999</span></span>
                    </div>
                    <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                      <span class="first">
                        Mileage: <strong>130 000</strong> km
                      </span>
                      <span class="second">
                        Volume capacity: <strong>1.3</strong>l
                      </span>
                    </div>
                  </div>
                </div>
                <div data-src="{!! verificaImagemSistem($data["imagen"]) !!}">
                  <div class="caption fadeIn">
                    <div class="heading">
                      <span class="first">2014 Lexus</span>
                      <span class="second">LF-NX Hybrid <span class="price">$89999</span></span>
                    </div>
                    <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                      <span class="first">
                        Mileage: <strong>130 000</strong> km
                      </span>
                      <span class="second">
                        Volume capacity: <strong>1.3</strong>l
                      </span>
                    </div>
                  </div>
                </div>
                <div data-src="{!! verificaImagemSistem($data["imagen"]) !!}">
                  <div class="caption fadeIn">
                    <div class="heading">
                      <span class="first">2014 Cadillac</span>
                      <span class="second">Escalade <span class="price">$149999</span></span>
                    </div>
                    <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                      <span class="first">
                        Mileage: <strong>130 000</strong> km
                      </span>
                      <span class="second">
                        Volume capacity: <strong>1.3</strong>l
                      </span>
                    </div>
                  </div>
                </div>
                <div data-src="{!! verificaImagemSistem($data["imagen"]) !!}">
                  <div class="caption fadeIn">
                    <div class="heading">
                      <span class="first">2014 Lexus</span>
                      <span class="second">IS 350 F Sport <span class="price">$49999</span></span>
                    </div>
                    <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                      <span class="first">
                        Mileage: <strong>130 000</strong> km
                      </span>
                      <span class="second">
                        Volume capacity: <strong>1.3</strong>l
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="wrapper2">
              <div class="heading1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>Latest used cars</h2>
              </div>
              <div class="border-wrapper1 wrapper3">
                <div class="row">
                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-wrapper1 wrapper3">
                <div class="row">
                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-wrapper1 wrapper3">
                <div class="row">
                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-wrapper1 wrapper3">
                <div class="row">
                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                  <div class="grid_3">
                    <div class="box1">
                      <h4 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                        <a href="#">2011  Lorem ipsum dolor</a>
                      </h4>
                      <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                      <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <span class="first">Mileage: <span class="highlighted">130 000 km</span></span>
                        <span class="second">Volume capacity: <span class="highlighted">1.3l</span></span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="info2 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="price">
                          <span class="first">Price:</span>
                          <span class="second">$26899</span>
                        </div>
                        <a class="btn-default" href="#">
                          <span>Details</span>
                        </a>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="button-wrapper1">
                <a class="btn-big-green wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s" href="#">
                  <span>See all cars</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection