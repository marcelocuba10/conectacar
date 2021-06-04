<?php
return [
	'settings' => [
		'header' => [
			'color' => [
				'primary' => [
					'value' => '#000000|color',
				],
				'secondary' => [
					'value' => '#ff0000|color',
				],
			],
		],
		'footer' => [
			'color' => [
				'value' => '#f6f6f6|color',
      ],
			'social_network' => [
				[
					'value' => 'https://instagram.com/|url',
				],[
					'value' => 'https://facebook.com/|url',
				],[
					'value' => 'https://google.com/|url',
				],
			],
		],
		'global' => [
			'site_name' => [
				'value' => 'Nome do site aqui',
			],
			'site_telefone' => [
				'value' => '+595 0000 000 0000',
			],
			'site_address' => [
				'value' => 'endereço do site',
			],
			'site_email' => [
				'value' => 'site@example.com',
			],
			'site_logo' => [
				'value' => '/temas/page186/images/logo.png|file:jpg,jpeg,png,bmp,gif,svg',
			],
			'primary_color' => [
				'value' => '#cecece|color',
			],
			'secondary_color' => [
				'value' => '#f3c9c9|color',
			],
		],
	],
	'nav' => [
		'home' => [
			'label' => [
				'value' => 'Home',
			],
			'url' => [
				'value' => '/|url',
			],
			'slider' => [
				[
					'value' => '/temas/page186/images/slider1.png|url|#',
				],[
					'value' => '/temas/page186/images/slider2.png',
					'type_field' => [
						'value' => '#',
						'type_field' => 'url',
					],
				],[
					'value' => '/temas/page186/images/slider3.png',
					'type_field' => [
						'value' => '#',
						'type_field' => 'url',
					],
				],
			],
			'featured_services' => [
				[
					'icon' => [
						'value' => 'fa fa-user',
						'type_field' => 'file',
					],
					'title' => [
						'value' => 'Titulo 1',
					],
					'subtitle' => [
						'value' => 'Subtitulo 1',
					],
					'content' => [
						'value' => 'Conteudo 1',
						'type_field' => 'textarea',
					],
					'url' => [
						'value' => 'url_aqui',
						'type_field' => 'url',
					],
				],[
					'icon' => [
						'value' => 'fa fa-user',
						'type_field' => 'file',
					],
					'title' => [
						'value' => 'Titulo 2',
					],
					'subtitle' => [
						'value' => 'Subtitulo 2',
					],
					'content' => [
						'value' => 'Conteudo 2',
						'type_field' => 'textarea',
					],
					'url' => [
						'value' => 'url_aqui',
						'type_field' => 'url',
					],
				],[
					'icon' => [
						'value' => 'fa fa-user',
						'type_field' => 'file',
					],
					'title' => [
						'value' => 'Titulo 3',
					],
					'subtitle' => [
						'value' => 'Subtitulo 3',
					],
					'content' => [
						'value' => 'Conteudo 3',
						'type_field' => 'textarea',
					],
					'url' => [
						'value' => 'url_aqui',
						'type_field' => 'url',
					],
				],
			],
			'call_banner' => [
				'title' => [
					'value' => 'Titulo da chamada',
				],
				'subtitle' => [
					'value' => 'Subtitulo da chamada',
				],
				'url' => [
					'value' => 'url_destino',
					'type_field' => 'url',
				],
				'background-color' => [
					'value' => '#00ffff',
					'type_field' => 'color',
				],
			],
			'most_recent_cars'=>[
				[
					'image' => [
						'value' => '/temas/page186/images/car1.png',
						'type_field' => 'file',
						'validation' => ['jpg','jpeg','png','bmp','gif','svg'],
					],
					'title' => [
						'value' => 'Title 1',
					],
				],[
					'image' => [
						'value' => '/temas/page186/images/car2.png',
						'type_field' => 'file',
						'validation' => ['jpg','jpeg','png','bmp','gif','svg'],
					],
					'title' => [
						'value' => 'Title 2',
					],
				],
				[
					'image' => [
						'value' => '/temas/page186/images/car3.png',
						'type_field' => 'file',
						'validation' => ['jpg','jpeg','png','bmp','gif','svg'],
					],
					'title' => [
						'value' => 'Title 3',
					],
				],
				[
					'image' => [
						'value' => '/temas/page186/images/car4.png',
						'type_field' => 'file',
						'validation' => ['jpg','jpeg','png','bmp','gif','svg'],
					],
					'title' => [
						'value' => 'Title 4',
					],
				],[
					'image' => [
						'value' => '/temas/page186/images/car5.png',
						'type_field' => 'file',
						'validation' => ['jpg','jpeg','png','bmp','gif','svg'],
					],
					'title' => [
						'value' => 'Title 5',
					],
				],
				[
					'image' => [
						'value' => '/temas/page186/images/car6.png',
						'type_field' => 'file',
						'validation' => ['jpg','jpeg','png','bmp','gif','svg'],
					],
					'title' => [
						'value' => 'Title 6',
					],
				],
			],
			'quem_somos' => [
				'label' => [
					'value' => 'About',
				],
				'url' => [
					'value' => '/about',
					'type_field' => 'url',
				],
				'quadro' => [
					[
						'image' => [
							'value' => '/temas/page186/image/image.png',
							'type_field' => 'url',
						],
						'title' => [
							'value' => 'Titulo aqui',
						],
						'subtitle' => [
							'value' => 'Subtitulo aqui',
						],
						'content' => [
							'value' => 'conteudo que será descrito aqui',
							'type_field' => 'textarea',
						],
					],[
						'title' => [
							'value' => 'titulo do quadro lateral',
						],
						'content' => [
							[
								'icon' => [
									'value' => '1',
								],
								'title' => [
									'value' => 'Titulo 1',
								],
								'content' => [
									'value' => 'Conteudo 1',
									'type_field' => 'textarea',
								],
							],[
								'icone' => [
									'value' => '2',
								],
								'title' => [
									'value' => 'Titulo 2',
								],
								'content' => [
									'value' => 'Conteudo 2',
									'type_field' => 'textarea',
								],
							],[
								'icone' => [
									'value' => '3',
								],
								'title' => [
									'value' => 'Titulo 3',
								],
								'content' => [
									'value' => 'Conteudo 3',
									'type_field' => 'textarea',
								],
							],[
								'icone' => [
									'value' => '4',
								],
								'title' => [
									'value' => 'Titulo 4',
								],
								'content' => [
									'value' => 'Conteudo 4',
									'type_field' => 'textarea',
								],
							],
						],
					],
				],
				'depoimentos' => [
					'title' => [
						'value' => 'Testimonials',
					],
					'content' => [
						[
							'content' => [
								'value' => 'Depoimento do usuário 1',
								'type_field' => 'textarea',
							],
							'author' => [
								'value' => 'Nome 1',
							],
						],[
							'content' => [
								'value' => 'Depoimento do usuário 2',
								'type_field' => 'textarea',
							],
							'author' => [
								'value' => 'Nome 2',
							],
						],[
							'content' => [
								'value' => 'Depoimento do usuário 3',
								'type_field' => 'textarea',
							],
							'author' => [
								'value' => 'Nome 3',
							],
						],[
							'content' => [
								'value' => 'Depoimento do usuário 4',
								'type_field' => 'textarea',
							],
							'author' => [
								'value' => 'Nome 4',
							],
						],[
							'content' => [
								'value' => 'Depoimento do usuário 5',
								'type_field' => 'textarea',
							],
							'author' => [
								'value' => 'Nome 5',
							],
						],
					],
				],
			],
			'cars' => [
				'label' => [
					'value' => 'Carros',
				],
				'url' => [
					'value' => '/cars',
					'type_field' => 'url',
				],
				'categories' => [
					'economy'=> [
						[
							'image' => [
								'value' => '/temas/page186/images/imagem1.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 1',
							],
						],[
							'image' => [
								'value' => '/temas/page186/images/imagem2.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 2',
							],
						],
						[
							'image' => [
								'value' => '/temas/page186/images/imagem3.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 3',
							],
						],
					],
					'standard'=>[
						[
							'image' => [
								'value' => '/temas/page186/images/imagem1.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 1',
							],
						],[
							'image' => [
								'value' => '/temas/page186/images/imagem2.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 2',
							],
						],
						[
							'image' => [
								'value' => '/temas/page186/images/imagem3.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 3',
							],
						],
					],
					'lux'=>[
						[
							'image' => [
								'value' => '/temas/page186/images/imagem1.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 1',
							],
						],[
							'image' => [
								'value' => '/temas/page186/images/imagem2.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 2',
							],
						],[
							'image' => [
								'value' => '/temas/page186/images/imagem3.png',
								'type_field' => 'file',
							],
							'title' => [
								'value' => 'Title 3',
							],
						],
					]
				]
			],
			'servicos' => [
				'label' => [
					'value' => 'Servicos',
				],
				'url' => [
					'value' => '/services',
					'type_field' => 'file',
				],
				'title' => [
					'value' => 'Services Overview',
				],
				'services' => [
					[
						'image' => [
							'value' => '/temas/page186/images/imagem.png',
							'type_field' => 'file',
						],
						'title' => [
							'value' => 'Title 1',
						],
						'subtitle' => [
							'value' => 'Subtitle 1',
						],
						'url' => [
							'value' => '#',
							'type_field' => 'url',
						],
					],[
						'image' => [
							'value' => '/temas/page186/images/imagem.png',
							'type_field' => 'file',
						],
						'title' => [
							'value' => 'Title 2',
						],
						'subtitle' => [
							'value' => 'Subtitle 2',
						],
						'url' => [
							'value' => '#',
							'type_field' => 'file',
						],
					],[
						'image' => [
							'value' => '/temas/page186/images/imagem.png',
							'type_field' => 'file',
						],
						'title' => [
							'value' => 'Title 3',
						],
						'subtitle' => [
							'value' => 'Subtitle 3',
						],
						'url' => [
							'value' => '#',
							'type_field' => 'url',
						],
					],
					[
						'image' => [
							'value' => '/temas/page186/images/imagem.png',
							'type_field' => 'file',
						],
						'title' => [
							'value' => 'Title 4',
						],
						'subtitle' => [
							'value' => 'Subtitle 4',
						],
						'url' => [
							'value' => '#',
							'type_field' => 'url',
						],
					],[
						'image' => [
							'value' => '/temas/page186/images/imagem.png',
							'type_field' => 'file',
						],
						'title' => [
							'value' => 'Title 5',
						],
						'subtitle' => [
							'value' => 'Subtitle 5',
						],
						'url' => [
							'value' => '#',
							'type_field' => 'url',
						],
					],[
						'image' => [
							'value' => '/temas/page186/images/imagem.png',
							'type_field' => 'file',
						],
						'title' => [
							'value' => 'Title 6',
						],
						'subtitle' => [
							'value' => 'Subtitle 6',
						],
						'url' => [
							'value' => '#',
							'type_field' => 'url',
						],
					],
				],
			],
			'contato' => [
				'label' => [
					'value' => 'Contact',
				],
				'url' => [
					'value' => '/contact',
					'type_field' => 'url',
				],
				'title' => [
					'value' => 'Find Us',
				],
				'map' => [
					'url' => [
						'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14406.626709578875!2d-54.6204737!3d-25.4831371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93760a45ed1ffc85!2sCasa%20Blanca!5e0!3m2!1spt-BR!2spy!4v1605896780402!5m2!1spt-BR!2spy',
					],
					'length' => [
						'value' => '100%',
					],
					'height' => [
						'value' => '500px',
					],
				],
				'quadro' => [
					[
						'title' => [
							'value' => 'Contact info',
						],
						'subtitle' => [
							'value' => 'Subtitulo aqui',
						],
						'content' => [
							'value' => 'conteudo que será descrito aqui',
							'type_field' => 'textarea',
						],
					],[
						'title' => [
							'value' => 'Contact form',
						],
						'contact_form' => [
							[
								'name' => [
									'value' => 'name_form',
								],
								'email' => [
									'value' => 'email_form',
									'type_field' => 'email',
								],
								'phone' => [
									'value' => 'phone_form',
								],
								'message' => [
									'value' => 'message_form',
									'type_field' => 'textarea',
								],
							]
						],
					],
				],
			],
		],
	],
];