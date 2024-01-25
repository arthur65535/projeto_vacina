<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoltCHAT Analytics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="icon" href="../assets/icon 1.png">
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
                <a class="navbar-brand mt-2 mt-lg-0" href="../home/home.html">
                    <img src="../assets/logo 1.png" height="25" alt="Boltchat Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../home/home.html">Painel Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../home/painel_bd.html">Painel SQL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../home/config.html">Configurações</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/icon 1.png" class="rounded-circle" height="25" alt="Boltchat logo"
                            loading="lazy" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="#">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- FIM NAVBAR -->

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="dow">
                    <h4>Visão geral</h4>
                </div>
                <div class="row" id="bordaCima">
                    <div class="col md-3">
                        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Estatísticas do chatbot</div>
                            <div class="card-body">
                                <p class="card-text">Métrica 1: <b>612</b></p>
                                <p class="card-text">Métrica 2: <b>4901</b></p>
                                <p class="card-text">Métrica 3: <b>210</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col md-3">
                        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Estatísticas de uso</div>
                            <div class="card-body">
                                <p class="card-text">Métrica 1: : <b>6:04:51</b></p>
                                <p class="card-text">Métrica 2: : <b>10606</b></p>
                                <p class="card-text">Métrica 3: : <b>Olá</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col md-3">
                        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Estatísticas de avaliação</div>
                            <div class="card-body">
                                <p class="card-text">Métrica 1: : <b>951</b></p>
                                <p class="card-text">Métrica 2: : <b>305</b></p>
                                <p class="card-text">Métrica 3: : <b>31%</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col md-3">
                        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                            <div class="card-header">Estatísticas de conteúdo</div>
                            <div class="card-body">
                                <p class="card-text">Métrica 1: <b>5012</b></p>
                                <p class="card-text">Métrica 2: <b>4901</b></p>
                                <p class="card-text">Métrica 3: <b>210</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h4>Pesquisa</h4>
            </div>
            <div class="row chartrow">
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Tempo de uso: por empresa
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200">

                            </canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Coleta de metadados: por mês
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/controller.js"></script>
</body>

</html>