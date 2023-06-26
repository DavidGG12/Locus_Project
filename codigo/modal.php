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