var btnElement = document.querySelector('div#lista div#tabela button#editar');

btnElement.onclick = function() {
	for (var i = 1; i >= 0; i++) {
		if (document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i)) {
			var trTable = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i);
			var cod = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=cod]');
			var codValue = cod.value;

			var tdElementEdit = document.createElement('td');
			tdElementEdit.setAttribute('name', 'editTd')
			var btnElementEdit = document.createElement('button');
			var btnElementDelet = document.createElement('button');
			var linkEdit = document.createElement('a');
			linkEdit.setAttribute('href', 'Edit_Cidade.php?cod=' + codValue);
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

			var linkExcluir = document.querySelector("form[name=formulario]");
			linkExcluir.setAttribute('action', 'Res_Delet_Cidade.php?cod=' + codValue);

		} else {
			break;
		}
	}

	var txtNewButton = document.createTextNode('Voltar ao Modo de Exibição Normal');
	btnElement.id = 'new';
}


var btnElementNew = document.querySelector('div#lista div#tabela button#new');

btnElementNew.onclick = function() {
	//btnElementNew.id = 'editar';

	var tdElementEdit = document.querySelector('td[name=editTd]');
	var trTable = document.querySelectorAll('tr[name=idTr]');

	trTable.removeChild(tdElementEdit);
	
}


