const home = {
    // URLs que ligam o JS ao PHP
    URL_AJAX_VACINA_POST: "ajax/ajaxGerenciarVacinas.php?tipo=",
    URL_AJAX_VACINA_GET: "ajax/ajaxGerenciarVacinas.php?tipo=", 
    URL_AJAX_ALERGIA_POST: "ajax/ajaxGerenciarAlergias.php?tipo=",
    URL_AJAX_ALERGIA_GET: "ajax/ajaxGerenciarAlergias.php?tipo=", 
    URL_AJAX_AGENDA_POST: "ajax/ajaxGerenciarAgendas.php?tipo=",
    URL_AJAX_AGENDA_GET: "ajax/ajaxGerenciarAgendas.php?tipo=", 
    URL_AJAX_USUARIO_POST: "ajax/ajaxGerenciarUsuarios.php?tipo=",
    URL_AJAX_USUARIO_GET: "ajax/ajaxGerenciarUsuarios.php?tipo=", 
	ASYNC: false,

    // Lista de requests utilizados na pagina, são enviados no parâmetro "tipo" da requisição.
    REQUEST_SET_VACINA: "set-vacina",
	REQUEST_SET_AGENDA: "set-agenda",
	REQUEST_SET_ALERGIA: "set-alergia",
	REQUEST_SET_USUARIO: "set-usuario",

    // Constantes de campos de formulários (inputs, selects, textareas)
    INPUT_VACINA_TITULO: "input-vacina-titulo",
    INPUT_VACINA_DOSES: "input-vacina-doses",
    INPUT_VACINA_PERIODICIDADE: "input-vacina-periodicidade",
    INPUT_VACINA_INTERVALO: "input-vacina-intervalo",

    INPUT_ALERGIA_TITULO: "input-alergia-titulo",

    INPUT_AGENDA_DATA: "input-agenda-data",
    INPUT_AGENDA_VACINA: "input-agenda-vacina",

    INPUT_USUARIO_NOME: "input-usuario-nome",
    INPUT_USUARIO_NASCIMENTO: "input-usuario-nascimento",
    INPUT_USUARIO_SEXO: "input-usuario-sexo",
    INPUT_USUARIO_LOGRADOURO: "input-usuario-logradouro",
    INPUT_USUARIO_NUMERO: "input-usuario-numero",
    INPUT_USUARIO_COMPLEMENTO: "input-usuario-complemento",
    INPUT_USUARIO_SETOR: "input-usuario-setor",
    INPUT_USUARIO_CIDADE: "input-usuario-cidade",
    INPUT_USUARIO_UF: "input-usuario-uf",

    // Identificadores de elementos do html
    TABELA_VACINAS_AGENDAMENTO: "#tabela-vacina-agendamento",
	FORM_AGENDA: "#form-agenda",
    FORM_ALERGIA: "#form-alergia",
    FORM_VACINA: "#form-vacina",
    FORM_USUARIO: "#form-usuario",

    // Constantes dos botões existentes na página
    BOTAO_CADASTRAR_VACINA: "#botao-cadastrar-vacina",
    BOTAO_CADASTRAR_ALERGIA: "#botao-cadastrar-alergia",
    BOTAO_CADASTRAR_AGENDA: "#botao-cadastrar-agenda",
    BOTAO_CADASTRAR_USUARIO: "#botao-cadastrar-usuario",
	
    // Idêntificadores dos modais utilizados no script

    // Identificadoresde containers no HTML
    CONTAINER_TABELA_AGENDA_VACINAS: "#container-tabela-agenda-vacinas",

    // Idêntificadores dos scripts de template da página
    TEMPLATE_TABELA_AGENDA_VACINAS: "template-agenda-vacinas",
	TEMPLATE_FORM_CADASTRAR_USUARIO: "template-formulario-cadastrar-usuario",
	TEMPLATE_FORM_CADASTRAR_ALERGIA: "template-formulario-cadastrar-alergia",
    TEMPLATE_FORM_CADASTRAR_AGENDA: "template-formulario-cadastrar-agenda",
    TEMPLATE_FORM_CADASTRAR_VACINA: "template-formulario-cadastrar-vacina",

    // Variáveis utilizadas para manipular e armazenar dados    

    // Variáveis utilizadas para armazenar os templates que estão nos scripts

    /******************TEMPLATE******************/ 

	// _loadTemplates: function _loadTemplates(){
	// 	this._templateTabItem = document.getElementById(home.TEMPLATE_TABELA_ITEM).innerHTML;
	// 	this._templateVisItem = document.getElementById(home.TEMPLATE_VISUALIZAR_ITEM).innerHTML;
	// 	this._templateFormNovoItem = document.getElementById(home.TEMPLATE_FORM_NOVO_ITEM).innerHTML;
	// 	this._templateFormEditarItem = document.getElementById(home.TEMPLATE_FORM_EDITAR_ITEM).innerHTML;
	// },
	
	/*
	* Esta função retorna o conteúdo do template desejado de acordo com o parâmetro
	* @param {string}	template - A constante que identifica o template desejado
	* @return {string}
	*/
	// _getTemplate: function _getTemplate(template){
	// 	switch(template){
	// 		case home.TEMPLATE_TABELA_ITEM:
	// 			return this._templateTabItem;
	// 		case home.TEMPLATE_VISUALIZAR_ITEM:
	// 			return this._templateVisItem;
	// 		case home.TEMPLATE_FORM_NOVO_ITEM:
	// 			return this._templateFormNovoItem;
	// 		case home.TEMPLATE_FORM_EDITAR_ITEM:
	// 			return this._templateFormEditarItem;
	// 		default:
	// 			return null;
	// 	}
	// },

    _listeners: function _listeners(){
        $(home.BOTAO_CADASTRAR_USUARIO).click(function(){
            let form = $(home.FORM_USUARIO).serializeArray();
            home._submit(home.URL_AJAX_USUARIO_POST, form, home.REQUEST_SET_USUARIO, function(retorno) {
                console.log(retorno);
            });
        });

        $(home.BOTAO_CADASTRAR_VACINA).click(function(){
            let form = $(home.FORM_VACINA).serializeArray();
            home._submit(home.URL_AJAX_VACINA_POST, form, home.REQUEST_SET_VACINA, function(retorno) {
                console.log(retorno);
            });
        });

        $(home.BOTAO_CADASTRAR_ALERGIA).click(function(){
            let form = $(home.FORM_ALERGIA).serializeArray();
            home._submit(home.URL_AJAX_ALERGIA_POST, form, home.REQUEST_SET_ALERGIA, function(retorno) {
                console.log(retorno);
            });
        });
        // home._getDados(home.URL_AJAX_USUARIO_GET, home.REQUEST_GET_USUARIOS)
    },

    _submit: function _submit(link, formulario, request, callback){
        $.ajax({
            url: link+request,
            method: 'POST',
            dataType: "json",
            async: false,
            data: formulario,
            success: function(data){
                callback(data);
            }
        });
    },



    // _getDados: function _getDados(link, request){
	// 	$.ajax({
	// 		url: link + request,
	// 		async: Controller_item.ASYNC,
	// 		dataType: "json",
	// 		success: function(data){
	// 			// Armazena o retorno na variável global _dados
	// 			Controller_item._dados = data;
	// 			//console.log(data);
	// 		}
	// 	});
	// },


    _start : function _start(){
        // this._loadTemplates();
        // this._getTemplate();
        this._listeners();
    },
}