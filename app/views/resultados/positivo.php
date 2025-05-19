        <script type="text/javascript">

            history.pushState(null, null, location.href);

            window.onpopstate = function () {

                    history.go(1);

            };

        </script>

        <div class="container">

            <div class="row mt-5 mb-3">

                <div class="col-md mb-3">

                    <div class="card bg-warning text-dark">

                        <div class="card-header">Tu Resultado</div>

                        <div class="card-body">

                            <h5 class="card-title">Podrías tener síntomas de COVID-19</h5>

                            <p class="card-text">Tus respuestas sugieren que podrías tener síntomas compatibles con COVID-19. La mayoría de los casos son leves y pueden manejarse en casa.</p>

                            <p class="card-text">Repite la autoevaluación en 12 horas o antes si tu estado cambia. Si tienes dificultad para respirar o una emergencia, contacta de inmediato a los servicios de salud.</p>

                            <p class="card-text">Recuerda: los servicios médicos y de emergencia son para casos graves. ¡Cuidemos entre todos el sistema de salud!</p>

                            <form action="<?php echo RUTA . '/recomendaciones/positivo'; ?>">

                                <button type="submit" id="recom" class="btn btn-light w-100">Ver recomendaciones</button>

                            </form>

                        </div>

                    </div>

                </div>

                <div class="col-md">

                    <div class="card bg-light">

                        <div class="card-body">

                            <h5 class="card-title">

                                <i class="fas fa-heart text-danger mx-2"></i>

                                Comparte la autoevaluación por WhatsApp

                            </h5>

                            <p class="card-text">Invita a tus familiares y amigos a usar esta autoevaluación. Ayudemos a cuidar la salud de todos y a descongestionar las líneas de atención.</p>

                            <input type="text" id="url" class="form-control mb-3" value="https://www.precovid.org" readonly />

                            <a href="https://wa.me/?text=Me+he+realizado+una+autoevaluci%C3%B3n+del+COVID-19.+Te+invito+a+que+descubras+si+tienes+los+s%C3%ADntomas+en+www.precovid.org.+La+puedes+realizar+en+menos+de+3+minutos+y+sin+costo" class="btn btn-primary w-100" target="_blank">Compartir</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>