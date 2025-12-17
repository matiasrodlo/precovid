        <script type="text/javascript">

            history.pushState(null, null, location.href);

            window.onpopstate = function () {

                    history.go(1);

            };

        </script>

        <div class="container resultados-container" style="max-width: 600px; padding: 60px 24px; margin: 0 auto; display: block !important; flex: none !important; align-items: normal !important; justify-content: normal !important; min-height: auto !important; height: auto !important; overflow: visible !important;">

            <?php
            // Get severity and score from URL parameters
            $severity = isset($_GET['severity']) ? $_GET['severity'] : 'low_moderate';
            $score = isset($_GET['score']) ? intval($_GET['score']) : 0;
            $has_comorbidities = isset($_GET['comorbidities']) && $_GET['comorbidities'] === 'yes';
            
            // Determine accent color and message based on severity
            $accent_color = '#f59e0b';
            $title = 'Riesgo moderado de COVID-19';
            $message = 'Tus respuestas sugieren un riesgo moderado de COVID-19. Debes monitorear tus síntomas de cerca.';
            $action_message = 'Contacta a tu centro de salud en las próximas 24 horas. Repite la autoevaluación en 12 horas.';
            $emergency_emphasis = false;
            
            if ($severity === 'high' || $score >= 70) {
                $accent_color = '#dc2626';
                $title = 'Alto riesgo de COVID-19';
                $message = 'Tus síntomas sugieren un riesgo alto. Es importante que busques atención médica pronto.';
                $action_message = 'Contacta a tu centro de salud o médico de inmediato. Si tienes dificultad para respirar, busca atención de emergencia.';
                $emergency_emphasis = true;
            } elseif ($severity === 'moderate' || $score >= 50) {
                $accent_color = '#f59e0b';
                $title = 'Riesgo moderado de COVID-19';
                $message = 'Tus respuestas sugieren un riesgo moderado de COVID-19. Debes monitorear tus síntomas de cerca.';
                $action_message = 'Contacta a tu centro de salud en las próximas 24 horas. Repite la autoevaluación en 12 horas.';
            } else {
                $accent_color = '#3b82f6';
                $title = 'Riesgo bajo-moderado de COVID-19';
                $message = 'Tus respuestas sugieren un riesgo bajo-moderado. La mayoría de los casos son leves y pueden manejarse en casa.';
                $action_message = 'Repite la autoevaluación en 12 horas o antes si tu estado cambia.';
            }
            ?>

            <div class="text-center mb-5">
                <h1 class="mb-3" style="font-weight: 600; color: #0f172a; font-size: 1.75rem; letter-spacing: -0.02em; line-height: 1.2;">
                    <?php echo $title; ?>
                </h1>
                <p style="color: #475569; font-size: 1rem; line-height: 1.6; max-width: 500px; margin: 0 auto;">
                    <?php echo $message; ?>
                </p>
                        </div>

            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 2rem; margin-bottom: 1.5rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);">
                <?php if ($emergency_emphasis): ?>
                <div style="border-left: 3px solid #dc2626; padding-left: 1rem; margin-bottom: 1.5rem;">
                    <p style="color: #dc2626; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">
                        Importante
                    </p>
                    <p style="color: #475569; font-size: 0.875rem; line-height: 1.6; margin: 0;">
                        Si tienes dificultad para respirar, dolor en el pecho, confusión, o labios/rostro azulado, busca atención de emergencia inmediatamente.
                    </p>
                    </div>
                <?php endif; ?>
                
                <?php if ($has_comorbidities): ?>
                <div style="border-left: 3px solid #f59e0b; padding-left: 1rem; margin-bottom: 1.5rem;">
                    <p style="color: #f59e0b; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem;">
                        Factores de riesgo
                    </p>
                    <p style="color: #475569; font-size: 0.875rem; line-height: 1.6; margin: 0;">
                        Tienes condiciones de salud que pueden aumentar el riesgo de complicaciones. Es especialmente importante que busques atención médica y sigas las recomendaciones de tu médico.
                    </p>
                </div>
                <?php endif; ?>

                <p style="color: #0f172a; font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1rem;">
                    <?php echo $action_message; ?>
                </p>
                <p style="color: #64748b; font-size: 0.875rem; line-height: 1.6; margin: 0;">
                    Recuerda: los servicios médicos y de emergencia son para casos graves. ¡Cuidemos entre todos el sistema de salud!
                </p>
                        </div>

            <?php if ($score > 0): ?>
            <div class="text-center mb-4">
                <span style="font-size: 0.8125rem; color: #94a3b8; font-weight: 500;">
                    Puntuación de riesgo: <strong style="color: <?php echo $accent_color; ?>;"><?php echo $score; ?>/100</strong>
                    <button type="button" class="btn btn-link p-0 ml-1" data-toggle="tooltip" 
                            data-placement="top" title="Esta puntuación indica la probabilidad de tener COVID-19 basada en tus síntomas, edad, comorbilidades y exposición. No es un diagnóstico médico." 
                            style="color: #94a3b8; font-size: 0.75rem; vertical-align: middle; line-height: 1; padding: 0; border: none; background: none; cursor: help;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </span>
                    </div>
            <?php endif; ?>

            <form action="<?php echo RUTA . '/recomendaciones/positivo'; ?>" class="mb-4">
                <button type="submit" id="recom" class="btn btn-primary" style="width: 100%; padding: 14px 32px; font-size: 0.9375rem; font-weight: 500; border-radius: 10px; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none;">
                    Ver recomendaciones
                </button>
            </form>

            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.5rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);">
                <h5 class="mb-2" style="font-weight: 500; color: #0f172a; font-size: 0.9375rem; margin-bottom: 0.75rem;">
                    Comparte la autoevaluación
                </h5>
                <p class="mb-3" style="color: #64748b; font-size: 0.875rem; line-height: 1.6; margin-bottom: 1rem;">
                    Invita a tus familiares y amigos a usar esta autoevaluación. Ayudemos a cuidar la salud de todos y a descongestionar las líneas de atención.
                </p>
                <a href="https://wa.me/?text=Me+he+realizado+una+autoevaluci%C3%B3n+del+COVID-19.+Te+invito+a+que+descubras+si+tienes+los+s%C3%ADntomas+en+www.precovid.org.+La+puedes+realizar+en+menos+de+3+minutos+y+sin+costo" 
                   class="btn btn-primary" 
                   target="_blank" 
                   style="width: 100%; padding: 12px 24px; font-size: 0.875rem; font-weight: 500; border-radius: 10px; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none;">
                    <i class="fab fa-whatsapp mr-2"></i> Compartir por WhatsApp
                </a>
            </div>

        </div>

        <script>
            // Initialize Bootstrap tooltips
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip({
                    html: true
                });
            });
        </script>

        <style>
            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 16px rgba(59, 130, 246, 0.32) !important;
            }

            .btn-primary:active {
                transform: translateY(0);
            }
            
            @media (max-width: 768px) {
                .resultados-container {
                    padding: 40px 20px !important;
                }
                .resultados-container h1 {
                    font-size: 1.5rem !important;
                }
            }
            
            @media (max-width: 576px) {
                .resultados-container {
                    padding: 30px 16px !important;
                }
                .resultados-container h1 {
                    font-size: 1.375rem !important;
                }
                .resultados-container .btn {
                    width: 100% !important;
                }
            }
        </style>