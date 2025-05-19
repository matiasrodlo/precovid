        <div class="container">
            <form name="formulario" action="<?php echo RUTA . '/formulario'; ?>" method="POST">

                <div class="row mt-3 mb-3">

                    <div class="col">

                        <a href="javascript:history.back()">

                            <i class="fas fa-angle-left text-primary mx-2"></i>

                            Volver

                        </a>

                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col">

                        <h3>Completa tus datos</h3>

                        <p class="mt-4">Nombre</p>

                        <div class="input-group input-group-lg mb-2">

                            <input class="form-control" type="text" minlength="5" maxlength="150" name="nombre" id="nombre" required>

                        </div>



                        <p class="mt-4">Dirección</p>

                        <div class="input-group input-group-lg mb-2">

                            <div class="input-group-prepend w-25">

                                <span class="input-group-text w-100">País</span>

                            </div>

                            <select name="region" id="region" class="form-control form-control-lg w-75" required></select>

                        </div>



                        <p class="mt-4">Correo electrónico</p>

                        <div class="input-group input-group-lg mb-2">

                            <input type="email" name="correo" id="correo" maxlength="100" placeholder="usuario@correo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col">

                        <div class="alert alert-info" role="alert">

                            <div class="form-group form-check">

                                <input type="checkbox" class="form-check-input mr-2" name="mayor" id="mayor" value="accepted" required>

                                <label for="mayor" class="form-check-label">Tengo 16 años o más</label>

                            </div>

                            <div class="form-group form-check mb-0">

                                <input type="checkbox" class="form-check-input" name="terminos" id="terminos" value="accepted" required>

                                <label for="terminos" class="form-check-label mr-2">

                                    Acepto los <a class="alert-link" href="<?php echo RUTA . '/terminos'; ?>" target="_blank">Términos</a> y

                                    <a class="alert-link" href="<?php echo RUTA . '/privacidad'; ?>" target="_blank">Privacidad</a>

                                </label>

                            </div>

                        </div>

                        <p>Usamos tus datos solo para la autoevaluación y recomendaciones de salud. Tu privacidad está protegida.</p>

                    </div>

                </div>

                <div class="row">

                    <div class="col">

                        <input type="hidden" name="edad" id="edad" value="16" />

                        <button type="submit" class="btn btn-outline-primary" id="formulario" name="formulario" value="">Continuar</button>

                    </div>

                </div>

            </form>

        </div>