<?php
$siteId = site_id();

return [
	'settings' => [
		'header' => [
			'color' => ['#000000','#ff0000'],
		],
		'footer' => [
			'color' => '#f6f6f6',
			'social_network' => [
				'https://instagram.com/',
				'https://facebook.com/',
				'https://google.com/',
			],
		],
		'global' => [
			'site_name' => 'Nome do site aqui',
			'site_telefone' => '+595 0000 000 0000',
			'site_address' => 'endereço do site',
			'site_email' => 'site@example.com',
			'site_logo' => '/temas/'.$siteId['tema'].'/images/logo.png',
			'primary_color' => '#cecece',
			'secondary_color' => '#f3c9c9',
		],
	],
	'nav' => [
		'home' => [
			'label' => 'Home',
			'url' => '/',
			'slider' => [
				'/temas/'.$siteId['tema'].'/images/slider1.png',
				'/temas/'.$siteId['tema'].'/images/slider2.png',
				'/temas/'.$siteId['tema'].'/images/slider3.png',
			],
			'featured_services' => [
				[
					'icon' => 'fa fa-user',
					'title' => 'Titulo 1',
					'subtitle' => 'Subtitulo 1',
					'content' => 'Conteudo 1',
					'url' => 'url_aqui',
				],[
					'icon' => 'fa fa-user',
					'title' => 'Titulo 2',
					'subtitle' => 'Subtitulo 2',
					'content' => 'Conteudo 2',
					'url' => 'url_aqui',
				],[
					'icon' => 'fa fa-user',
					'title' => 'Titulo 3',
					'subtitle' => 'Subtitulo 3',
					'content' => 'Conteudo 3',
					'url' => 'url_aqui',
				],
			],
			'call_banner' => [
				'title' => 'Titulo da chamada',
				'subtitle' => 'Subtitulo da chamada',
				'url' => 'url_destino',
				'background-color' => '#00ffff',
			],
			'most_recent_cars' => [
				[
					'image' => '/temas/'.$siteId['tema'].'/images/car1.png',
					'title' => 'Title 1',
				],[
					'image' => '/temas/'.$siteId['tema'].'/images/car2.png',
					'title' => 'Title 2',
				],[
					'image' => '/temas/'.$siteId['tema'].'/images/car3.png',
					'title' => 'Title 3',
				],[
					'image' => '/temas/'.$siteId['tema'].'/images/car4.png',
					'title' => 'Title 4',
				],[
					'image' => '/temas/'.$siteId['tema'].'/images/car5.png',
					'title' => 'Title 5',
				],[
					'image' => '/temas/'.$siteId['tema'].'/images/car6.png',
					'title' => 'Title 6',
				],
			],
			'quem_somos' => [
				'label' => 'About',
				'url' => '/about',
				'quadro' => [
					[
						'image' => '/temas/'.$siteId['tema'].'/image/image.png',
						'title' => 'Titulo aqui',
						'subtitle' => 'Subtitulo aqui',
						'content' => 'conteudo que será descrito aqui',
					],[
						'title' => 'titulo do quadro lateral',
						'content' => [
							[
								'icon' => '1',
								'title' => 'Titulo 1',
								'content' => 'Conteudo 1',
							],[
								'icone' => '2',
								'title' => 'Titulo 2',
								'content' => 'Conteudo 2',
							],[
								'icone' => '3',
								'title' => 'Titulo 3',
								'content' => 'Conteudo 3',
							],[
								'icone' => '4',
								'title' => 'Titulo 4',
								'content' => 'Conteudo 4',
							],
						],
					],
				],
				'depoimentos' => [
					'title' => 'Testimonials',
					'content' => [
						[
							'content' => 'Depoimento do usuário 1',
							'author' => 'Nome 1',
						],[
							'content' => 'Depoimento do usuário 2',
							'author' => 'Nome 2',
						],[
							'content' => 'Depoimento do usuário 3',
							'author' => 'Nome 3',
						],[
							'content' => 'Depoimento do usuário 4',
							'author' => 'Nome 4',
						],[
							'content' => 'Depoimento do usuário 5',
							'author' => 'Nome 5',
						],
					],
				],
			],
			'cars' => [
				'label' => 'Carros',
				'url' => '/cars',
				'categories' => [
					'economy' =>  [
						[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem1.png',
							'title' => 'Title 1',
						],[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem2.png',
							'title' => 'Title 2',
						],[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem3.png',
							'title' => 'Title 3',
						],
					],
					'standard' => [
						[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem1.png',
							'title' => 'Title 1',
						],[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem2.png',
							'title' => 'Title 2',
						],[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem3.png',
							'title' => 'Title 3',
						],
					],
					'lux' => [
						[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem1.png',
							'title' => 'Title 1',
						],[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem2.png',
							'title' => 'Title 2',
						],[
							'image' => '/temas/'.$siteId['tema'].'/images/imagem3.png',
							'title' => 'Title 3',
						],
					]
				]
			],
			'servicos' => [
				'label' => 'Servicos',
				'url' => '/services',
				'title' => 'Services Overview',
				'services' => [
					[
						'image' => '/temas/'.$siteId['tema'].'/images/imagem.png',
						'title' => 'Title 1',
						'subtitle' => 'Subtitle 1',
						'url' => '#',
					],[
						'image' => '/temas/'.$siteId['tema'].'/images/imagem.png',
						'title' => 'Title 2',
						'subtitle' => 'Subtitle 2',
						'url' => '#',
					],[
						'image' => '/temas/'.$siteId['tema'].'/images/imagem.png',
						'title' => 'Title 3',
						'subtitle' => 'Subtitle 3',
						'url' => '#',
					],
					[
						'image' => '/temas/'.$siteId['tema'].'/images/imagem.png',
						'title' => 'Title 4',
						'subtitle' => 'Subtitle 4',
						'url' => '#',
					],[
						'image' => '/temas/'.$siteId['tema'].'/images/imagem.png',
						'title' => 'Title 5',
						'subtitle' => 'Subtitle 5',
						'url' => '#',
					],[
						'image' => '/temas/'.$siteId['tema'].'/images/imagem.png',
						'title' => 'Title 6',
						'subtitle' => 'Subtitle 6',
						'url' => '#',
					],
				],
			],
			'contato' => [
				'label' => 'Contact',
				'url' => '/contact',
				'title' => 'Find Us',
				'map' => 'https://www.google.com/maps/embed?pb=!1m !1m12!1m3!1d14406.626709578875!2d-54.6204737!3d-25.4831371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93760a45ed1ffc85!2sCasa%20Blanca!5e0!3m2!1spt-BR!2spy!4v1605896780402!5m2!1spt-BR!2spy',
				'length' => '100%',
				'height' => '500px',
			],
			'quadro' => [
				[
					'title' => 'Contact info',
					'subtitle' => 'Subtitulo aqui',
					'content' => 'conteudo que será descrito aqui',
				],[
					'title' => 'Contact form',
					'contact_form' => [
						'name' => 'name_form',
						'email' => 'email_form',
						'phone' => 'phone_form',
						'message' => 'message_form',
					],
				],
			],
		],
	],
];