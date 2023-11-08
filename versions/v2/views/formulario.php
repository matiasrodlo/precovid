<?php

    $args = array(
        'edad' => FILTER_SANITIZE_NUMBER_INT,
        'nombre' => FILTER_SANITIZE_STRING,
        'rut' => FILTER_SANITIZE_STRING,
        'telefono' => FILTER_SANITIZE_NUMBER_INT,
        'email' => FILTER_SANITIZE_EMAIL,
        'region' => FILTER_SANITIZE_STRING,
        'comuna' => FILTER_SANITIZE_STRING,
        'ciudad' => FILTER_SANITIZE_STRING,
        'calle' => FILTER_SANITIZE_STRING
    );

    $entradas = filter_input_array(INPUT_POST, $args);

?>

        <div class="container">
            <div class="row mt-3 mb-3">
                <div class="col">
                    <a href="javascript:history.back()">Volver</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <h2>¿Qué síntomas tienes?</h2>
                    <p>Responda las siguientes preguntas para ayudarlo con la evaluación</p>
                </div>
            </div>
            <form name="calcular">
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

                <div class="row mb-3">
                    <div class="col">
                        <button type="button" class="btn btn-outline-primary" id="continuar" name="continuar">Continuar</button>
                        <img src="<?php echo RES_IMAGES . '/loader.gif'; ?>" id="loading">
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

        <script type="text/javascript">
            $("#loading").hide();

            $(document).ready(function() {
                $("#continuar").click(function() {
                    $("#continuar").prop('disabled', true);
                    $("#loading").show();

                    var obj = {};
                    obj.nombre = "<?php echo $entradas['nombre']; ?>";
                    obj.rut = "<?php echo $entradas['rut']; ?>";
                    obj.edad = <?php echo $entradas['edad']; ?>;
                    obj.telefono = "<?php echo $entradas['telefono']; ?>";
                    obj.correo = "<?php echo $entradas['email']; ?>";
                    obj.calle = "<?php echo $entradas['calle']; ?>";
                    obj.comuna = "<?php echo $entradas['comuna']; ?>";
                    obj.ciudad = "<?php echo $entradas['ciudad']; ?>";
                    obj.region = "<?php echo $entradas['region']; ?>";

                    obj.p1 = $("input[name='falta_aire']:checked").val();
                    obj.p2 = $("input[name='fiebre']:checked").val();
                    obj.p3 = $("input[name='tos']:checked").val();
                    obj.p4 = $("input[name='contacto']:checked").val();
                    obj.p5 = $("input[name='mucosidad']:checked").val();
                    obj.p6 = $("input[name='muscular']:checked").val();
                    obj.p7 = $("input[name='gastro']:checked").val();
                    obj.p8 = $("input[name='muchos_dias']:checked").val();

                    var probabilidad = 0;

                    probabilidad += (obj.p1 === "si") ? 20 : 0;
                    probabilidad += (obj.p2 === "si") ? 20 : 0;
                    probabilidad += (obj.p3 === "si") ? 20 : 0;
                    probabilidad += (obj.p4 === "si") ? 30 : 0;
                    probabilidad += (obj.p5 === "si") ? 12.5 : -12.5;
                    probabilidad += (obj.p6 === "si") ? 12.5 : 0;
                    probabilidad += (obj.p7 === "si") ? 12.5 : -12.5;
                    probabilidad += (obj.p8 === "si") ? 12.5 : 0;

                    $.ajax({
                        url: 'https://precovid.conmapas.cl:8002/nuevaTest',
                        type: 'POST',
                        data: obj,
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#loading").hide();
                            if(probabilidad >= 50 || (obj.p1 === "si" && obj.p2 === "si" && obj.p3 === "si")) {
                                window.location.href = "<?php echo RUTA . '/resultados/positivo'; ?>";
                            } else {
                                window.location.href = "<?php echo RUTA . '/resultados/negativo'; ?>";
                            }
                        },
                        error: function(data) {
                            alert("Hubo un error al procesar los datos, por favor inténtalo nuevamente en unos minutos.");
                            $("#continuar").prop('disabled', false);
                            $("#loading").hide();
                        }
                    });
                });
            });
        </script>