<?php

    $args = array(
        'dia' => FILTER_SANITIZE_NUMBER_INT,
        'mes' => FILTER_SANITIZE_NUMBER_INT,
        'ano' => FILTER_SANITIZE_NUMBER_INT
    );

    $entradas = filter_input_array(INPUT_POST, $args);

    $dia = $entradas['dia'];
    $mes = $entradas['mes'];
    $ano = $entradas['ano'];

    $dob = new DateTime();
    $dob->setDate($ano, $mes, $dia);
    $dob->setTimezone(new DateTimeZone('America/Santiago'));

    $today = new DateTime();
    $today->setTimezone(new DateTimeZone('America/Santiago'));

    $diferencia = $today->diff($dob);
    $edad = $diferencia->y;

?>

        <div class="container">
            <script type="text/javascript" src="<?php echo RES_JAVASCRIPTS . '/jquery.rut.min.js'; ?>"></script>
            <script type="text/javascript" src="<?php echo RES_JAVASCRIPTS . '/form-validation.js'; ?>"></script>
            <form name="formulario" action="<?php echo RUTA . '/formulario'; ?>" method="POST">
                <input type="hidden" name="edad" id="edad" value="<?php echo $edad; ?>">
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <a href="javascript:history.back()">Volver</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <h3>Introduce tus datos</h3>
                        <p class="mt-4">Nombre</p>
                        <div class="input-group input-group-lg mb-2">
                            <input class="form-control" type="text" minlength="5" maxlength="150" name="nombre" id="nombre" required>
                        </div>
                        <p class="mt-4">R.U.T.</p>
                        <div class="input-group input-group-lg mb-2">
                            <input class="form-control" placeholder="12.345.678-9" type="text" name="rut" id="rut" pattern="(\d{1,3}(?:\.?\d{3}){2}-?[\dkK])" required>
                        </div>
                        <p class="mt-4">Número de teléfono</p>
                        <div class="input-group input-group-lg mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="codigo">+56</span>
                            </div>
                            <input type="tel" name="telefono" id="telefono" maxlength="9" pattern="[0-9]{8,9}" placeholder="912345678" class="form-control col-sm-10" aria-label="Teléfono" required />
                        </div>
                        <p class="mt-4">Correo electrónico</p>
                        <div class="input-group input-group-lg mb-2">
                            <input type="email" name="email" id="email" maxlength="100" placeholder="usuario@proveedor.ext" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" required>
                        </div>
                        <p class="mt-4">Dirección</p>
                        <div class="input-group input-group-lg mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Región</span>
                            </div>
                            <select name="region" id="region" class="form-control form-control-lg" required></select>
                        </div>
                        <div class="input-group input-group-lg mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Comuna</span>
                            </div>
                            <select class="form-control form-control-lg" name="comuna" id="comuna" required></select>
                        </div>
                        <div class="input-group input-group-lg mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ciudad</span>
                            </div>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" required>
                        </div>
                        <div class="input-group input-group-lg mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Calle</span>
                            </div>
                            <input type="text" name="calle" id="calle" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            <input type="checkbox" name="terminos" id="terminos" class="mr-2" value="accepted" required> 
                            Acepto las <a class="alert-link" href="<?php echo RUTA . '/terminos-condiciones'; ?>" target="_blank">Condiciones de Uso</a> y 
                            <a class="alert-link" href="<?php echo RUTA . '/privacidad'; ?>" target="_blank">Política de Privacidad</a>
                        </div>
                        <p>La presente aplicación implica el tratamiento de datos sensibles, relativos a tu salud, para el correcto funcionamiento 
                            del servicio de autoevaluación y otras finalidades, por motivos de interés público</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-outline-primary">Continuar</button>
                    </div>
                </div>
            </form>
        </div>