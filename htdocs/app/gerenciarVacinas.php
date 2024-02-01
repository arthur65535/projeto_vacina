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
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


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
            </div>

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <a href="logout.php" class="btn btn-outline-success btn-sm">Sair</a>
            </div>
            <!-- Right elements -->
        </div>
        <!-- wrapper -->
    </nav>
    <!-- FIM NAVBAR -->

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="dow">
                    <div id="wrapper">
                        <div id="page-wrapper" style=" padding-bottom:100px">
                            <div class="row">
                                <br>
                                <div class="col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4>Gerenciar Vacinas</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div id="container-tabela-vacinas"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.2.0/mustache.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- SCRIPT TEMPLATE TABELA DE VACINAS -->
    <script type="text/template" id="template-tabela-vacinas">
    <table id="tabela-vacinas" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Título</th>
                    <th style="text-align: center">Descrição</th>
                    <th style="text-align: center">Doses</th>
                    <th style="text-align: center">Periodicidade</th>
                    <th style="text-align: center">Intervalo</th>
                    <th style="text-align: center">A&ccedil;&otilde;es</th>
                </tr>
            </thead>

            <tbody>
            {{#DADOS}}
                <tr data-id="{{id}}" data-nome="{{titulo}}">
                    <td style="text-align: center">{{titulo}}</td>
                    <td style="text-align: center">{{descricao}}</td>
                    <td style="text-align: center">{{doses}}</td>
                    <td style="text-align: center">{{periodicidade}}</td>
                    <td style="text-align: center">{{intervalo}}</td>
                    <td style="text-align: center">
                        <button type="button" class="btn btn-warning" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Editar Vacina"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Deletar Vacina"><i class="fa fa-close"></i></button>
                    </td>
                </tr>
            {{/DADOS}}
            </tbody>
        </table>
    </script>

    <script src="./js/gerenciarVacinas.js" type="module">
        $(document).ready(function () {
            // INICIALIZANDO
            gerenciarVacinas._start();
        });  
    </script>
</body>

</html>