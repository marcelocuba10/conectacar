<section class="section section-two-column bg-gray-5">
  <div class="block-left section-xl">
    <div class="box-content">
      <div class="container">
        <div class="row justify-content-center justify-content-lg-start text-left">
          <div class="col-lg-10 col-xl-9">
            <h4>{!! ( !empty($datas['titulo']) ? $datas['titulo'] : trataTraducoes("PORQUE AS PESSOAS NOS ESCOLHEM") ) !!}</h4>
            <p>{!! ( !empty($datas['conteudo']) ? $datas['conteudo'] : trataTraducoes("Como uma concessionária local de propriedade familiar, 
            entendemos as necessidades de nossos clientes e retribuimos à nossa comunidade local. Também oferecemos grandes benefícios a todos os nossos clientes, 
            tanto novos como antigos. Fique à vontade para verificar mais motivos para se tornar nosso cliente e ter uma experiência de compra descomplicada.") ) !!}</p>
            <div class="group-sm"><a class="button button-primary button-circle" href="#">{!! trataTraducoes("Sobre nós..") !!}</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="block-right">
    <div class="img-fix"><img src="/temas/5/images/about-1-2.jpg" alt=""></div>
  </div>
</section>