        <script type="text/javascript">
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>

        <div class="container emergencia-container" style="max-width: 600px; padding: 60px 24px; margin: 0 auto; display: block !important; flex: none !important; align-items: normal !important; justify-content: normal !important; min-height: auto !important; height: auto !important; overflow: visible !important;">

            <div class="text-center mb-5">
                <div style="font-size: 3.5rem; margin-bottom: 1.5rem;">🚨</div>
                <h1 class="mb-3" style="font-weight: 600; color: #dc2626; font-size: 1.75rem; letter-spacing: -0.02em; line-height: 1.2;">
                    Atención médica urgente
                </h1>
                <p style="color: #7f1d1d; font-size: 1rem; line-height: 1.6; max-width: 500px; margin: 0 auto;">
                    Has reportado <strong>dificultad para respirar</strong>, que es un síntoma que requiere atención médica urgente.
                </p>
            </div>

            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 2rem; margin-bottom: 1.5rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);">
                <h3 class="mb-4" style="font-weight: 600; color: #0f172a; font-size: 1.125rem; margin-bottom: 1.5rem;">
                    ¿Qué debes hacer ahora?
                </h3>
                
                <div class="mb-4" style="padding-bottom: 1.5rem; border-bottom: 1px solid #e2e8f0;">
                    <h5 style="font-weight: 500; color: #dc2626; font-size: 0.9375rem; margin-bottom: 0.75rem;">
                        Si tienes dificultad severa para respirar:
                    </h5>
                    <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9375rem; line-height: 1.8;">
                        <li>Llama a emergencias (911 o número de emergencia de tu país) <strong style="color: #dc2626;">inmediatamente</strong></li>
                        <li>O acude al servicio de urgencias más cercano</li>
                    </ul>
                </div>

                <div class="mb-4" style="padding-bottom: 1.5rem; border-bottom: 1px solid #e2e8f0;">
                    <h5 style="font-weight: 500; color: #f59e0b; font-size: 0.9375rem; margin-bottom: 0.75rem;">
                        Si la dificultad es moderada:
                    </h5>
                    <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9375rem; line-height: 1.8;">
                        <li>Contacta a tu médico o centro de salud de inmediato</li>
                        <li>No esperes - busca atención hoy mismo</li>
                    </ul>
                </div>

                <div>
                    <h5 style="font-weight: 500; color: #3b82f6; font-size: 0.9375rem; margin-bottom: 0.75rem;">
                        Mientras esperas atención:
                    </h5>
                    <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9375rem; line-height: 1.8;">
                        <li>Mantén la calma y respira lentamente</li>
                        <li>Siéntate en posición cómoda (no te acuestes)</li>
                        <li>Evita esfuerzos físicos</li>
                        <li>Ten a mano tu información médica</li>
                    </ul>
                </div>
            </div>

            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);">
                <h5 style="font-weight: 500; color: #0f172a; font-size: 0.9375rem; margin-bottom: 1rem;">
                    Señales de emergencia - Llama 911 si presentas:
                </h5>
                <ul style="margin: 0; padding-left: 1.25rem; color: #475569; font-size: 0.9375rem; line-height: 1.8;">
                    <li>Dificultad extrema para respirar</li>
                    <li>Dolor o presión en el pecho</li>
                    <li>Confusión o dificultad para despertar</li>
                    <li>Labios o rostro azulado</li>
                    <li>Fiebre muy alta (más de 39°C)</li>
                </ul>
            </div>

            <div style="background: #f8fafc; border-radius: 12px; padding: 1.25rem; margin-bottom: 2rem;">
                <p class="mb-0" style="color: #64748b; font-size: 0.875rem; line-height: 1.6;">
                    <strong style="color: #475569;">Recuerda:</strong> Esta autoevaluación no sustituye la atención médica profesional. Si tienes síntomas graves, busca atención médica inmediata. No esperes.
                </p>
            </div>

            <div class="text-center">
                <a href="<?php echo RUTA; ?>" class="btn btn-primary" style="padding: 12px 32px; font-size: 0.9375rem; font-weight: 500; border-radius: 10px; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none;">
                    Volver al inicio
                </a>
            </div>

        </div>

        <style>
            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3) !important;
            }

            .btn-primary:active {
                transform: translateY(0);
            }
            
            @media (max-width: 768px) {
                .emergencia-container {
                    padding: 40px 20px !important;
                }
                .emergencia-container h1 {
                    font-size: 1.5rem !important;
                }
                .emergencia-container div[style*="font-size: 3.5rem"] {
                    font-size: 2.5rem !important;
                }
            }
            
            @media (max-width: 576px) {
                .emergencia-container {
                    padding: 30px 16px !important;
                }
                .emergencia-container h1 {
                    font-size: 1.375rem !important;
                }
                .emergencia-container div[style*="font-size: 3.5rem"] {
                    font-size: 2rem !important;
                }
                .emergencia-container .btn {
                    width: 100% !important;
                }
            }
        </style>

