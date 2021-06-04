<?php

return [
	'configuracoes' => [
		'topo' => [
			'cor' => [
				'#000000',
				'#ff0000',
			],
		],
		'rodape' => [
			'redes_sociais' => [
				[
					'icone' => 'fa fa-instagram',
					'url' => 'https://instagram.com/'
				],[
					'icone' => 'fa fa-facebook',
					'url' => 'https://facebook.com/'
				],[
					'icone' => 'fa fa-google',
					'url' => 'https://google.com/'
				],
			],
			'cor' => '#f6f6f6',
		],
		'geral' => [
			'nome_site' => 'Nome do site aqui',
			'telefone_site' => '+595 0000 000 0000',
			'logotipo' => '/temas/page186/logotipo.png',
			'cor_padrao' => '#cecece',
		],
	],
	'navegacao' => [
		'inicio' => [
			'label' => 'Home',
			'url' => '/',
			'banner' => [
				[
					'imagem' => '',
					'url' => 'opcional',
				],[
					'imagem' => '',
					'url' => 'opcional',
				],[
					'imagem' => '',
					'url' => 'opcional',
				],
			],
			'servicos_destaque' => [
				[
					'icone' => 'fa fa-user',
					'titulo' => 'Titulo 1',
					'subtitulo' => 'Subtitulo 1',
					'conteudo' => 'Conteudo 1',
					'url' => 'url_aqui',
				],[
					'icone' => 'fa fa-user',
					'titulo' => 'Titulo 2',
					'subtitulo' => 'Subtitulo 2',
					'conteudo' => 'Conteudo 2',
					'url' => 'url_aqui',
				],[
					'icone' => 'fa fa-user',
					'titulo' => 'Titulo 3',
					'subtitulo' => 'Subtitulo 3',
					'conteudo' => 'Conteudo 3',
					'url' => 'url_aqui',
				],
			],
			'banner_chamada' => [
				'titulo' => 'Titulo da chamada',
				'subtitulo' => 'Subtitulo da chamada',
				'url' => 'url_destino',
				'fundo' => '#00ffff',
			],
		],
		'quem_somos' => [
			'label' => 'About',
			'url' => 'about',
			'quadro' => [
				[
					'imagem' => '/temas/page186/qual_imagem.png',
					'titulo' => 'Titulo aqui',
					'subtitulo' => 'Subtitulo aqui',
					'conteudo' => 'conteudo que será descrito aqui',
				],[
					'titulo' => 'titulo do quadro lateral',
					'conteudo' => [
						[
							'icone' => '1',
							'titulo' => 'Titulo 1',
							'conteudo' => 'Conteudo 1',
						],[
							'icone' => '2',
							'titulo' => 'Titulo 2',
							'conteudo' => 'Conteudo 2',
						],[
							'icone' => '3',
							'titulo' => 'Titulo 3',
							'conteudo' => 'Conteudo 3',
						],[
							'icone' => '4',
							'titulo' => 'Titulo 4',
							'conteudo' => 'Conteudo 4',
						],
					],
				],
			],
			'depoimentos' => [
				'titulo' => 'Testimonials',
				'conteudo' => [
					[
						'conteudo' => 'Depoimento do usuário 1',
						'titulo' => 'Nome 1',
					],[
						'conteudo' => 'Depoimento do usuário 2',
						'titulo' => 'Nome 2',
					],[
						'conteudo' => 'Depoimento do usuário 3',
						'titulo' => 'Nome 3',
					],[
						'conteudo' => 'Depoimento do usuário 4',
						'titulo' => 'Nome 4',
					],[
						'conteudo' => 'Depoimento do usuário 5',
						'titulo' => 'Nome 5',
					],
				],
			],
		],
		'carros' => [],
		'servicos' => [],
		'contato' => [
			'mapa' => [
				'url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14406.626709578875!2d-54.6204737!3d-25.4831371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x93760a45ed1ffc85!2sCasa%20Blanca!5e0!3m2!1spt-BR!2spy!4v1605896780402!5m2!1spt-BR!2spy',
				'largura' => '100%',
				'altura' => '500px',
			],
		],
	],
];