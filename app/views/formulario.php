<?php

// Ensure all required POST fields are present; otherwise, redirect to home
// This prevents users from accessing the form directly without providing initial data.
if(!isset($_POST['nombre']) || !isset($_POST['region']) || !isset($_POST['correo']) || !isset($_POST['terminos']) || !isset($_POST['edad']) || !isset($_POST['mayor'])) {
    echo "<script type=\"text/javascript\">window.location.replace(\"" . RUTA . "\")</script>";
}

// Sanitize user input for use in the form
// This ensures that the hidden fields are safe to use in the next POST
$args = array(
    'edad' => FILTER_SANITIZE_NUMBER_INT,   // User's age
    'nombre' => FILTER_UNSAFE_RAW,          // User's name (raw, as it's displayed only)
    'correo' => FILTER_SANITIZE_EMAIL,      // Email
    'region' => FILTER_UNSAFE_RAW           // Region (raw)
);
$entradas = filter_input_array(INPUT_POST, $args);

?>

<div class="container formulario-container" style="max-width: 720px; padding: 40px 24px; margin: 0 auto; display: block !important; flex: none !important; align-items: normal !important; justify-content: normal !important; min-height: auto !important; height: auto !important; overflow: visible !important;">
    <!-- Form introduction -->
    <div class="row mb-5">
        <div class="col text-center">
            <h2 class="mb-3" style="font-weight: 600; color: #0f172a; font-size: 1.75rem; letter-spacing: -0.02em; line-height: 1.2;">Información de salud y síntomas</h2>
            <p class="text-muted mb-0" style="font-size: 0.9375rem; color: #64748b; line-height: 1.6; max-width: 600px; margin: 0 auto;">Responde las siguientes preguntas para ayudarte con la evaluación</p>
        </div>
    </div>

    <!-- Risk Factors Section -->
    <div class="row mb-5">
        <div class="col">
            <div class="card mb-4" style="border: 1px solid #e2e8f0; border-radius: 12px; background: #fff; box-shadow: none;">
                <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 1.25rem 1.5rem;">
                    <h5 class="mb-0" style="color: #0f172a; font-weight: 600; font-size: 1.125rem;">Factores de riesgo y antecedentes</h5>
                </div>
                <div class="card-body" style="padding: 1.5rem;">
                    <!-- Recent Test History -->
                    <div class="mb-4">
                        <h6 class="mb-3" style="font-weight: 500; color: #334155; font-size: 0.9375rem;">¿Te has hecho una prueba de COVID-19 en los últimos 14 días?</h6>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="radio" name="prueba_reciente" id="prueba_positiva" value="positiva" required style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="prueba_positiva" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Sí, resultado positivo</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="radio" name="prueba_reciente" id="prueba_negativa" value="negativa" required style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="prueba_negativa" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Sí, resultado negativo</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="radio" name="prueba_reciente" id="prueba_no" value="no" required style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="prueba_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">No me he hecho prueba</label>
                        </div>
                    </div>

                    <!-- Comorbidities -->
                    <div class="mb-3">
                        <h6 class="mb-3" style="font-weight: 500; color: #334155; font-size: 0.9375rem;">
                            ¿Tienes alguna de estas condiciones de salud?
                            <button type="button" class="btn btn-link p-0 ml-2 help-icon" data-toggle="tooltip" 
                                    data-placement="top" title="Estas condiciones pueden aumentar el riesgo de complicaciones si tienes COVID-19. Si no estás seguro, consulta con tu médico." style="color: #94a3b8; font-size: 0.875rem;">
                                <i class="fas fa-question-circle"></i>
                            </button>
                        </h6>
                        <p class="text-muted small mb-3" style="font-size: 0.8125rem; color: #94a3b8;">(Marca todas las que apliquen)</p>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorb_diabetes" value="diabetes" style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="comorb_diabetes" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Diabetes</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorb_corazon" value="corazon" style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="comorb_corazon" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Enfermedad cardíaca o hipertensión</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorb_pulmon" value="pulmon" style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="comorb_pulmon" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Enfermedad pulmonar crónica (asma, EPOC, etc.)</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorb_renal" value="renal" style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="comorb_renal" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Enfermedad renal crónica</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorb_inmuno" value="inmuno" style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="comorb_inmuno" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Sistema inmunológico debilitado (cáncer, VIH, trasplante, etc.)</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorb_obesidad" value="obesidad" style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="comorb_obesidad" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Obesidad (IMC > 30)</label>
                        </div>
                        <div class="form-check mb-2" style="padding-left: 1.75rem;">
                            <input class="form-check-input" type="checkbox" name="comorbilidades[]" id="comorb_ninguna" value="ninguna" style="margin-top: 0.35rem; cursor: pointer;">
                            <label class="form-check-label" for="comorb_ninguna" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5;">Ninguna de las anteriores</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Symptom assessment form -->
    <form name="calcular" method="POST" id="symptomForm">
        <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
        <!-- Each question is a Bootstrap-styled block with radio buttons for Sí/No -->
        <!-- The name attribute of each input matches the expected POST field in index.php -->
        <div class="row question-block">
            <div class="col" role="group" aria-labelledby="falta_aire_question">
                <!-- Shortness of breath question -->
                <h5 id="falta_aire_question" class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">
                    ¿Tienes sensación de falta de aire de inicio brusco?
                    <button type="button" class="btn btn-link p-0 ml-2 help-icon" data-toggle="tooltip" 
                            data-placement="top" title="Falta de aire significa dificultad para respirar que aparece de forma repentina, sin una causa conocida previa (como asma o ejercicio)." style="color: #94a3b8; font-size: 0.875rem;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </h5>
                <p class="text-muted small mb-3" style="font-size: 0.8125rem; color: #94a3b8;">(En ausencia de cualquier otra patología que justifique este síntoma)</p>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="falta_aire" id="falta_aire_si" value="si" required aria-label="Sí" style="cursor: pointer;">
                            <label class="form-check-label" for="falta_aire_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="falta_aire" id="falta_aire_no" value="no" required aria-label="No" style="cursor: pointer;">
                            <label class="form-check-label" for="falta_aire_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row question-block">
            <div class="col">
                <!-- Fever question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">
                    ¿Tienes fiebre?
                    <button type="button" class="btn btn-link p-0 ml-2 help-icon" data-toggle="tooltip" 
                            data-placement="top" title="Fiebre significa temperatura corporal de 37.7°C (100°F) o más. Si no tienes termómetro, considera si sientes calor anormal o escalofríos." style="color: #94a3b8; font-size: 0.875rem;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </h5>
                <p class="text-muted small mb-3" style="font-size: 0.8125rem; color: #94a3b8;">(37.7°C o más)</p>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fiebre" id="fiebre_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="fiebre_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fiebre" id="fiebre_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="fiebre_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row question-block">
            <div class="col">
                <!-- Cough question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">
                    ¿Tienes tos seca y persistente?
                    <button type="button" class="btn btn-link p-0 ml-2 help-icon" data-toggle="tooltip" 
                            data-placement="top" title="Tos seca significa tos sin flema o moco. Persistente significa que dura varios días y no es ocasional." style="color: #94a3b8; font-size: 0.875rem;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tos" id="tos_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="tos_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tos" id="tos_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="tos_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row question-block">
            <div class="col">
                <!-- Contact with positive case question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">
                    ¿Has tenido contacto estrecho con algún paciente positivo confirmado?
                    <button type="button" class="btn btn-link p-0 ml-2 help-icon" data-toggle="tooltip" 
                            data-placement="top" title="Contacto estrecho significa haber estado a menos de 2 metros de una persona con COVID-19 confirmado, por más de 15 minutos, sin mascarilla, en los últimos 14 días." style="color: #94a3b8; font-size: 0.875rem;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contacto" id="contacto_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="contacto_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contacto" id="contacto_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="contacto_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row question-block">
            <div class="col">
                <!-- Nasal mucus question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">¿Tienes mucosidad en la nariz?</h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mucosidad" id="mucosidad_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="mucosidad_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mucosidad" id="mucosidad_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="mucosidad_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row question-block">
            <div class="col">
                <!-- Muscle pain question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">¿Tienes dolor muscular?</h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="muscular" id="muscular_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="muscular_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="muscular" id="muscular_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="muscular_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row question-block">
            <div class="col">
                <!-- Gastrointestinal symptoms question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">
                    ¿Tienes sintomatología gastrointestinal?
                    <button type="button" class="btn btn-link p-0 ml-2 help-icon" data-toggle="tooltip" 
                            data-placement="top" title="Síntomas gastrointestinales incluyen náuseas, vómitos, diarrea o dolor abdominal. Estos síntomas son menos comunes en COVID-19 que en otras enfermedades." style="color: #94a3b8; font-size: 0.875rem;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gastro" id="gastro_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="gastro_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gastro" id="gastro_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="gastro_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
                            </div>

        <div class="row question-block">
            <div class="col">
                <!-- Duration of symptoms question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">
                    ¿Llevas más de 7 días con estos síntomas?
                    <button type="button" class="btn btn-link p-0 ml-2 help-icon" data-toggle="tooltip" 
                            data-placement="top" title="Cuenta desde el inicio de los primeros síntomas. Los síntomas de COVID-19 típicamente duran entre 7-14 días, pero pueden persistir más tiempo." style="color: #94a3b8; font-size: 0.875rem;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="muchos_dias" id="muchos_dias_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="muchos_dias_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="muchos_dias" id="muchos_dias_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="muchos_dias_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
                            </div>

        <div class="row question-block">
            <div class="col">
                <!-- Loss of taste/smell question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">¿Has perdido el sentido del gusto o del olfato?</h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perdida_gusto_olfato" id="perdida_gusto_olfato_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="perdida_gusto_olfato_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perdida_gusto_olfato" id="perdida_gusto_olfato_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="perdida_gusto_olfato_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row question-block">
            <div class="col">
                <!-- Fatigue question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">¿Sientes fatiga o cansancio extremo?</h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fatiga" id="fatiga_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="fatiga_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fatiga" id="fatiga_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="fatiga_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
                            </div>

        <div class="row question-block">
            <div class="col">
                <!-- Headache question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">¿Tienes dolor de cabeza?</h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dolor_cabeza" id="dolor_cabeza_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="dolor_cabeza_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dolor_cabeza" id="dolor_cabeza_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="dolor_cabeza_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
                            </div>

        <div class="row question-block">
            <div class="col">
                <!-- Sore throat question -->
                <h5 class="mb-2" style="font-weight: 500; color: #334155; font-size: 1rem; line-height: 1.5;">¿Tienes dolor de garganta?</h5>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dolor_garganta" id="dolor_garganta_si" value="si" required style="cursor: pointer;">
                            <label class="form-check-label" for="dolor_garganta_si" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                Sí
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="dolor_garganta" id="dolor_garganta_no" value="no" required style="cursor: pointer;">
                            <label class="form-check-label" for="dolor_garganta_no" style="color: #475569; cursor: pointer; font-size: 0.9375rem; line-height: 1.5; width: 100%; display: block; padding: 10px 16px; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                                No
                </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden fields to pass user data to the next POST request -->
        <input type="hidden" name="nombre" value="<?php echo $entradas['nombre']; ?>">
        <input type="hidden" name="edad" value="<?php echo $entradas['edad']; ?>">
        <input type="hidden" name="correo" value="<?php echo $entradas['correo']; ?>">
        <input type="hidden" name="region" value="<?php echo $entradas['region']; ?>">

        <div class="row mb-3">
            <div class="col">
                <!-- Submit button for the form -->
                <div class="alert alert-warning mb-4" role="alert" id="incompleteWarning" style="display: none; border: 1px solid #fef3c7; background: #fffbeb; border-radius: 8px; padding: 1rem 1.25rem; border-left-width: 3px; border-left-color: #f59e0b;">
                    <strong style="font-weight: 500; color: #92400e; font-size: 0.875rem;"><i class="fas fa-exclamation-triangle"></i> Atención:</strong> <span style="color: #475569; font-size: 0.875rem;">Parece que no has respondido todas las preguntas. Por favor, revisa el formulario antes de continuar.</span>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" id="formulario" name="formulario" value=""
                            aria-label="Enviar evaluación de síntomas" style="width: 100%; padding: 14px 32px; font-size: 1rem; font-weight: 500; border-radius: 10px; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.24); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none;">
                        <i class="fas fa-check-circle" aria-hidden="true"></i> Enviar evaluación
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<!--
  Style for clickable question containers. Ensures the whole label is clickable.
-->
<style type="text/css"> 
    /* Override global container styles for formulario page */
    #symptomForm ~ .container,
    form[name="calcular"] ~ .container,
    .container:has(#symptomForm),
    .container:has(form[name="calcular"]) {
        display: block !important;
        flex: none !important;
        align-items: normal !important;
        justify-content: normal !important;
        min-height: auto !important;
    }
    
    /* Ensure container doesn't use flexbox layout */
    body:has(#symptomForm) .container,
    body:has(form[name="calcular"]) .container {
        display: block !important;
    }
    
    .click-container {
        display: block;
        cursor: pointer;
    }
    
    /* Elegant question spacing - prevent overlap */
    .question-block {
        padding: 1.75rem 0;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 0;
        clear: both;
        overflow: hidden;
    }
    
    .question-block:last-child {
        border-bottom: none;
    }
    
    /* Ensure proper spacing for question content */
    .question-block .col {
        padding: 0;
    }
    
    /* Radio button options layout */
    .question-block .row {
        margin-left: 0;
        margin-right: 0;
    }
    
    .question-block .row > [class*="col-"] {
        padding-left: 8px;
        padding-right: 8px;
    }
    
    @media (min-width: 768px) {
        .question-block .row > .col-md-6 {
            padding-left: 8px;
            padding-right: 8px;
        }
    }
    
    /* Form check styling */
    .question-block .form-check {
        margin-bottom: 0;
    }
    
    .question-block .form-check-label {
        margin-left: 0.5rem;
        display: inline-block;
    }
    
    .question-block .form-check-input {
        margin-top: 0.35rem;
    }
    
    /* Cleaner radio button styling */
    .click-container .input-group-text {
        user-select: none;
    }
    
    /* Minimalist help icon */
    .help-icon {
        color: #94a3b8;
        font-size: 0.875rem;
        transition: color 0.2s ease;
    }
    
    .help-icon:hover {
        color: #3b82f6;
    }

    /* Radio button label hover effect */
    .question-block .form-check-input:checked + .form-check-label {
        border-color: #3b82f6 !important;
        background-color: #eff6ff;
        color: #1e40af;
        font-weight: 500;
    }

    .question-block .form-check-label:hover {
        border-color: #cbd5e1;
        background-color: #f8fafc;
    }
    
    /* Ensure proper spacing for form-check in grid */
    .question-block .form-check {
        margin-bottom: 0;
    }
    
    .question-block .form-check-label {
        margin-left: 0.5rem;
    }

    /* Gap utility for flexbox */
    .gap-2 {
        gap: 0.5rem;
    }
    
    @supports not (gap: 0.5rem) {
        .gap-2 > * {
            margin-right: 0.5rem;
        }
        .gap-2 > *:last-child {
            margin-right: 0;
        }
    }

    /* Button hover effects */
    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(59, 130, 246, 0.32) !important;
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    /* Form check input styling */
    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    .form-check-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    @media (max-width: 768px) {
        .formulario-container {
            padding: 30px 20px !important;
        }
        .formulario-container h2 {
            font-size: 1.5rem !important;
        }
        .formulario-container .card {
            margin-bottom: 1.5rem !important;
        }
        .formulario-container .card-body {
            padding: 1.25rem !important;
        }
    }
    
    @media (max-width: 576px) {
        .formulario-container {
            padding: 24px 16px !important;
        }
        .formulario-container h2 {
            font-size: 1.375rem !important;
        }
        .formulario-container .card-body {
            padding: 1rem !important;
        }
        .formulario-container .btn {
            width: 100% !important;
        }
    }
</style>

<script type="text/javascript">
// Form validation and submission
(function() {
    
    // Initialize tooltips (Bootstrap) - wait for DOM and Bootstrap to be ready
    $(document).ready(function() {
        // Initialize all tooltips
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover focus',
            html: true
        });
    });
    
    // Count unique radio button groups (questions)
    function countRequiredQuestions() {
        var requiredRadios = document.querySelectorAll('input[type="radio"][required]');
        var questionNames = new Set();
        requiredRadios.forEach(function(radio) {
            questionNames.add(radio.name);
        });
        return questionNames.size;
    }
    
    // Count answered questions
    function countAnsweredQuestions() {
        var checkedRadios = document.querySelectorAll('input[type="radio"]:checked');
        var answeredNames = new Set();
        checkedRadios.forEach(function(radio) {
            answeredNames.add(radio.name);
        });
        return answeredNames.size;
    }
    
    // Form submission validation and confirmation
    document.getElementById('symptomForm').addEventListener('submit', function(e) {
        var requiredCount = countRequiredQuestions();
        var answeredCount = countAnsweredQuestions();
        
        // Check if all required questions are answered
        if (answeredCount < requiredCount) {
            e.preventDefault();
            document.getElementById('incompleteWarning').style.display = 'block';
            document.getElementById('incompleteWarning').scrollIntoView({ behavior: 'smooth', block: 'center' });
            return false;
        }
        
        // Hide warning if all questions answered
        document.getElementById('incompleteWarning').style.display = 'none';
        
        // Show loading state
        var submitBtn = document.getElementById('formulario');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando evaluación...';
        
        // Allow form to submit
        return true;
    });
    
    // Show/hide incomplete warning as user fills form
    function checkCompleteness() {
        var requiredCount = countRequiredQuestions();
        var answeredCount = countAnsweredQuestions();
        var warning = document.getElementById('incompleteWarning');
        
        if (answeredCount < requiredCount && answeredCount > 0) {
            warning.style.display = 'block';
        } else if (answeredCount >= requiredCount) {
            warning.style.display = 'none';
        }
    }
    
    // Check completeness when form changes
    document.addEventListener('change', function(e) {
        if (e.target.type === 'radio' || e.target.type === 'checkbox') {
            checkCompleteness();
        }
    });
    
})();
</script>