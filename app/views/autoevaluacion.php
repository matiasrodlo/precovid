
        <div class="container">
            <div class="row mt-3 mb-3">
                <div class="col">
                    <a href="javascript:history.back()">
                        <i class="fas fa-angle-left text-primary mx-2"></i>
                        Volver
                    </a>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <h2>Autoevaluación oficial</h2>
                    <p>Toda la información que se recoge por la comunidad es con fines estrictamente de interés público ante la situación decretada por las Autoridades Sanitarias. Su recolección es voluntaria y con la finalidad de proteger y salvaguardar la vida de las personas.</p>
                    <p>Recuerda estas recomendaciones básicas:</p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-house-user text-info mx-2"></i>
                            Quédate en casa
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-people-arrows text-danger mx-2"></i>
                            Evita el contacto con personas de riesgo
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-hands-wash text-success mx-2"></i>
                            Lávate las manos correctamente
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-head-side-cough text-warning mx-2"></i>
                            Si sientes síntomas, aíslate
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user-md text-info mx-2"></i>
                            Confía en la información oficial
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <p>Con esta aplicación podrás:</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="fas fa-stethoscope text-info mx-2"></i>
                            Evaluar tu situación de salud en función de tus síntomas
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-hospital-symbol text-info mx-2"></i>
                            Recibir instrucciones y recomendaciones en función de tu estado de salud
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-microscope text-info mx-2"></i>
                            Evaluarte cada 12 horas y mantener actualizado tu estado de salud
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-user-nurse text-info mx-2"></i>
                            Ayudar a todos los profesionales que trabajan por tu seguridad y bienestar
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <script type="text/javascript" src="<?php echo RES_JAVASCRIPTS . '/age-validation.js'; ?>"></script>
                    <form name="age-validation" id="age-validation" method="POST" action="<?php echo RUTA . '/login'; ?>">
                    <div class="alert alert-secondary">
                        <p>Para utilizar esta aplicación, debes ser mayor de 16 años. Por favor, indícanos tu fecha de nacimiento:</p>
                        <div class="input-group mb-3">
                            <input type="number" min="1" max="31" id="dia" name="dia" class="form-control" placeholder="Día" required>
                            <input type="number" min="1" max="12" id="mes" name="mes" class="form-control" placeholder="Mes" required>
                            <input type="number" min="1910" max="2020" id="ano" name="ano" class="form-control" placeholder="Año" required>
                            <input type="hidden" id="edad" name="edad" value="" />
                        </div>
                        <button type="submit" name="autoevaluacion" id="autoevaluacion" class="btn btn-primary">Siguiente</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>