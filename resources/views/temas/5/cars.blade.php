@extends('temas.5.app')

<?php
    $data=["image"=>"image"];
?>

@section('content')

      <!-- Page Content-->
      <main class="page-content">
        <section style="position:relative;" class="section-top-60 section-bottom-100 section-lg-top-100 section-lg-bottom-250 section-xl-bottom-450 bg-outer-space">
          <div class="shell">
            <h3 class="title">Our cars</h3>
            <hr class="divider-lg offset-top-50">
            <div class="range range-xs-center offset-top-50">
              <div class="cell-sm-6 cell-md-4">
                <article class="thumbnail-variant-3"><img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" width="370" height="230" class="img-responsive"/>
                  <div class="caption">
                    <h6 class="title"><a href="/detail" class="link link-white">Grand Limousine</a></h6>
                    <div class="meta-top text-white">
                      <time datetime="2016">October 3, 2016</time> <span>by Walter Myers</span>
                    </div>
                    <p>Automakers that specialize in low-volume, hand-built cars really listen to their customers...</p><a href="/detail" class="link link-white btn-link">more info</a>
                  </div>
                </article>
              </div>
              <div class="cell-sm-6 cell-md-4 offset-top-60 offset-sm-top-0">
                <article class="thumbnail-variant-3"><img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" width="370" height="230" class="img-responsive"/>
                  <div class="caption">
                    <h6 class="title"><a href="/detail" class="link link-white">Chauffeur Vs Driver</a></h6>
                    <div class="meta-top text-white">
                      <time datetime="2016">October 6, 2016</time> <span>by Jessica Priston</span>
                    </div>
                    <p>The job of a Chauffeur is demanding. It’s a job that requires knowledge while having the ability to...</p><a href="/detail" class="link link-white btn-link">more info</a>
                  </div>
                </article>
              </div>
              <div class="cell-sm-6 cell-md-4 offset-top-60 offset-md-top-0">
                <article class="thumbnail-variant-3"><img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" width="370" height="230" class="img-responsive"/>
                  <div class="caption">
                    <h6 class="title"><a href="/detail" class="link link-white">Uber Hanging On</a></h6>
                    <div class="meta-top text-white">
                      <time datetime="2016">October 9, 2016</time> <span>by Mark Johnson</span>
                    </div>
                    <p>Uber's rapidly becoming a polarizing topic, with people either prepared to defend it to the hilt or...</p><a href="/detail" class="link link-white btn-link">more info</a>
                  </div>
                </article>
              </div>
            </div>
            <div class="range range-xs-center offset-top-50">
                <div class="cell-sm-6 cell-md-4">
                  <article class="thumbnail-variant-3"><img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" width="370" height="230" class="img-responsive"/>
                    <div class="caption">
                      <h6 class="title"><a href="/detail" class="link link-white">Grand Limousine</a></h6>
                      <div class="meta-top text-white">
                        <time datetime="2016">October 3, 2016</time> <span>by Walter Myers</span>
                      </div>
                      <p>Automakers that specialize in low-volume, hand-built cars really listen to their customers...</p><a href="/detail" class="link link-white btn-link">more info</a>
                    </div>
                  </article>
                </div>
                <div class="cell-sm-6 cell-md-4 offset-top-60 offset-sm-top-0">
                  <article class="thumbnail-variant-3"><img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" width="370" height="230" class="img-responsive"/>
                    <div class="caption">
                      <h6 class="title"><a href="/detail" class="link link-white">Chauffeur Vs Driver</a></h6>
                      <div class="meta-top text-white">
                        <time datetime="2016">October 6, 2016</time> <span>by Jessica Priston</span>
                      </div>
                      <p>The job of a Chauffeur is demanding. It’s a job that requires knowledge while having the ability to...</p><a href="/detail" class="link link-white btn-link">more info</a>
                    </div>
                  </article>
                </div>
                <div class="cell-sm-6 cell-md-4 offset-top-60 offset-md-top-0">
                  <article class="thumbnail-variant-3"><img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" width="370" height="230" class="img-responsive"/>
                    <div class="caption">
                      <h6 class="title"><a href="/detail" class="link link-white">Uber Hanging On</a></h6>
                      <div class="meta-top text-white">
                        <time datetime="2016">October 9, 2016</time> <span>by Mark Johnson</span>
                      </div>
                      <p>Uber's rapidly becoming a polarizing topic, with people either prepared to defend it to the hilt or...</p><a href="/detail" class="link link-white btn-link">more info</a>
                    </div>
                  </article>
                </div>
              </div>
          </div>
        </section>

      </main>

@endsection    