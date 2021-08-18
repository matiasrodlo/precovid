
        <script type="text/javascript">
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                    history.go(1);
            };
        </script>
        <div class="container">
            <div class="row mt-5 mb-3">
                <div class="col-md mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-header">Tu Resultado</div>
                        <div class="card-body">
                            <h5 class="card-title">Sigue las instrucciones que aparecen a continuación</h5>
                            <p class="card-text">Según los datos que ha aportado, pareces no tener síntomas o no son específicos para determinar que tienes coronavirus. En cualquier caso, el coronavirus se presenta con síntomas leves en la mayoría de ocasiones. Si los síntomas que tienes persisten o ves que no mejoras, vuelve a autoevaluarse dentro de 12 horas, y si en cualquier caso tu estado empeora, contacta telefónicamente con tu centro de salud.</p>
                            <p class="card-text">Recuerda que los servicios médicos y de atención telefónica deben ser usados ​​por pacientes que presenten gravedad. ¡Usémoslos con responsabilidad!</p>
                            <p class="card-text">
                                <form action="<?php echo RUTA . '/recomendaciones/negativo'; ?>">
                                    <button type="submit" id="recom" class="btn btn-light w-100">Explícame qué hacer</button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-heart text-danger mx-2"></i>
                                Comparte la autoevalución vía WhatsApp
                            </h5>
                            <p class="card-text">Envía una invitación a tus familiares y amigos vía WhatsApp. Ayúdanos salvar vidas y a descongestionar las líneas de atención del Ministerio de Salud.</p>
                            <input type="text" id="url" class="form-control mb-3" value="https://www.precovid.org" readonly />
                            <a href="https://wa.me/?text=Me+he+realizado+una+autoevaluci%C3%B3n+del+COVID-19.+Te+invito+a+que+descubras+si+tienes+los+s%C3%ADntomas+en+www.precovid.org.+La+puedes+realizar+en+menos+de+3+minutos+y+sin+costo" class="btn btn-primary w-100" target="_blank">Compartir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>