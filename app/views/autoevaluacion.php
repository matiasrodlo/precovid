        <div class="container age-container" style="max-width: 520px; padding: 60px 24px; margin: 0 auto; overflow: visible !important; display: flex !important; flex-direction: column; justify-content: center; align-items: center; min-height: calc(100vh - 112px);">

            <div class="row mb-5">
                <div class="col text-center">
                    <h3 class="mb-3" style="font-weight: 600; color: #0f172a; font-size: 1.75rem; letter-spacing: -0.02em; line-height: 1.2;">Verificación de edad</h3>
                    <p class="mb-0" style="font-size: 0.9375rem; color: #64748b; line-height: 1.6; max-width: 480px; margin: 0 auto;">Para utilizar esta aplicación, debes tener 16 años o más. Por favor, indícanos tu fecha de nacimiento:</p>
                </div>
            </div>

            <?php
            // Get login data from POST to pass along to formulario
            $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
            $region = isset($_POST['region']) ? htmlspecialchars($_POST['region']) : '';
            $correo = isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : '';
            $terminos = isset($_POST['terminos']) ? htmlspecialchars($_POST['terminos']) : '';
            $mayor = isset($_POST['mayor']) ? htmlspecialchars($_POST['mayor']) : '';
            ?>

            <form name="age-validation" id="age-validation" method="POST" action="<?php echo RUTA . '/formulario'; ?>">
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">

                <div class="row">
                <div class="col">
                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label for="dia" class="form-label mb-1 text-center" style="font-weight: 500; color: #475569; font-size: 0.875rem; letter-spacing: 0.01em; display: block; text-align: center;">Día</label>
                                <select id="dia" name="dia" class="form-control" required style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 40px 12px 16px; font-size: 0.9375rem; cursor: pointer; transition: border-color 0.2s ease; background-color: #fff; line-height: 1.5; height: auto; min-height: 44px; width: 100%; margin: 0 auto;">
                                    <option value="">Selecciona</option>
                                    <?php for($i = 1; $i <= 31; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <label for="mes" class="form-label mb-1 text-center" style="font-weight: 500; color: #475569; font-size: 0.875rem; letter-spacing: 0.01em; display: block; text-align: center;">Mes</label>
                                <select id="mes" name="mes" class="form-control" required style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 40px 12px 16px; font-size: 0.9375rem; cursor: pointer; transition: border-color 0.2s ease; background-color: #fff; line-height: 1.5; height: auto; min-height: 44px; width: 100%; margin: 0 auto;">
                                    <option value="">Selecciona</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
            </div>
                            <div class="col-md-4">
                                <label for="ano" class="form-label mb-1 text-center" style="font-weight: 500; color: #475569; font-size: 0.875rem; letter-spacing: 0.01em; display: block; text-align: center;">Año</label>
                                <select id="ano" name="ano" class="form-control" required style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 40px 12px 16px; font-size: 0.9375rem; cursor: pointer; transition: border-color 0.2s ease; background-color: #fff; line-height: 1.5; height: auto; min-height: 44px; width: 100%; margin: 0 auto;">
                                    <option value="">Selecciona</option>
                                    <?php 
                                    $currentYear = (int)date('Y');
                                    $minYear = $currentYear - 100; // Limit to 100 years ago
                                    for($i = $currentYear; $i >= $minYear; $i--): 
                                    ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                </div>
            </div>

                            <input type="hidden" id="edad" name="edad" value="" />

                        <!-- Hidden fields to pass login data to formulario -->
                        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>" />
                        <input type="hidden" name="region" value="<?php echo $region; ?>" />
                        <input type="hidden" name="correo" value="<?php echo $correo; ?>" />
                        <input type="hidden" name="terminos" value="<?php echo $terminos; ?>" />
                        <input type="hidden" name="mayor" value="<?php echo $mayor; ?>" />

                        <div class="text-center mt-5">
                            <button type="submit" name="autoevaluacion" id="autoevaluacion" class="btn btn-primary" style="width: 100%; padding: 14px 32px; font-size: 1rem; font-weight: 500; border-radius: 10px; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.24); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none;">
                                Continuar
                            </button>
                        </div>
                        </div>
                    </div>

                    </form>

                </div>

        <script type="text/javascript" src="<?php echo RES_JAVASCRIPTS . '/age-validation.js'; ?>"></script>

        <style>
            #age-validation .row {
                margin-left: -15px;
                margin-right: -15px;
            }

            #age-validation .row > [class*="col-"] {
                padding-left: 15px;
                padding-right: 15px;
            }

            #age-validation select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23475569' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 16px center;
                background-size: 12px;
                line-height: 1.5 !important;
                height: auto !important;
                min-height: 44px;
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            #age-validation select:focus {
                outline: none;
                border-color: #3b82f6 !important;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%233b82f6' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            }

            #age-validation select option {
                padding: 8px 16px;
                line-height: 1.5;
            }

            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 16px rgba(59, 130, 246, 0.32) !important;
            }

            .btn-primary:active {
                transform: translateY(0);
            }

            @media (max-width: 768px) {
                #age-validation .col-md-4 {
                    padding-left: 15px !important;
                    padding-right: 15px !important;
                    margin-bottom: 1rem;
                }
            }
        </style>