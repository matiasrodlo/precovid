        <div class="container" style="max-width: 520px; padding: 40px 24px; margin: 0 auto; overflow: visible !important;">
            <form name="formulario" id="login-form" action="<?php echo RUTA . '/autoevaluacion'; ?>" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">

                <div class="row mb-4">
                    <div class="col">
                        <h3 class="mb-4" style="font-weight: 600; color: #0f172a; font-size: 1.75rem; letter-spacing: -0.02em; line-height: 1.2;">Completa tus datos</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nombre" class="form-label mb-1" style="font-weight: 500; color: #475569; font-size: 0.875rem; letter-spacing: 0.01em; display: block;">Nombre</label>
                            <input class="form-control" type="text" minlength="5" maxlength="150" name="nombre" id="nombre" placeholder="Ingresa tu nombre completo" required style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; font-size: 0.9375rem; transition: border-color 0.2s ease;">
                        </div>

                        <div class="mb-3" style="position: relative; z-index: 1;">
                            <label for="region" class="form-label mb-1" style="font-weight: 500; color: #475569; font-size: 0.875rem; letter-spacing: 0.01em; display: block;">País</label>
                            <select name="region" id="region" class="form-control" required style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 40px 12px 16px; font-size: 0.9375rem; cursor: pointer; transition: border-color 0.2s ease; position: relative; z-index: 10; background-color: #fff; line-height: 1.5; height: auto; min-height: 44px;">
                                <option value="" disabled selected>Selecciona tu país</option>
                            </select>
                            <small class="form-text text-muted" style="font-size: 0.75rem; color: #94a3b8; margin-top: 0.25rem; display: block;">Selecciona el país donde te encuentras actualmente</small>
                        </div>

                        <div class="mb-4">
                            <label for="correo" class="form-label mb-1" style="font-weight: 500; color: #475569; font-size: 0.875rem; letter-spacing: 0.01em; display: block;">Correo electrónico</label>
                            <input type="email" name="correo" id="correo" maxlength="100" placeholder="usuario@correo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" required style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; font-size: 0.9375rem; transition: border-color 0.2s ease;">
                        </div>

                        <div class="mb-4" style="padding-top: 8px;">
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" name="mayor" id="mayor" value="accepted" required style="margin-top: 0.35rem; cursor: pointer;">
                                <label for="mayor" class="form-check-label ml-2" style="color: #475569; cursor: pointer; font-size: 0.875rem; line-height: 1.5; font-weight: 400;">Tengo 16 años o más</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="terminos" id="terminos" value="accepted" required style="margin-top: 0.35rem; cursor: pointer;">
                                <label for="terminos" class="form-check-label ml-2" style="color: #475569; cursor: pointer; font-size: 0.875rem; line-height: 1.5; font-weight: 400;">
                                    Acepto los <a href="<?php echo RUTA . '/terminos'; ?>" target="_blank" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Términos</a> y <a href="<?php echo RUTA . '/privacidad'; ?>" target="_blank" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Privacidad</a>
                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="edad" id="edad" value="16" />

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary btn-submit" id="formulario" name="formulario" value="" style="width: 100%; padding: 14px 32px; font-size: 1rem; font-weight: 500; border-radius: 10px; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.24); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none;">
                                Continuar
                            </button>
                        </div>

                        <p class="text-center mt-4 mb-0" style="font-size: 0.8125rem; color: #94a3b8; line-height: 1.5;">
                            Tus datos están protegidos
                        </p>
                    </div>
                </div>

            </form>
        </div>

        <style>
            #login-form input:focus,
            #login-form select:focus {
                outline: none;
                border-color: #3b82f6 !important;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            }

            #login-form select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23475569' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
                background-repeat: no-repeat;
                background-position: right 16px center;
                background-size: 12px;
                padding-right: 40px;
                line-height: 1.5 !important;
                height: auto !important;
                min-height: 44px;
                display: flex;
                align-items: center;
            }

            #login-form select option {
                padding: 8px 16px;
                line-height: 1.5;
                height: auto;
            }

            #login-form select:focus {
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%233b82f6' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            }

            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 16px rgba(59, 130, 246, 0.32) !important;
            }

            .btn-primary:active {
                transform: translateY(0);
            }

            .form-check-input:checked {
                background-color: #3b82f6;
                border-color: #3b82f6;
            }

            .form-check-input:focus {
                border-color: #3b82f6;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            }

            /* Ensure select dropdown is fully visible */
            #region {
                overflow: visible !important;
            }

            .container {
                overflow: visible !important;
            }
            
            @media (max-width: 768px) {
                .container {
                    padding: 30px 20px !important;
                }
                .login-title {
                    font-size: 1.5rem !important;
                }
            }
            
            @media (max-width: 576px) {
                .container {
                    padding: 24px 16px !important;
                }
                .login-title {
                    font-size: 1.375rem !important;
                }
            }
        </style>