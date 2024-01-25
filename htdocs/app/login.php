<?php
	include('includes/Connection.php');
?>

<!DOCTYPE html>
<head>
    <!-- Metadados iniciais -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Vacinas</title>

    <!-- Folhas de estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="icon" href="assets/icon1.png">
</head>

<body>
    <section class="vh-100">
        <div class=" container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <img class="mb-5" src="assets/logo1.png" alt="Boltchat logotipo" id="navLogo">

                        <h5 class="mb-5">Autenticação</h5>

                        <div class="form-outline mb-4">
                            <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX-2">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX-2">Senha</label>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                            <label class="form-check-label" for="form1Example3"> Lembrar senha </label>
                        </div>

                        <a href="../home/home.html">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Includes de JS -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>