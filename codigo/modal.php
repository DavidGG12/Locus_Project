<!--MODAL ACTUALIZAR COLABORADORES-->
<form action = "admin.php" method="post">
                        <div id="Actualizar_Colaborador" class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Actualizar Colaboradores: </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!--Formulario Colaboradores-->
                                        <div class="mb-3">
                                            <input type="hidden" id="last_user_colaborator" name="last_user_colaborator">
                                            <label class="form-label">Usuario:</label>
                                            <input type="text" name = "user_update_colaborator" id="user_modal_colaborator" class="form-control" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Correo:</label>
                                            <input type="email" name = "email_update_colaborator" id="email_modal_colaborator" class="form-control" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contraseña:</label>
                                            <input type="password" name = "password_update_colaborator" id="password_modal_colaborator" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Repetir Contraseña:</label>
                                            <input type="password" name = "password_repeat_update_colaborator" id="password_repeat_modal_colaborator" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="update_colaborator" class="btn btn-primary">Actualizar</button>
                                    </div>
                                    <script src="js/ajax_colaborator.js"></script>
                                </div>
                            </div>
                        </div>
                    </form>



<!--Modal Registro de videojuegos-->
<form action="admin.php" method="post">
                    <div id="Añadir_Juego" class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Añadir Juegos: </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                            <!--Formulario Juegos-->
                                    <div class="input-group mb-3">
                                        <label class="input-group-text">Imagen:</label>
                                        <input type="file" name="cover_image" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Título:</label>
                                        <input type="text" name = "title_register" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Subtítulo:</label>
                                        <input type="text" name = "subtitle_register" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description:</label>
                                        <input type="text" name = "description_register" class="form-control" id="exampleInputPassword1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Versión:</label>
                                        <input type="number" name = "version_register" class="form-control" id="exampleInputPassword1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Almacenamiento:</label>
                                        <input type="number" name="storage_int" class="form-control" >
                                        <select class="btn btn-outline-secondary dropdown-toggle" name="storage" aria-expanded="false">
                                            <option value="MB">MB</option>
                                            <option value="GB">GB</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Plataforma:</label>
                                        <select name="platform_register" class="form-control">
                                        <?php
                                                $con = connection();

                                                //Obtener los datos de la tabla y el tipo con un inner join
                                                $query = "SELECT ID_PLATFORM, PFNAME FROM platform";
                                                $result = $con -> query($query);

                                                while($row = $result->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo "<option vaule ='". $row['ID_PLATFORM'] ."'>". $row['PFNAME'] ."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Publicador:</label>
                                        <select name="publisher_register" id="publisher_register" class="form-control">
                                        <?php
                                                $con = connection();

                                                //Obtener los datos de la tabla y el tipo con un inner join
                                                $query = "SELECT ID_PUBLISHER, PNAME FROM publisher";
                                                $result = $con -> query($query);

                                                while($row = $result->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo "<option value ='". $row['ID_PUBLISHER'] ."'>". $row['PNAME'] ."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Desarrollador:</label>
                                        <select name="developer_register" id="developer_register" class="form-control">
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Clasificación:</label>
                                        <select name="classification_register" class="form-control">
                                            <?php
                                                $con = connection();
                                                
                                                //Obtener los datos de la tabla y el tipo con un inner join
                                                $query = "SELECT ID_CLASSIFICATION, CNAME FROM classificaton";
                                                $result = $con -> query($query);
                                                
                                                while($row = $result->fetch(PDO::FETCH_ASSOC))
                                                {
                                                    echo "<option vaule ='". $row['ID_CLASSIFICATION'] ."'>". $row['CNAME'] ."</option>";
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="register_videogame" name="register_videogame" class="btn btn-primary">Registrar</button>
                                    <script src="js/ajax_developer.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>



                elseif(isset($_POST['register_videogame']))
            {
                $image = $_POST[$_FILES['cover_image']];
                $title = strtoupper(validate_text($_POST['title_register']));
                $subtitle = strtoupper(validate_text($_POST['subtitle_register']));
                $description = strtoupper(validate_text($_POST['description_register']));
                $version = $_POST['version_register'];
                $storage = $_POST['storage_int'].$_POST['storage'];
                $platform = $_POST['platform_register'];
                $developer = $_POST['developer_register'];
                $classification = $_POST['classification_register'];

                registerVideogames(null, $image, $title, $subtitle, $description, $version, $storage, $platform, $developer, $classification);
            }