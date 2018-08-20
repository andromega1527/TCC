var btnElement = document.querySelector('div#lista div#tabela button#editar');

btnElement.onclick = function() {
	for (var i = 1; i >= 0; i++) {
		if (document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i)) {
			var trTable = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i);
			var cod = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=cod]');
			var codValue = cod.value;
			var codCi = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=codCi]');
			var codCiValue = codCi.value;
			var codE = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=codE]');
			var codEValue = codE.value;

			var tdElementEdit = document.createElement('td');
			var tdElementDelet = document.createElement('td');
			var btnElementEdit = document.createElement('button');
			var btnElementDelet = document.createElement('button');
			var linkEdit = document.createElement('a');
			linkEdit.setAttribute('href', 'Edit_Cliente.php?cod=' + codValue + '&codCi=' + codCiValue + '&codE=' + codEValue);
			var linkDelet = document.createElement('a');
			linkDelet.setAttribute('href', 'Res_Delet_Cliente.php?cod=' + codValue + '&codCi=' + codCiValue + '&codE=' + codEValue);
			var txtEditar = document.createTextNode('Editar');
			var txtDeletar = document.createTextNode('Deletar');

			trTable.appendChild(tdElementEdit);
			trTable.appendChild(tdElementDelet);
			tdElementEdit.appendChild(btnElementEdit);
			tdElementDelet.appendChild(btnElementDelet);
			btnElementEdit.appendChild(linkEdit);
			btnElementDelet.appendChild(linkDelet);
			linkEdit.appendChild(txtEditar);
			linkDelet.appendChild(txtDeletar);

		} else {
			break;
		}
	}
	
}