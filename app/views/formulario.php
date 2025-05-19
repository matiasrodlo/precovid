<?php

// Ensure all required POST fields are present; otherwise, redirect to home
// This prevents users from accessing the form directly without providing initial data.
if(!isset($_POST['nombre']) || !isset($_POST['region']) || !isset($_POST['ciudad']) || !isset($_POST['rut']) || !isset($_POST['correo']) || !isset($_POST['terminos']) || !isset($_POST['edad']) || !isset($_POST['mayor'])) {
    echo "<script type=\"text/javascript\">window.location.replace(\"" . RUTA . "\")</script>";
}

// Sanitize user input for use in the form
// This ensures that the hidden fields are safe to use in the next POST
$args = array(
    'edad' => FILTER_SANITIZE_NUMBER_INT,   // User's age
    'nombre' => FILTER_UNSAFE_RAW,          // User's name (raw, as it's displayed only)
    'rut' => FILTER_UNSAFE_RAW,             // National ID (raw)
    'correo' => FILTER_SANITIZE_EMAIL,      // Email
    'region' => FILTER_UNSAFE_RAW,          // Region (raw)
    'ciudad' => FILTER_UNSAFE_RAW           // City (raw)
);
$entradas = filter_input_array(INPUT_POST, $args);

?>

<div class="container">
    <!-- Navigation back link -->
    <div class="row mt-3 mb-3">
        <div class="col">
            <a href="javascript:history.back()">
                <i class="fas fa-angle-left text-primary mx-2"></i>
                Volver
            </a>
        </div>
    </div>

    <!-- Form introduction -->
    <div class="row mb-3">
        <div class="col">
            <h2>¿Qué síntomas tienes?</h2>
            <p>Responda las siguientes preguntas para ayudarlo con la evaluación</p>
        </div>
    </div>

    <!-- Symptom assessment form -->
    <form name="calcular" method="POST">
        <!-- Each question is a Bootstrap-styled block with radio buttons for Sí/No -->
        <!-- The name attribute of each input matches the expected POST field in index.php -->
        <div class="row mb-5">
            <div class="col">
                <!-- Shortness of breath question -->
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
                <!-- Fever question -->
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
                <!-- Cough question -->
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
                <!-- Contact with positive case question -->
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
                <!-- Nasal mucus question -->
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
                <!-- Muscle pain question -->
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
                <!-- Gastrointestinal symptoms question -->
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
                <!-- Many days with symptoms question -->
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

        <!-- Hidden fields to pass user data to the next POST request -->
        <input type="hidden" name="nombre" value="<?php echo $entradas['nombre']; ?>">
        <input type="hidden" name="rut" value="<?php echo $entradas['rut']; ?>">
        <input type="hidden" name="edad" value="<?php echo $entradas['edad']; ?>">
        <input type="hidden" name="correo" value="<?php echo $entradas['correo']; ?>">
        <input type="hidden" name="ciudad" value="<?php echo $entradas['ciudad']; ?>">
        <input type="hidden" name="region" value="<?php echo $entradas['region']; ?>">

        <div class="row mb-3">
            <div class="col">
                <!-- Submit button for the form -->
                <button type="submit" class="btn btn-outline-primary" id="formulario" name="formulario">Continuar</button>
            </div>
        </div>
    </form>
</div>

<!--
  Style for clickable question containers. Ensures the whole label is clickable.
-->
<style type="text/css"> 
    .click-container {
        display: block;
        cursor: pointer;
    }
</style>