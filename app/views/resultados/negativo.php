        <script type="text/javascript">

            history.pushState(null, null, location.href);

            window.onpopstate = function () {

                    history.go(1);

            };

        </script>

        <?php
        $score = isset($_GET['score']) ? intval($_GET['score']) : 0;
        ?>

        <div class="container resultados-container" style="max-width: 600px; padding: 60px 24px; margin: 0 auto; display: block !important; flex: none !important; align-items: normal !important; justify-content: normal !important; min-height: auto !important; height: auto !important; overflow: visible !important;">

            <div class="text-center mb-5">
                <h1 class="mb-3" style="font-weight: 600; color: #0f172a; font-size: 1.75rem; letter-spacing: -0.02em; line-height: 1.2;">
                    Todo indica que no tienes síntomas preocupantes
                </h1>
                <p style="color: #475569; font-size: 1rem; line-height: 1.6; max-width: 500px; margin: 0 auto;">
                    Por ahora, no presentas síntomas claros de COVID-19. Si te sientes bien, sigue con tus actividades habituales y mantén las medidas de autocuidado.
                </p>
                        </div>

            <div style="background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 2rem; margin-bottom: 1.5rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);">
                <p style="color: #0f172a; font-size: 0.9375rem; line-height: 1.6; margin-bottom: 1rem;">
                    Si tus síntomas cambian o empeoran, vuelve a hacer la autoevaluación en 12 horas o contacta a tu centro de salud.
                </p>
                <p style="color: #64748b; font-size: 0.875rem; line-height: 1.6; margin: 0;">
                    Recuerda: los servicios médicos y de emergencia son para casos graves. ¡Cuidemos entre todos el sistema de salud!
                </p>
                    </div>

            <?php if ($score > 0): ?>
            <div class="text-center mb-4">
                <span style="font-size: 0.8125rem; color: #94a3b8; font-weight: 500;">
                    Puntuación de riesgo: <strong style="color: #10b981;"><?php echo $score; ?>/100</strong>
                    <button type="button" class="btn btn-link p-0 ml-1" data-toggle="tooltip" 
                            data-placement="top" title="Esta puntuación indica la probabilidad de tener COVID-19 basada en tus síntomas, edad, comorbilidades y exposición. No es un diagnóstico médico." 
                            style="color: #94a3b8; font-size: 0.75rem; vertical-align: middle; line-height: 1; padding: 0; border: none; background: none; cursor: help;">
                        <i class="fas fa-question-circle"></i>
                    </button>
                </span>
                </div>
            <?php endif; ?>

            <form action="<?php echo RUTA . '/recomendaciones/negativo'; ?>" class="mb-4">
                <button type="submit" id="recom" class="btn btn-primary" style="width: 100%; padding: 14px 32px; font-size: 0.9375rem; font-weight: 500; border-radius: 10px; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: none;">
                    ¿Qué más puedo hacer?
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