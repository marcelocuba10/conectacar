<?php
return [
	'settings' => [
		'header' => [
			'color' => [
				'#000000|color',
				'#ff0000|color',
			],
		],
		'footer' => [
			'color' => [
				'#f6f6f6|color',
			],
			'social_network' => [
				'https://instagram.com/|url',
				'https://facebook.com/|url',
				'https://google.com/|url',
			],
		],
		'global' => [
			'site_name' => 'Nome do site aqui',
			'site_telefone' => '+595 0000 000 0000',
			'site_address' => 'nomedosite.com.py|url',
			'site_email' => 'site@example.com|email',
			'site_logo' => '/temas/page186/images/logo.png|file|jpg,jpeg,png,bmp,gif,svg',
			'primary_color' => '#cecece|color',
			'secondary_color' => '#f3c9c9|color',
		],
	],
	'nav' => [
		'home' => [
			'label' => 'Home',
			'url' => '/|url',
			'slider' => [
				'/temas/page186/images/slider1.png|file|jpg,jpeg,png,bmp,gif,svg',
				'/temas/page186/images/slider2.png|file|jpg,jpeg,png,bmp,gif,svg',
				'/temas/page186/images/slider3.png|file|jpg,jpeg,png,bmp,gif,svg',
			],
			'featured_services' => [
				[
					'icon' => 'fa fa-user|icon',
					'title' => 'Titulo 1',
					'subtitle' => 'Subtitulo 1',
					'content' => 'Conteudo 1|textarea',
					'url' => 'url_aqui|url',
				],[
					'icon' => 'fa fa-user|icon',
					'title' => 'Titulo 2',
					'subtitle' => 'Subtitulo 2',
					'content' => 'Conteudo 2|textarea',
					'url' => 'url_aqui|url',
				],[
					'icon' => 'fa fa-user|icon',
					'title' => 'Titulo 3',
					'subtitle' => 'Subtitulo 3',
					'content' => 'Conteudo 3|textarea',
					'url' => 'url_aqui|url',
				],
			],
			'call_banner' => [
				'title' => 'Titulo da chamada',
				'subtitle' => 'Subtitulo da chamada',
				'url' => 'url_destino|url',
				'background-color' => '#00ffff|color',
			],
			'most_recent_cars'=>[
				[
					'image' => '/temas/page186/images/car1.png|file|jpg,jpeg,png,bmp,gif,svg',
					'title' => 'Title 1',
				],[
					'image' => '/temas/page186/images/car2.png|file|jpg,jpeg,png,bmp,gif,svg',
					'title' => 'Title 2',
				],[
					'image' => '/temas/page186/images/car3.png|file|jpg,jpeg,png,bmp,gif,svg',
					'title' => 'Title 3',
				],[
					'image' => '/temas/page186/images/car4.png|file|jpg,jpeg,png,bmp,gif,svg',
					'title' => 'Title 4',
				],[
					'image' => '/temas/page186/images/car5.png|file|jpg,jpeg,png,bmp,gif,svg',
					'title' => 'Title 5',
				],[
					'image' => '/temas/page186/images/car6.png|file|jpg,jpeg,png,bmp,gif,svg',
					'title' => 'Title 6',
				],
			],
			'about' => [
				'label' => 'About',
				'url' => '/about|url',
				'quadro' => [
					[
						'title' => 'Titulo aqui',
						'image' => '/temas/page186/image/image.png|file|jpg,jpeg,png,bmp,gif,svg',
						'subtitle' => 'Subtitulo aqui',
						'content' => 'conteudo que será descrito aqui|textarea',
					],[
						'title' => 'titulo do quadro lateral',
						'content' => [
							[
								'icon' => '1',
								'title' => 'Titulo 1',
								'content' => 'Conteudo 1|textarea',
							],[
								'icone' => '2',
								'title' => 'Titulo 2',
								'content' => 'Conteudo 2|textarea',
							],[
								'icone' => '3',
								'title' => 'Titulo 3',
								'content' => 'Conteudo 3|textarea',
							],[
								'icone' => '4',
								'title' => 'Titulo 4',
								'content' => 'Conteudo 4|textarea',
							],
						],
					],
				],
				'testimonials' => [
					'title' => 'Testimonials',
					'content' => [
						[
							'content' => 'Depoimento do usuário 1|textarea',
							'author' => 'Nome 1',
						],[
							'content' => 'Depoimento do usuário 2|textarea',
							'author' => 'Nome 2',
						],[
							'content' => 'Depoimento do usuário 3|textarea',
							'author' => 'Nome 3',
						],[
							'content' => 'Depoimento do usuário 4|textarea',
							'author' => 'Nome 4',
						],[
							'content' => 'Depoimento do usuário 5|textarea',
							'author' => 'Nome 5',
						],
					],
				],
			],
			'cars' => [
				'label' => 'Cars',
				'url' => '/cars|url',
				'title' => 'Latest cars insert',
				'categories' => 'SearchBD::Consulta_Categorias'
			],
			'services' => [
				'label' => 'Services',
				'url' => '/services|url',
				'title' => 'Services Overview',
				'services' => 'SearchBD::Consulta_Servicos'
			],
			'contact' => [
				[
					'title' => 'Find Us',
					'url_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14406.626709578875!2d-54.6204737!3d-25.4831371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93760a45ed1ffc85!2sCasa%20Blanca!5e0!3m2!1spt-BR!2spy!4v1605896780402!5m2!1spt-BR!2spy|100%&500px',
				],[
					'title' => 'Contact info',
					'subtitle' => 'Subtitulo aqui',
					'content' => 'conteudo que será descrito aqui|textarea',
				],[
					'title' => 'Contact form',
					'url' => '/contact|url',
					'contact_form' => [
						'name_form',
						'email_form|email',
						'phone_form',
						'message_form|textarea',
					],
				],
			],
		],
	],
];