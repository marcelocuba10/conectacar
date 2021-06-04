@extends('temas.2.app');

<?php

  $data=["imagen"=>"imagen"];

?>

@section('content')

    <!--========================================================
                              HEADER
    =========================================================-->
    <header class="mod-1">
        <div id="stuck_container" class="stuck_container">
            <div class="container-fluid container-inset">
                <div class="rd-navbar-brand">
                    <h2 class="rd-navbar-brand_name">
                        <a href="./">&nbsp;car rental</a>
                    </h2>
                </div>
                <nav class="nav uppercase">
                    <ul class="sf-menu" data-type="navbar">
                        <li><a href="./2">Home</a></li>
                        <li><a href="about">About</a></li>
                        <li><a href="services">Services</a></li>
                        <li><a href="cars">Cars</a><ul>
                            <li><a href="#">Convertibles</a></li>
                            <li><a href="#">SUVs</a></li>
                            <li><a href="#">Luxury</a>
                                <ul>
                                    <li><a href="#">Mercedes</a></li>
                                    <li><a href="#">Lexus</a></li>
                                    <li><a href="#">BMW</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Exotic</a></li>
                        </ul>
                        </li>
                        <li class="active"><a href="contact">Contacts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main>
        <section class="well-md well-md--inset-3 marker relative">
        <div class="container-fluid container-inset">
            <h2 class="text-center text-md-left">Get in Touch</h2>
        <form class='rd-mailform' method="post" action="bat/rd-mailform.php">
            <input type="hidden" name="form-type" value="contact"/>
            <fieldset>
                <div class="row flow-offset">
                    <div class="col-sm-6">

                        <label data-add-placeholder="">
                            <input type="text"
                                   name="name"
                                   placeholder="Your Name"
                                   data-constraints="@NotEmpty @LettersOnly"/>
                        </label>


                            <label data-add-placeholder="">
                                <input type="text"
                                       name="email"
                                       placeholder="Your Email"
                                       data-constraints="@NotEmpty @Email"/>
                            </label>


                        <label data-add-placeholder="">
                            <input type="text"
                                   name="phone"
                                   placeholder="Your Phone Number"
                                   data-constraints="@Phone"/>
                        </label>

                    </div>
                    <div class="col-sm-6">
                        <label class="offset" data-add-placeholder="">
                                        <textarea name="message" placeholder="Your Message"
                                                  data-constraints="@NotEmpty"></textarea>
                        </label>
                    </div>
                </div>
                <div class="mfControls text-center text-lg-right">
                    <button class="btn btn-default btn-md uppercase " type="submit">Send</button>
                </div>
                <div class="mfInfo"></div>
            </fieldset>
        </form>
        </div>
        </section>
    </main>

@endsection

    