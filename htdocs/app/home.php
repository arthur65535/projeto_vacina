<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Vacinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="icon" href="assets/icon1.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="home.php">
                    <img src="assets/logo1.png" height="25" alt="" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gerenciarAgendas.php">Gerenciar Agendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gerenciarAlergias.php">Gerenciar Alergias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gerenciarUsuarios.php">Gerenciar Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gerenciarVacinas.php">Gerenciar Vacinas</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
            <a href="logout.php" class="btn btn-outline-success btn-sm">Sair</a>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- FIM NAVBAR -->

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <!-- Quadrado 1 -->
                    <div class="card rounded">
                        <div class="card-body">
                            <h5 class="card-title">Cadastrar Usu&aacute;rio</h5>
                            <form id="form-usuario">
                                <div class="mb-3">
                                    <input type="text" maxlength="60" class="form-control" id="nome" name="nome" placeholder="Nome"/>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" onfocus="(this.type='date')">
                                </div>
                                <div class="mb-3">
                                    <input type="text" maxlength="1" class="form-control" id="sexo" name="sexo" placeholder="Sexo" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" maxlength="60" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro"/>
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="numero" name="numero" placeholder="Número" />
                                </div>                                    <div class="mb-3">
                                    <input type="text" maxlength="40" class="form-control" id="setor" name="setor" placeholder="Setor" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" maxlength="40" class="form-control" id="cidade" name="cidade" placeholder="Cidade" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" maxlength="2" class="form-control" id="uf" name="uf" placeholder="UF" style="text-transform:uppercase"/>
                                </div>
                                <button type="submit" id="botao-cadastrar-usuario" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <!-- Quadrado 2 -->
                    <div class="card rounded">
                        <div class="card-body">
                            <h5 class="card-title">Agendar Vacinação</h5>
                            <form id="form-agenda">
                                <div class="mb-3">
                                    <label for="dataAgen" class="form-label">Data da Vacinação</label>
                                    <input type="date" class="form-control" id="dataAgen">
                                </div>
                                <div class="mb-3">
                                    <label for="vacina" class="form-label">Vacina</label>
                                    <select class="form-select" id="listar-vacina" onclick="carregarDadosVacina()">
                                        <option value="">Selecione uma vacina</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <!-- Cadastrar Alergias -->
                    <div class="card rounded">
                        <div class="card-body">
                            <h5 class="card-title">Cadastrar Alergia</h5>
                            <form id="form-alergia">
                                <div class="mb-3">
                                    <input type="text" maxlength="40" class="form-control" id="nomealer" name="nome" placeholder="Título"/>
                                </div>
                                <button type="submit" id="botao-cadastrar-alergia" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <!-- Cadastrar Vacinas -->
                    <div class="card rounded">
                        <div class="card-body">
                            <h5 class="card-title">Cadastrar Vacina</h5>
                            <form id="form-vacina">
                                <div class="mb-3">
                                    <input type="text" maxlength="60" class="form-control" id="nomevac" name="titulo" placeholder="Título"/>
                                </div>
                                <div class="mb-3">
                                    <input type="text" maxlength="200" class="form-control" id="descvac" name="descricao" placeholder="Descrição"/>
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="dosesvac" name="doses" placeholder="Doses"/>
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="periovac" name="periodicidade" placeholder="Periodicidade"/>
                                </div>
                                <div class="mb-3">
                                    <input type="number" class="form-control" id="intervac" name="intervalo" placeholder="Intervalo"/>
                                </div>
                                <button type="submit" id="botao-cadastrar-vacina" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.2.0/mustache.min.js"></script> -->

    <script src="./js/home.js">
    
<script type="text/javascript">
	
    $(document).ready(function() {
        // INICIALIZANDO
        home._start();  
    });  
</script>
    
</body>

</html>