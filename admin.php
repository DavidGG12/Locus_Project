<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>

    <!--Estilos Bootstrap y Google Fonts-->
    <link rel="stylesheet" href="/Locus_Project/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Geologica&family=Oswald:wght@700&family=Roboto&family=Rubik+Puddles&display=swap" rel="stylesheet">
</head>

<body>
    <?php
        include("functions.php");
        //include("register.php");
    ?>
    <!---Funciones---->
    <script>
    function mostrarFormulario(formularioId) 
    {
        var formularios = document.getElementsByClassName('admin-container');
        for (var i = 0; i < formularios.length; i++) 
        {
            formularios[i].style.display = 'none';
        }
        document.getElementById(formularioId).style.display = 'block';
    }
    </script>

    <?php
        //require('functions.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['delete_user']))
            {
                deleteUser($_POST['user']);
            }
            elseif(isset($_POST['register_user']))
            {
                $email_register = validate_email($_POST['email_register']);
                $user_register = validate_text($_POST['user_register']);
                $password = $_POST['password_register'];
                $password_repeat = $_POST['password_register_repeat'];
    
                registerUser($email_register, $password, $password_repeat, $user_register, 2);
            }
            elseif(isset($_POST['register_colaborator']))
            {
                $email_register_colaborator = validate_email($_POST['email_register_colaborator']);
                $user_register_colaborator = validate_text($_POST['user_register_colaborator']);
                $password_colaborator = $_POST['password_register_colaborator'];
                $password_repeat_colaborator = $_POST['password_repeat_register_colaborator'];
    
                registerUser($email_register_colaborator, $password_colaborator, $password_repeat_colaborator, $user_register_colaborator, 3);
            }
        }
    ?>

    <!--barra de navegación-->
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#041721; font-size: 18px;">
        <!--clase responsive-->
        <div class="container-fluid">
            <!--icono y nombre de la página-->
            <a class="navbar-brand" href="index.php">
                <span class="fs-3 " style="color: #a0cceb; font-family: 'Rubik Puddles', cursive;"> &nbsp; Locus
                    Proyect</span>
            </a>

            <!--Boton desplegable-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--lista de elemntos dentro de la barra de navegación-->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!--COLOCAR EL LINK PARA EL CIERRE DE SESIÓN-->
                        <a class="nav-link" style="font-family: 'Oswald', sans-serif; font-size: 20px;"
                            href="destroySession.php">Cerrar sesión</a>
                    </li>
                </ul>

                <!--línea de separacion redes-->
                <hr class="text-white-50">

                <!--iconos de redes-->
                <ul class="navbar-nav flex-row flex-wrap text-light">
                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="#" style="color: #c7ddec;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-github" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                            </svg>
                            <small class="d-md-none ms-2">Github</small>
                        </a>
                    </li>

                    <li class="nav-itemcol-6 col-md-auto p-3">
                        <a href="#" style="color: #c7ddec;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                            <small class="d-md-none ms-2">Twitter</small>
                        </a>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="#" style="color: #c7ddec;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                            <small class="d-md-none ms-2">Facebook</small>
                        </a>
                    </li>

                    <li class="nav-item col-6 col-md-auto p-3">
                        <a href="#" style="color: #c7ddec;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                            <small class="d-md-none ms-2">Instagram</small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!----Sidebar----->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <hr>
                    <a href="#"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <!--icono?)-->
                        <span class="fs-5 d-none d-sm-inline"
                            style="font-family: 'Oswald', sans-serif; font-size: 22px;"> &nbsp; Menú</span>
                    </a>

                    <div class="btn-click-container">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0 ">
                                    <i>
                                        <!--icono-->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
                                            <path
                                                d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z" />
                                            <path
                                                d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z" />
                                        </svg>
                                    </i>
                                    <span class="ms-1 d-none d-sm-inline"
                                        style="font-family: 'Oswald', sans-serif; font-size: 18px;"
                                        onclick="mostrarFormulario('juegos')">Tabla Juegos</span> </a>
                            </li>

                            <li>
                                <a href="#" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <!--icono-->
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                        </svg>
                                    </i>
                                    <span class="ms-1 d-none d-sm-inline"
                                        style="font-family: 'Oswald', sans-serif; font-size: 18px;"
                                        onclick="mostrarFormulario('usuarios')">Tabla Usuarios</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <!--icono-->
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                        </svg>
                                    </i>
                                    <span class="ms-1 d-none d-sm-inline"
                                        style="font-family: 'Oswald', sans-serif; font-size: 18px;"
                                        onclick="mostrarFormulario('colaboradores')">Tabla Colaboradores</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--Contenedor principal de formularios-->
            <div class="col py-5">
                <div id="juegos" class="admin-container">
                    <h3>Datos de juegos</h3>

                    <button type="button" class="btn btn-outline-success">Añadir</button>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">COVER</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">SUBTITLE</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">VERSION</th>
                                <th scope="col">STORAGE</th>
                                <th scope="col">PLATFORM</th>
                                <th scope="col">DEVELOPER</th>
                                <th scope="col">CLASSIFICATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Conexión a la base de datos
                            $con = connection();
                            $i = 1;

                            // Consulta para obtener los datos de la tabla
                            $query = "SELECT ID_GAME, TITLE, SUBTITLE, DESCRIPTION_GAME, COVER_IMAGE, VERSION, STORAGE_GAME, PFNAME, DNAME, CNAME from videogames
							    INNER JOIN platform on videogames.PLATFORM_GAMES = platform.ID_PLATFORM
							    INNER JOIN developer on videogames.DEVELOPER_GAMES = developer.ID_DEVELOPER
							    INNER JOIN classificaton on videogames.CLASSIFICATION_GAMES = classificaton.ID_CLASSIFICATION";
                            $result = $con -> query($query);
                            
                            // Mostrar los datos en la tabla
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
                            {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td><img src = ' data:image/jpg; base64,". base64_encode($row['cover_image']) . "' height = 120, width = 100></img></td>";
                                echo "<td>" . $row["TITLE"] . "</td>";
                                echo "<td>" . $row["SUBTITLE"] . "</td>";
                                echo "<td>" . $row["DESCRIPTION_GAME"] . "</td>";
                                echo "<td>" . $row["VERSION"] . "</td>";
                                echo "<td>" . $row["STORAGE_GAME"] . "</td>";
                                echo "<td>" . $row["PFNAME"] . "</td>";
                                echo "<td>" . $row["DNAME"] . "</td>";
                                echo "<td>" . $row["CNAME"] . "</td>";
                                echo "<td> <a href='#' class='btn btn-primary'>Editar</a></td>";
                                echo "<td> <a href='#' class='btn btn-danger'>Eliminar</a></td>";
                                echo "</tr>";

                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div id="usuarios" class="admin-container" style="display: none;">
                    <h3>Datos de usuarios</h3>

                    <button id="btnAdd" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Añadir_Usuario">Añadir</button>
                    <form action = "admin.php" method = "post">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">USER</th>
                                    <th scope="col">PASSWORD</th>
                                    <th scope="col">TYPE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $con = connection();

                                    //Obtener los datos de la tabla y el tipo con un inner join
                                    $query = "SELECT ID_USER, EMAIL, USER_NAME, PASSWORD_USER, TNAME FROM user_ INNER JOIN type_ on user_.type_user = type_.id_Type WHERE TName = 'USER'";
                                    $result = $con -> query($query);

                                    $i = 1;

                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row["EMAIL"] . "</td>";
                                        echo "<td>" . $row["USER_NAME"] . "</td>";
                                        echo "<td>" . $row["PASSWORD_USER"] . "</td>";
                                        echo "<td>" . $row["TNAME"] . "</td>";
                                        echo "<td> <a href='#' class='btn btn-primary'>Editar</a></td>";
                                        echo "<td>";
                                        echo "<form action='admin.php' method='post'>";
                                        echo "<input type='hidden' name='user' value='" . $row["USER_NAME"] . "'>";
                                        echo "<button type='submit' name='delete_user' class='btn btn-danger'>Eliminar</button>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </form>                   
                    <!--Modal Usuarios-->
                    <div id="Añadir_Usuario" class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Añadir Colaboradores: </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                <!--Formulario Usuarios-->
                                    <form action="admin.php" method="post">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Usuario:</label>
                                            <input type="text" name = "user_register" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Correo:</label>
                                            <input type="email" name = "email_register" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
                                            <input type="password" name = "password_register" class="form-control" id="exampleInputPassword1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Repetir Contraseña:</label>
                                            <input type="password" name = "password_repeat_register" class="form-control" id="exampleInputPassword1" required>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" id="register_user" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="colaboradores" class="admin-container" style="display: none;">
                    <h3>Datos de Colaboradores</h3>

                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Añadir_Colaborador">Añadir</button>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">USER</th>
                                <th scope="col">PASSWORD</th>
                                <th scope="col">TYPE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = connection();

                                //Obtener los datos de la tabla y el tipo con un inner join
                                $query = "SELECT ID_USER, EMAIL, USER_NAME, PASSWORD_USER, TNAME FROM user_ INNER JOIN type_ on user_.type_user = type_.id_Type WHERE TName = 'ADMIN' OR TName = 'COLABORATOR'";
                                $result = $con -> query($query);

                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
                                {
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $row["EMAIL"] . "</td>";
                                    echo "<td>" . $row["USER_NAME"] . "</td>";
                                    echo "<td>" . $row["PASSWORD_USER"] . "</td>";
                                    echo "<td>" . $row["TNAME"] . "</td>";
                                    echo "<td> <a href='#' class='btn btn-primary'>Editar</a></td>";
                                    echo "<td>";
                                    echo "<form action='admin.php' method='post'>";
                                    echo "<input type='hidden' name='user' value='" . $row["USER_NAME"] . "'>";
                                    echo "<button type='submit' name='delete_user' class='btn btn-danger'>Eliminar</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>

                    <!--Modal Colaboradores-->
                    <form action = "admin.php" method="post">
                        <div id="Añadir_Colaborador" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Añadir Colaboradores: </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!--Formulario Colaboradores-->
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Usuario:</label>
                                            <input type="text" name = "user_register_colaborator" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Correo:</label>
                                            <input type="email" name = "email_register_colaborator" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
                                            <input type="password" name = "password_register_colaborator" class="form-control" id="exampleInputPassword1" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Repetir Contraseña:</label>
                                            <input type="password" name = "password_repeat_register_colaborator" class="form-control" id="exampleInputPassword1" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="register_colaborator" class="btn btn-primary">Registrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--Scripts-->
    <script src="/Locus_Project/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Locus_Project/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/Locus_Project/js/jquery-3.7.0.min.js"></script>
</body>

</html>