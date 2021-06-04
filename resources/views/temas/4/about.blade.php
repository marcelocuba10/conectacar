@extends('veiculos::temas.4.app')

@section('content')

<!--==============================header=================================-->
@include('veiculos::temas.4.menu')
<!--=======content================================-->

        <div class="who-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp">
                        <h2>{!! trataTraducoes("About Us") !!}</h2>
                        <div class="thumb-pad4">
                            <div class="thumbnail">
                                <figure><img src="{!! verificaImagemSistem("image") !!}" alt=""></figure>
                                <div class="caption">
                                    <p>Sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h2>{!! trataTraducoes("Our Mission") !!}</h2>
                        <p>Nulla gravida risus erat, ut suscipit tellus laoreet porttitor pretium odio facilisis sodales imperdiet eros a, tinci vestibulum ante ipsum primis in ; Etiam finibus, erat ac consequat tincidunt, quam urna venenatis augue, nec rutrum felis ex nec tellus. </p>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                        <h2>{!! trataTraducoes("Our Vision") !!}</h2>
                        <p>Nulla gravida risus erat, ut suscipit tellus laoreet porttitor pretium odio facilisis sodales imperdiet eros a, tinci vestibulum ante ipsum primis in ; Etiam finibus, erat ac consequat tincidunt, quam urna venenatis augue, nec rutrum felis ex nec tellus. </p>
                    </div>
                </div>
            </div>
        </div> 
</div>
@endsection