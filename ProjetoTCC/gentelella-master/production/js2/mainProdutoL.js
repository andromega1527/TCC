var btnElement = document.querySelector('div#lista div#tabela button#editar');

btnElement.onclick = function() {
	for (var i = 1; i >= 0; i++) {
		if (document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i)) {
			var trTable = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i);
			var cod = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=cod]');
			var codValue = cod.value;
			var codP = document.querySelector('table.tabela tbody#tabela_Dados tr#edit' + i + ' input[name=codP]');
			var codPValue = codP.value;

			var tdElementEdit = document.createElement('td');
			var btnElementEdit = document.createElement('button');
			var btnElementDelet = document.createElement('button');
			var linkEdit = document.createElement('a');
			linkEdit.setAttribute('href', 'Edit_ProdutoL.php?cod=' + codValue + '$codP=' + codPValue);
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
			linkExcluir.setAttribute('action', 'Res_Delet_ProdutoL.php?cod=' + codValue + '&codP=' + codPValue);

		} else {
			break;
		}
	}
	
}