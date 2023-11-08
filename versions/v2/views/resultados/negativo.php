        
        <script type="text/javascript" src="<?php echo RES_JAVASCRIPTS . '/clipboard.min.js'; ?>"></script>
        <script type="text/javascript">
            var clipboard = new ClipboardJS('.btn');
            clipboard.on('success', function(e) {
                $("#toast").toast({delay: 800});
                $("#toast").toast('show');
            });
        </script>
        <div class="container">
            <div class="row mt-3 mb-5">
                <div class="col">
                    <a href="javascript:history.back()">Volver</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Tu Resultado</div>
                        <div class="card-body">
                            <h5 class="card-title">Sigue las instrucciones que aparecen a continuación</h5>
                            <p class="card-text">Según los datos que ha aportado, pareces no tener síntomas o no son específicos para determinar que tienes coronavirus. En cualquier caso, el coronavirus se presenta con síntomas leves en la mayoría de ocasiones. Si los síntomas que tienes persisten o ves que no mejoras, vuelve a autoevaluarse dentro de 12 horas, y si en cualquier caso tu estado empeora, contacta telefónicamente con tu centro de salud y en caso de emergencia al 600-360-7777.</p>
                            <p class="card-text">Recuerda que los servicios médicos y de atención telefónica deben ser usados ​​por pacientes que presenten gravedad. ¡Usémoslos con responsabilidad!</p>
                            <p class="card-text">
                                <form action="<?php echo RUTA . '/recomendaciones/negativo'; ?>">
                                    <button type="submit" id="recom" class="btn btn-light w-100">Ver recomendaciones</button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-heart text-danger mx-2"></i>
                                Invita a quien quieras
                            </h5>
                            <p class="card-text">Esta aplicación te ofrece información según tus síntomas y ayuda a los equipos de atención a canalizar las consultas.</p>
                            <input type="text" id="url" class="form-control mb-3" value="http://www.precovid.cl" readonly />
                            <button type="button" class="btn btn-primary w-100" data-clipboard-target="#url">Compartir</button>
                        </div>
                        <div class="toast" id="toast">
                            <div class="toast-body">Enlace copiado!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>