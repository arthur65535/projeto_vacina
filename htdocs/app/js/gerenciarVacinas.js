const gerenciarVacinas = {
    URL_AJAX_VACINA_POST: "ajax/ajaxGerenciarVacinas.php?tipo=",
    URL_AJAX_VACINA_GET: "ajax/ajaxGerenciarVacinas.php?tipo=", 

    REQUEST_SET_VACINA: "set-vacina",
    REQUEST_GET_VACINA: "get-vacina",
    REQUEST_GET_VACINAS: "get-vacinas",

    TEMPLATE_TABELA_VACINAS: "#template-tabela-vacinas",
    TABELA_VACINAS: "#tabela-vacinas",

    BOTAO_EDITAR_VACINA: "#botao-editar-vacina",
    BOTAO_DELETAR_VACINA: "#botao-deletar-vacina",

    CONTAINER_TABELA_VACINAS: "#container-tabela-vacinas",

	_templateTabelaVacinas: "",
    _dados: null,
    _listaVacinas: null,
    ASYNC: true, 

        /******************RENDER********************/ 

	_render: function _render(template, dados){
		return Mustache.render(template, dados);
	},

    _renderTabela: function _renderTabela(){
		// Sava a lista em variável global para utilização posterior
		gerenciarVacinas._listaVacinas = gerenciarVacinas.obtenhaListaVacinas();
		
		// Verifica se a lista não está vazia
		if(gerenciarVacinas._listaVacinas.length > 0){
			// Pega o template da tabela
			let template = gerenciarVacinas._getTemplate(gerenciarVacinas.TEMPLATE_TABELA_VACINAS);
			// Renderiza e coloca no container
			let rendered = gerenciarVacinas._render(template, gerenciarVacinas._listaVacinas);
			$(gerenciarVacinas.CONTAINER_TABELA_VACINAS).html(rendered);
			// Ativa o plugin DataTable na tabela de pasta
			$(gerenciarVacinas.TABELA_VACINAS).DataTable({
                "autoWidth": true,
                "paging": true, // Ativar paginação
                "ordering": true, // Ativar ordenação
                "order": [[0, "asc"]] // Ordenar pela primeira coluna em ordem ascendente
            });
			// Ativa o Tooltip do Bootstrap
			$('[data-toggle="tooltip"]').tooltip();
		}else{
			// Caso a lista esteja vazia, mostra uma mensagem de erro no container
			let msg = "<b>Nenhum item cadastrado</b>";
			$(gerenciarVacinas.CONTAINER_TABELA_VACINAS).html(msg);
		}
	},

    _loadTemplates: function _loadTemplates(){
		this._templateTabelaVacinas = document.getElementById(gerenciarVacinas.TEMPLATE_TABELA_VACINAS).innerHTML;
	},

    _getTemplate: function _getTemplate(template){
		switch(template){
			case gerenciarVacinas.TEMPLATE_TABELA_VACINAS:
				return this._templateTabelaVacinas;
			default:
				return null;
		}
	},

    _listeners: function _listeners(){
        $(gerenciarVacinas.BOTAO_EDITAR_VACINA).click(function(){
            // Captura o id da vacina selecionada
            let codigo = $(this).parent().parent().attr("data-id");
            // Executa a função que renderiza o modal de editar uma vacina
            gerenciarVacinas._renderModalEditarVacina(codigo);
        });
        
        $(gerenciarVacinas.BOTAO_DELETAR_VACINA).click(function(){
            // Captura o id do item clicado
            let codigo = $(this).parent().parent().attr("data-id");
            // Captura o nome do item clicado
            let nome = $(this).parent().parent().attr("data-nome");
            // Executa a função que renderiza o modal de excluir um item
            gerenciarVacinas._renderModalExcluirVacina(codigo, nome);
        });
    },

    _getDados: function _getDados(request){
        console.log(request);
        $.ajax({
            url: gerenciarVacinas.URL_AJAX_VACINA_GET + request,
            async: gerenciarVacinas.ASYNC,
            dataType: "json",
            success: function(data){
                // Armazena o retorno na variável global _dados
                gerenciarVacinas._dados = data;
                // Renderiza a tabela após obter os dados
                gerenciarVacinas._renderTabela();
            }
        });
    },    

    /******************FUNÇÕES ******************/

    obtenhaListaVacinas: function obtenhaListaVacinas() {
        // Executa o _getDados com o request adequado
        return this._getDados(gerenciarVacinas.REQUEST_GET_VACINAS);
    },

    _start: function _start(){
        this._loadTemplates();
        this._getTemplate();
        // this._listeners();
    },    
}