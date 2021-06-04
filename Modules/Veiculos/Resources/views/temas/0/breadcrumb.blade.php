<section class="breadcrumbs-custom bg-gray-100" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}' style="padding: 25px !important">
	<div class="container" style="line-height:1 !important">
		<h2 class="breadcrumbs-custom-title">{!! trataTraducoes($data[(count($data)-1)]) !!}</h2>
		<ul class="breadcrumbs-custom-path" style="margin-top: 0px !important">
			@foreach( $data as $datas )
			<li><a>{!! trataTraducoes($datas) !!}</a></li>
			@endforeach
		</ul>
	</div>
</section>