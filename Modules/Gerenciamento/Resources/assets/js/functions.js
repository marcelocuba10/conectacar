$(document).ready(function () {
	$('.btn-novo-spa').click(function () {
		$('.modal-spa').modal('show');
		$('.modal-title b').html($(this).data('titulo'));
	})

	$('.form-spa').on('submit', function () {
		gravaDadosSpa($(this));
		return false;
	});

	$('body').on('click', '.btn-apagar', function () {
		apagaDados($(this));
	});

	$('body').on('click', '.btn-atualiza', function () {
		atualizaDados($(this));
	});

	$('body').on('click', '.btn-editar', function () {
		$('.modal-title b').html($(this).data('titulo'));
		editaDadosSpa($(this));
	});

	$('body').on('click', '.btn-atualizar-deposito', function () {
		$('.modal-title b').html($(this).data('titulo'));
		btnatualizardeposito($(this));
	});


	$('body').on('click', '.btn-FinalizaTicket', function () {
		$('.modal-title b').html($(this).data('titulo'));
		btnFinalizaTicket($(this));
	});

	$('body').on('click', '.btn-habilitaCarteira', function () {
		$('.modal-title b').html($(this).data('titulo'));
		btnHabilitaCarteira($(this));
	});

	$('body').on('click', '.btn-desabilitaCarteira', function () {
		$('.modal-title b').html($(this).data('titulo'));
		btndesabilitaCarteira($(this));
	});

	$('body').on('click', '.btn-reativa_veiculo', function () {
		$('.modal-title b').html($(this).data('titulo'));
		reativaVeiculo($(this));
	});
});

function gravaDadosSpa($this) {
	$edita = false;
	if( $this.find('.idobj').val() == '' ){
		$url = $this.data('post');
		$method = 'post';
	}else{
		$url = $this.data('PUT');
		$method = 'PUT';
		$edita = true;
	}
	$.ajax({
		url: $url,
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		},
		async: true,
		method: $method,
		data: $this.find('input, select, textarea').filter(function () { return !!this.value; }).serialize(),
		success: function (data) {
			$this.parents('.box').find('.overlay').remove();
			toastr.clear();
			$('body').removeClass('load');
			
			if( typeof tabela !== 'undefined' ) {
				tabela.ajax.reload();
			}

			// tabela.ajax.reload();
			if( !$edita ){
				$('body').find('.modal-spa form').trigger('reset');
				$('.modal-novo').find('input').eq(0).focus();
				$('.select2').val(null).trigger('change');
				$('.img-editor').attr('src', '../resources/assets/backend/images/sem-imagem.png');
			}else{
				$('.modal-spa').modal('hide');
			}
			toastr.success(
				'Item Salvo com sucesso!',
				'Tudo certo!', {
					timeOut: 2000,
					showEasing: 'linear',
					showMethod: 'slideDown',
					closeMethod: 'fadeOut',
					closeDuration: 300,
					closeEasing: 'swing',
					closeButton: false,
					progressBar: true,
					onHidden: function () {
					}
				}
				);
			if( data.status != null ){
				window.location.reload();
			}

			if( data.redireciona != null ){
				window.location.href=data.redireciona;
			}
		},
		error: function (data) {
			toastr.clear();
			$this.parents('.box').find('.overlay').remove();
			Object.keys(data.responseJSON.errors).forEach(function (k) {
				toastr.options = {
					"closeButton": true,
					"progressBar": true,
					"preventDuplicates": false,
					"showDuration": "1000",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
				toastr.error(
					data.responseJSON.errors[k],
					'Oops....'
					)
			});
		},
		beforeSend: function () {
			toastr.info(
				'Estamos salvando suas alterações...',
				'Aguarde!', {
					showEasing: 'linear',
					showMethod: 'slideDown',
					closeMethod: 'fadeOut',
					closeDuration: 300,
					closeEasing: 'swing',
					closeButton: false,
					progressBar: true,
				}
				);
			$this.parents('.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		},
		complete: function () {}
	});
}

 


function apagaDados($this) {
	// deletaDados($this);

/*
title:campoaqui|
text:campoaqui|
type:campoaqui|
confirmButtonColor:campoaqui|
confirmButtonText:campoaqui|
cancelButtonText:campoaqui|

variavel.split(":")[1]
*/

	var retorno = $this.data('alert');
	if(retorno.indexOf("|") > 0){
		var variavel = retorno.split("|");

		swal({
			title: ""+variavel[0].split(":")[1]+"",
			text: ""+variavel[1].split(":")[1]+"",
			type: ""+variavel[2].split(":")[1]+"",
			confirmButtonColor: ""+variavel[3].split(":")[1]+"",
			confirmButtonText: ""+variavel[4].split(":")[1]+"",
			cancelButtonText: ""+variavel[5].split(":")[1]+"",
			showCancelButton: true,
			closeOnConfirm: true
		}, function () {
			deletaDados($this);
		});
	} else {

	}
}

function deletaDados($this){
	$.ajax({
		url: $this.data('url'),
		headers: {
			'X-CSRF-Token': $this.data('token'),
		},

		async: true,
		method: 'DELETE',
		data: $this.serialize(),
		success: function (data) {
			toastr.clear();
			if( typeof tabela !== 'undefined' ) {
				tabela.ajax.reload();
			}

			toastr.success(
				'Item apagado com sucesso!',
				'Tudo certo!', {
					timeOut: 2000,
					showEasing: 'linear',
					showMethod: 'slideDown',
					closeMethod: 'fadeOut',
					closeDuration: 300,
					closeEasing: 'swing',
					closeButton: false,
					progressBar: true,
				}
				);
			// if( data.status != null ){
				// window.location.reload();
			// }

			if( data.redireciona != null ){
				window.location.href=data.redireciona;
			}
			// colocar um gatilho aqui para recalcular a tela - campoaqui
		},
		beforeSend: function () {
			toastr.info(
				'Desativando registro!',
				'Aguarde!', {
					showEasing: 'linear',
					showMethod: 'slideDown',
					closeMethod: 'fadeOut',
					closeDuration: 300,
					closeEasing: 'swing',
					closeButton: false,
					progressBar: true,
				}
				);
		},
		complete: function () {}
	});
}






function atualizaDados($this) {
	// uptDados($this);
	swal({
		title: 'Opa!',
		text: 'Confirma adição deste item?',
		type: 'question',
		confirmButtonText: "Sim",
		showCancelButton: true,
		cancelButtonText: "Não",
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
	}).then((result) => {
		if( result.value ){
			uptDados($this);
		}
	});
}

function uptDados($this){
	$.ajax({
		url: $this.data('url'),
		headers: {
			'X-CSRF-Token': $('meta[name=_token]').attr('content')
		},
		async: true,
		method: 'PUT',
		data: $this.serialize(),
		success: function (data) {
			toastr.clear();
			if( typeof tabela !== 'undefined' ) {
				tabela.ajax.reload();
			}
			if( typeof tabelaA !== 'undefined' ) {
				tabelaA.ajax.reload();
			}
			toastr.success(
				'Item atualizado com sucesso!',
				'Tudo certo!', {
					timeOut: 2000,
					showEasing: 'linear',
					showMethod: 'slideDown',
					closeMethod: 'fadeOut',
					closeDuration: 300,
					closeEasing: 'swing',
					closeButton: false,
					progressBar: true,
				}
				);
			if( data.status != null ){
				window.location.reload();
			}

			if( data.redireciona != null ){
				window.location.href=data.redireciona;
			}
		},
		beforeSend: function () {
			toastr.info(
				'Adicionando registro!',
				'Aguarde!', {
					showEasing: 'linear',
					showMethod: 'slideDown',
					closeMethod: 'fadeOut',
					closeDuration: 300,
					closeEasing: 'swing',
					closeButton: false,
					progressBar: true,
				}
				);
		},
		complete: function () {}
	});
}


function btnFinalizaTicket($this) {
		swal({
			title: 'Opa!',
			text: 'Clicando em "Sim" você finaliza esse ticket. \n Prosseguir?',
			type: 'warning',
			confirmButtonText: "Sim",
			showCancelButton: true,
			cancelButtonText: "Não",
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
		}).then((result) => {
			if( result.value ){
				btnFinalizaTicketExecuta($this);
			}
		});
	}

	function btnFinalizaTicketExecuta($this){

		$.ajax({
			url: $this.data('url'),
			headers: {
				'X-CSRF-Token': $('meta[name=_token]').attr('content')
			},
			async: true,
			method: 'POST',
			data: $this.serialize(),
			success: function (data) {
				toastr.clear();
				if( typeof tabela !== 'undefined' ) {
					tabela.ajax.reload();	
				}
				if( typeof tabelaA !== 'undefined' ) {
					tabelaA.ajax.reload();
				}
				toastr.success(
					'Ticket finalizado com sucesso!',
					'Tudo certo!', {
						timeOut: 2000,
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);

				
				if( data.status != null ){
					window.location.reload();
				}
			
				if( data.redireciona != null ){
					window.location.href=data.redireciona;
				}
				// colocar um gatilho aqui para recalcular a tela - campoaqui
			},
			beforeSend: function () {
				toastr.info(
					'Atualizando dados!',
					'Aguarde!', {
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);
			},
			complete: function () {}
		});
	}



function editaDadosSpa($this) {
	$('.modal-spa').modal('show');
	$this.parents('body').find('.modal-spa .box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
	$.ajax({
		url: $this.data('url'),
		async: true,
		method: 'GET',
		data: $this.serialize(),
		success: function (data) {
			toastr.clear();
			if (typeof data == 'object') {
				toastr.success(
					'Dados carregados com sucesso!',
					'Tudo certo!', {
						timeOut: 2000,
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);
				Object.keys(data).forEach(function (k) {
					if( $('#' + k).length > 0 ){
            // if( $('#' + k).is('textarea') ){
            //   $('#' + k).html(data[k]);
            //   // makeEditor($('#' + k));
            //   makeEditorMin($('#' + k));
            // }
            if( $('#' + k).is('select, :text, :hidden, :input') ){
            	$('#' + k).val(data[k]);
            	$('#' + k).trigger('change');
            }
            if( $('#' + k).is(':checkbox') ){
            	if(data[k] == 1 )
            		$('#' + k).iCheck('check');

            	if(data[k] == 0 )
            		$('#' + k).iCheck('uncheck');
            }
            if( k == 'imagem' ){
            	$('.modal-spa').find('.img-editor').attr('src', data[k]);
            	makeImgEditor($('.modal-spa').find('.img-editor'));
            }
        }else{
        	if (k == 'tipo') {
        		$('.modal-spa #tipo_' + data[k]).iCheck('check');
        	}
        }
    });
				$this.parents('body').find('.modal-spa .box').find('.overlay').remove();
			}
		},
		beforeSend: function () {
			toastr.info(
				'Estamos buscando o item solicitado...',
				'Aguarde!', {
					showEasing: 'linear',
					showMethod: 'slideDown',
					closeMethod: 'fadeOut',
					closeDuration: 300,
					closeEasing: 'swing',
					closeButton: false,
					progressBar: true,
				}
				);
		},
		complete: function () {}
	});
}



	function btndesabilitaCarteira($this) {
		swal({
			title: 'Opa!',
			text: 'Clicando em "Sim" você desabilita essa carteira. \n Prosseguir?',
			type: 'warning',
			confirmButtonText: "Sim",
			showCancelButton: true,
			cancelButtonText: "Não",
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
		}).then((result) => {
			if( result.value ){
				btndesabilitaCarteiraExecuta($this);
			}
		});
	}
 
	function btndesabilitaCarteiraExecuta($this){

		$.ajax({
			url: $this.data('url'),
			headers: {
				'X-CSRF-Token': $('meta[name=_token]').attr('content')
			},
			async: true,
			method: 'DELETE',
			data: $this.serialize(),
			success: function (data) {
				toastr.clear();
				if( typeof tabela !== 'undefined' ) {
					tabela.ajax.reload();	
				}
				if( typeof tabelaA !== 'undefined' ) {
					tabelaA.ajax.reload();
				}
				toastr.success(
					'Carteira desabilitada com sucesso!',
					'Tudo certo!', {
						timeOut: 2000,
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);

				
				if( data.status != null ){
					window.location.reload();
				}
			
				if( data.redireciona != null ){
					window.location.href=data.redireciona;
				}
				// colocar um gatilho aqui para recalcular a tela - campoaqui
			},
			beforeSend: function () {
				toastr.info(
					'Atualizando dados!',
					'Aguarde!', {
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);
			},
			complete: function () {}
		});
	}


	function btnHabilitaCarteira($this) {
		swal({
			title: 'Opa!',
			text: 'Clicando em "Sim" você habilita essa carteira. \n Prosseguir?',
			type: 'warning',
			confirmButtonText: "Sim",
			showCancelButton: true,
			cancelButtonText: "Não",
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
		}).then((result) => {
			if( result.value ){
				btnHabilitaCarteiraExecuta($this);
			}
		});
	}


	function btnHabilitaCarteiraExecuta($this){

		$.ajax({
			url: $this.data('url'),
			headers: {
				'X-CSRF-Token': $('meta[name=_token]').attr('content')
			},
			async: true,
			method: 'POST',
			data: $this.serialize(),
			success: function (data) {
				toastr.clear();
				if( typeof tabela !== 'undefined' ) {
					tabela.ajax.reload();	
				}
				if( typeof tabelaA !== 'undefined' ) {
					tabelaA.ajax.reload();
				}
				toastr.success(
					'Carteira habilitada com sucesso!',
					'Tudo certo!', {
						timeOut: 2000,
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);

				
				if( data.status != null ){
					window.location.reload();
				}
			
				if( data.redireciona != null ){
					window.location.href=data.redireciona;
				}
				// colocar um gatilho aqui para recalcular a tela - campoaqui
			},
			beforeSend: function () {
				toastr.info(
					'Atualizando dados!',
					'Aguarde!', {
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);
			},
			complete: function () {}
		});
	}




	function btnatualizardeposito($this) {
		swal({
			title: 'Opa!',
			text: 'Clicando em "Sim" você confirma esse depósito. \n Prosseguir?',
			type: 'warning',
			confirmButtonText: "Sim",
			showCancelButton: true,
			cancelButtonText: "Não",
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
		}).then((result) => {
			if( result.value ){
				btnatualizardepositoExecuta($this);
			}
		});
	}

	function btnatualizardepositoExecuta($this){

		$.ajax({
			url: $this.data('url'),
			headers: {
				'X-CSRF-Token': $('meta[name=_token]').attr('content')
			},
			async: true,
			method: 'POST',
			data: $this.serialize(),
			success: function (data) {
				toastr.clear();
				if( typeof tabela !== 'undefined' ) {
					tabela.ajax.reload();	
				}
				if( typeof tabelaA !== 'undefined' ) {
					tabelaA.ajax.reload();
				}
				toastr.success(
					'Depósito liberado com sucesso!',
					'Tudo certo!', {
						timeOut: 2000,
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);

				
				if( data.status != null ){
					window.location.reload();
				}
			
				if( data.redireciona != null ){
					window.location.href=data.redireciona;
				}
				// colocar um gatilho aqui para recalcular a tela - campoaqui
			},
			beforeSend: function () {
				toastr.info(
					'Atualizando dados!',
					'Aguarde!', {
						showEasing: 'linear',
						showMethod: 'slideDown',
						closeMethod: 'fadeOut',
						closeDuration: 300,
						closeEasing: 'swing',
						closeButton: false,
						progressBar: true,
					}
					);
			},
			complete: function () {}
		});
	}




function reativaVeiculo($this) {
	swal({
		title: 'Aviso!',
		text: 'Você tem certeza que deseja reativar esse veículo. \n\n Prosseguir?',
		type: 'warning',
		confirmButtonText: "Sim",
		showCancelButton: true,
		cancelButtonText: "Não",
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
	}).then((result) => {
		if( result.value ){
			uptDados($this);
		}
	});
}


function bloqueiaF5()
{
	var tecla=window.event.keyCode;
	if (tecla==116) {alert("Ação não permita.\nPor favor navegue pelos menus do sistema!"); event.keyCode=0;
	event.returnValue=false;}
}


function direcionaSemRefresh(target, url)
{
	var target = ( target === undefined ? 'destinoHTML' : target );
	var url = ( url === undefined ? '' : url );

	$( "#"+target+"" ).load( ""+url+"");
}



/*
function alertaGeral($this){
	toastr.success(
		'mensagem inicial',
		'Tudo certo!', {
			timeOut: 2000,
			showEasing: 'linear',
			showMethod: 'slideDown',
			closeMethod: 'fadeOut',
			closeDuration: 300,
			closeEasing: 'swing',
			closeButton: false,
			progressBar: true,
		}
	);
	// montaTela(url);
}

    setTimeout(function(){
      montaTela('".$url."')
    }, 1000)
*/


function copiarTexto(){
	$('#copiar').click(function(){
        $('#origem').select();
        try {
        	var ok = document.execCommand('copy');
        	if (ok) { alert('Texto copiado para a área de transferência'); }
        } catch (e) {
        	alert(e)
        }
    });
}

function fechaMenuMobile(){
  var windowWidth = window.innerWidth;
  var windowHeight = window.innerHeight;
  
  var screenWidth = screen.width;
  var screenHeight = screen.height;
  if( windowWidth < 600 ){
  	
  }
}