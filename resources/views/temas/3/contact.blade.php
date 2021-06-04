@extends('veiculos::temas.3.app')
@section('content')

<section id="content">
  <div class="width-wrapper width-wrapper__inset1">
    <div class="wrapper1 wrapper7">
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="heading1 heading1__offset1">
              <h2>{!! trataTraducoes('Contacts') !!}</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="grid_12">
            <div class="google-map_contacts">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24214.807650104907!2d-73.94846048422478!3d40.65521573400813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1395650655094"
                      style="border:0"></iframe>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="grid_3">
            <address class="contacts-address wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
              <span class="our-address">{!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : 'endereco' !!}, {!! !empty($siteId['quaisDados']['numero']) ? $siteId['quaisDados']['numero'] : 'numero' !!}<br>{!! !empty($siteId['quaisDados']['cidade']) ? $siteId['quaisDados']['cidade'] : 'cidade' !!} - {!! !empty($siteId['quaisDados']['estado']) ? $siteId['quaisDados']['estado'] : 'estado' !!}</span>
              <span class="wrapper"><span class="wide">{!! trataTraducoes('Telephone') !!}:</span>
                  {{-- @foreach( $siteId['quaisTelefones'] as $key => $telefones )
                  <p>{!! $telefones['telefones'] !!}</p>
                  @endforeach --}}
                  +959 6551235456 <br>
                  +959 2541544154
              </span>
              <span class="wrapper"><span class="wide">{!! trataTraducoes('E-mail') !!}:</span>{!! !empty($siteId['email']) ? $siteId['email'] : 'email_site' !!}</span>
            </address>
          </div>
          <div class="grid_9">
            <form id="contact-form">
              <div class="contact-form-loader"></div>
              <fieldset>
                <div class="row">
                  <div class="grid_3">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">{!! trataTraducoes('Your Name') !!}:</span>
                    <label class="name wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                      <input type="text" name="name" placeholder="{!! trataTraducoes('Name') !!}:"
                             data-constraints="@Required @JustLetters"/>
                      <span class="empty-message">*This field is required.</span>
                    </label>
                  </div>
                  <div class="grid_3">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">{!! trataTraducoes('Your E-mail') !!}:</span>
                    <label class="email wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                      <input type="text" name="email" placeholder="{!! trataTraducoes('E-mail') !!}:" value=""
                             data-constraints="@Required @Email"/>
                      <span class="empty-message">*This field is required.</span>
                      <span class="error-message">*This is not a valid email.</span>
                    </label>
                  </div>
                  <div class="grid_3">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">{!! trataTraducoes('Your Phone') !!}:</span>
                    <label class="phone wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                      <input type="text" name="phone" placeholder="{!! trataTraducoes('Phone') !!}" value=""
                             data-constraints="@Required @JustNumbers"/>
                      <span class="empty-message">*This field is required.</span>
                      <span class="error-message">*This is not a valid phone.</span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="grid_9">
                    <span class="heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s">{!! trataTraducoes('Your Message') !!}:</span>
                    <label class="message wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                      <textarea name="message" placeholder="{!! trataTraducoes('Message') !!}:"
                                data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                      <span class="empty-message">*This field is required.</span>
                      <span class="error-message">*The message is too short.</span>
                    </label>
                  </div>
                </div>
                <div class="contact-form-buttons wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                  <a href="#" data-type="submit" class="btn-default"><span>{!! trataTraducoes('Enviar') !!}</span></a>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection