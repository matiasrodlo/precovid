<?php

    if(!isset($_POST['nombre']) || !isset($_POST['region']) || !isset($_POST['ciudad']) || !isset($_POST['rut']) || !isset($_POST['telefono']) || !isset($_POST['correo']) || !isset($_POST['terminos']) || !isset($_POST['edad']) || !isset($_POST['mayor'])) {
        echo "<script type=\"text/javascript\">window.location.replace(\"" . RUTA . "\")</script>";
    }

    // Sanitizar elementos
    $args = array(
        'edad' => FILTER_SANITIZE_NUMBER_INT,
        'nombre' => FILTER_SANITIZE_STRING,
        'rut' => FILTER_SANITIZE_STRING,
        'telefono' => FILTER_SANITIZE_NUMBER_INT,
        'correo' => FILTER_SANITIZE_EMAIL,
        'region' => FILTER_SANITIZE_STRING,
        'ciudad' => FILTER_SANITIZE_STRING
    );

    $entradas = filter_input_array(INPUT_POST, $args);

?>

        <div class="container">
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
                    <h2>¿Qué síntomas tienes?</h2>
                    <p>Responda las siguientes preguntas para ayudarlo con la evaluación</p>
                </div>
            </div>
            <form name="calcular" method="POST">
                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Tienes sensación de falta de aire de inicio brusco? (En ausencia de cualquier otra patología que justifique este síntoma)</h5>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="falta_aire" id="falta_aire" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1 ">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="falta_aire" id="falta_aire" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Tienes fiebre? (37.7°C o más)</h5>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="fiebre" id="fiebre" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="fiebre" id="fiebre" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Tienes tos seca y persistente?</h5>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="tos" id="tos" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="tos" id="tos" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Has tenido contacto estrecho con algún paciente positivo confirmado?</h5>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="contacto" id="contacto" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="contacto" id="contacto" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Tienes mucosidad en la nariz?</h5> 
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="mucosidad" id="mucosidad" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="mucosidad" id="mucosidad" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Tienes dolor muscular?</h5>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="muscular" id="muscular" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="muscular" id="muscular" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Tienes sintomatología gastrointestinal?</h5>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="gastro" id="gastro" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="gastro" id="gastro" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col">
                        <h5>¿Llevas más de 20 días con estos síntomas?</h5>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="muchos_dias" id="muchos_dias" value="si" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">Sí</span>
                            </div>
                        </label>
                        <label class="click-container">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="radio" name="muchos_dias" id="muchos_dias" value="no" required />
                                    </div>
                                </div>
                                <span class="input-group-text flex-fill">No</span>
                            </div>
                        </label>
                    </div>
                </div>

                <input type="hidden" name="nombre" value="<?php echo $entradas['nombre']; ?>">
                <input type="hidden" name="rut" value="<?php echo $entradas['rut']; ?>">
                <input type="hidden" name="edad" value="<?php echo $entradas['edad']; ?>">
                <input type="hidden" name="telefono" value="<?php echo $entradas['telefono']; ?>">
                <input type="hidden" name="correo" value="<?php echo $entradas['correo']; ?>">
                <input type="hidden" name="ciudad" value="<?php echo $entradas['ciudad']; ?>">
                <input type="hidden" name="region" value="<?php echo $entradas['region']; ?>">

                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-outline-primary" id="formulario" name="formulario">Continuar</button>
                    </div>
                </div>

            </form>
        </div>

        <style type="text/css"> 
            .click-container {
                display: block;
                cursor: pointer;
            }
        </style>