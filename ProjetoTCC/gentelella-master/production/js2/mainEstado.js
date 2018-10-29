var btnElement = document.querySelector('div#lista div#tabela button#editar');
var sla = [];
var contar = 0;

btnElement.onclick = function() {
	for (var i = 1; i >= 0; i++) {
		if (document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i)) {
			var trTable = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i);
			var cod = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=cod]');
			var codValue = cod.value;
			sla[contar] = codValue;
			contar++;

			var tdElementEdit = document.createElement('td');
			tdElementEdit.setAttribute('name', 'editTd');
			var btnElementEdit = document.createElement('button');
			var btnElementDelet = document.createElement('button');
			btnElementDelet.setAttribute('id', 'identif');
			var linkEdit = document.createElement('a');
			linkEdit.setAttribute('href', 'Edit_Estado.php?cod=' + codValue);
			var linkDelet = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' td#excluir-modal a.btn-modal');
			var txtEditar = document.createTextNode('Editar');
			var txtDeletar = document.createTextNode('Deletar');

			trTable.appendChild(tdElementEdit);
			tdElementEdit.appendChild(linkEdit);
			linkEdit.appendChild(btnElementEdit);
			linkDelet.appendChild(btnElementDelet);
			btnElementEdit.appendChild(txtEditar);
			btnElementDelet.appendChild(txtDeletar);

			var tdTable = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' td#excluir-modal');
			tdTable.setAttribute('style', 'display: inline-block;');
			tdElementEdit.setAttribute('style', 'display: inline-block;');
			tdElementEdit.setAttribute('style', 'border: none;');

			//var linkExcluir = document.querySelector("form[name=formulario]");
			//linkExcluir.setAttribute('action', 'Res_Delet_Estado.php?cod=' + codValue);

		} else {
			break;
		}
	}

	btnElement.parentNode.removeChild(btnElement);

	var txtBntNew = document.createTextNode('Voltar');
	var divTable = document.querySelector('div#botao-editar');
	var btnElementNew = document.createElement('button');
	btnElementNew.setAttribute('id', 'new');

	btnElementNew.appendChild(txtBntNew);
	divTable.appendChild(btnElementNew);

	btnElementNew.onclick = function() {
		//Arrays de elementos HTML -----------------------------------------
		// -----------------------------------------------------------------
		var tdElementEdit = document.querySelectorAll('td[name=editTd]');
		var tdsTables = document.querySelectorAll('td#excluir-modal');
		var btnsElementsDelets = document.querySelectorAll('button#identif');
		// -----------------------------------------------------------------
		// -----------------------------------------------------------------

		for (var i = 0; i <= tdsTables.length - 1; i++) {
			tdElementEdit[i].parentNode.removeChild(tdElementEdit[i]);
			tdsTables[i].setAttribute('style', 'display: none;');
			btnsElementsDelets[i].parentNode.removeChild(btnsElementsDelets[i]);
		}

		btnElementNew.parentNode.removeChild(btnElementNew);
		divTable.appendChild(btnElement);
	}
	
}

var linkDelet = document.querySelectorAll('a.btn-modal');
var form = document.querySelector('form[name=formulario]');

function linkar(item, indice) {
	item.onclick = function() {
		form.setAttribute('action', 'Res_Delet_Estado.php?cod=' + sla[indice]);
	}
}

linkDelet.forEach(linkar);