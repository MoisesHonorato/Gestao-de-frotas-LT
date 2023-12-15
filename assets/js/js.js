$(function () {

	$('.filtro').click(function () {
		$('.mostraFiltro').slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	$('.mobmenu').click(function () {
		$('.menu').slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	$('.senha').click(function () {
		$('.mostraCampo').slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	$(function () {
		$("#tab").tabs();
	});

	$("#accordion").accordion({
		collapsible: true,
		autoHeight: false,
		active: false,
		heightStyle: "content"
	});

});

function excluir(obj) {
	var entidade = $(obj).attr('data-entidade');
	var id = $(obj).attr('data-id');
	if (confirm('Deseja realmente excluir ?')) {
		window.location.href = base_url + entidade + "/excluir/" + id;
	}
}

function fecharMsg(obj) {
	$(".msg").hide();
}

function formatMoeda() {
	var elemento = document.getElementById('moeda');
	var valor = elemento.value;

	valor = valor + '';
	valor = parseInt(valor.replace(/[\D]+/g, ''));
	valor = valor + '';
	valor = valor.replace(/([0-9]{2})$/g, ",$1");

	if (valor.length > 6) {
		valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
	}
	elemento.value = valor;


	var elemento2 = document.getElementById('moeda2');
	var valor2 = elemento2.value;

	valor2 = valor2 + '';
	valor2 = parseInt(valor2.replace(/[\D]+/g, ''));
	valor2 = valor2 + '';
	valor2 = valor2.replace(/([0-9]{2})$/g, ",$1");

	if (valor2.length > 6) {
		valor2 = valor2.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
	}
	elemento2.value = valor2;
}