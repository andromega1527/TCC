var btnElement = document.querySelector('div#lista div#tabela button#editar');

btnElement.onclick = function() {
	for (var i = 1; i >= 0; i++) {
		if (document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i)) {
			var trTable = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i);
			var cod = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=cod]');
			var codValue = cod.value;

			var tdElementEdit = document.createElement('td');
			var tdElementDelet = document.createElement('td');
			var btnElementEdit = document.createElement('button');
			var btnElementDelet = document.createElement('button');
			var linkEdit = document.createElement('a');
			linkEdit.setAttribute('href', 'Edit_Funcionario.php?cod=' + codValue);
			var linkDelet = document.createElement('a');
			linkDelet.setAttribute('href', 'Res_Delet_Funcionario.php?cod=' + codValue);
			var txtEditar = document.createTextNode('Editar');
			var txtDeletar = document.createTextNode('Deletar');

			trTable.appendChild(tdElementEdit);
			trTable.appendChild(tdElementDelet);
			tdElementEdit.appendChild(linkEdit);
			tdElementDelet.appendChild(linkDelet);
			linkEdit.appendChild(btnElementEdit);
			linkDelet.appendChild(btnElementDelet);
			btnElementEdit.appendChild(txtEditar);
			btnElementDelet.appendChild(txtDeletar);

		} else {
			break;
		}
	}
	
}