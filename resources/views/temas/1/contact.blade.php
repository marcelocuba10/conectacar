@extends('temas.1.app');


@section('content')

  <div class="section novi-background bg-cover" style="margin-bottom: 50px;">
    <div class="container">
      <div class="breadcrumbs1_wrapper novi-background">
        <div class="container">
          <div class="breadcrumbs1"><a href="index.html">Home</a><span></span>Contact us</div>
        </div>
      </div>
      <div class="row" style="margin-top: 20px">
        <div class="col-sm-6 col-md-5">
          <div class="contact-banner">
            <div style="width: 35%">
              <h2><strong class="cy-t t2" style="line-height: 50px;">Contáctenos..</strong></h2>
            </div>
            <br>
            <p>202 W 7th St, Suite 233 Los Angeles, CA 90014 USA</p>
            <p><i class="fa fa-envelope novi-icon" aria-hidden="true"></i> - <a href="mailto:#">info@demolink.org</a></p>
            <p><i class="fa fa-phone novi-icon" aria-hidden="true"></i> - <a href="tel:#">1-800-624-5462</a></p>
            <p><i class="fa fa-clock-o novi-icon" aria-hidden="true"></i> - Monday to Friday from 09.00 to 18.00</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius consectetur tempor. Cras
              suscipit, mi ut ultrices pharetra, justo orci tempus augue, et lobortis nulla massa vel eros. Proin non
              lacus ex. Integer maximus malesuada tincidunt. Nunc pellentesque elit quis elit ultrices euismod.
              Vivamus fermentum laoreet leo. Praesent ut ex in arcu fermentum hendrerit a sit amet urna. Praesent
              fringilla augue tellus, in lobortis urna molestie ac. Mauris volutpat quam nec nibh bibendum
              ullamcorper. Vivamus eget imperdiet erat. Vivamus porta nisi mi.</p><br>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-md-offset-1">
          <h3 style="color: #464646">ENVÍENOS UN MENSAJE</h3>
          <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="forms" method="post" action="bat/rd-mailform.php">
            <div class="row row-15 row-fix">
              <div class="col-md-12">
                <div class="form-wrap">
                  <label class="form-label" for="forms-name">Full name</label>
                  <input class="form-input" id="forms-name" type="text" name="name" data-constraints="@Required"> </div>
              </div>
              <div class="col-md-12">
                <div class="form-wrap">
                  <label class="form-label" for="forms-email">E-mail address</label>
                  <input class="form-input" id="forms-email" type="email" name="email" data-constraints="@Email @Required"> </div>
              </div>
              <div class="col-sm-12">
                <div class="form-wrap">
                  <label class="form-label" for="forms-message">Message</label>
                  <textarea class="form-input" id="forms-message" name="message" data-constraints="@Required"></textarea>
                </div>
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn-default btn-cf-submit3">SEND MESSAGE</button>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection