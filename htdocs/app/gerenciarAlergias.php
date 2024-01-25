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
                    <h4>Gerenciar Alergias</h4>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/gerenciarAlergias.js"></script>
</body>

</html>