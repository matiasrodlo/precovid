<?php
// 404 Not Found Page
http_response_code(404);
?>
<div class="container" style="max-width: 600px; padding: 60px 24px; margin: 0 auto; text-align: center;">
    <div class="row">
        <div class="col">
            <h1 class="mb-4" style="font-weight: 600; color: #0f172a; font-size: 3rem; letter-spacing: -0.02em;">404</h1>
            <h2 class="mb-3" style="font-weight: 600; color: #0f172a; font-size: 1.5rem; letter-spacing: -0.01em;">Página no encontrada</h2>
            <p class="mb-4" style="font-size: 1rem; color: #64748b; line-height: 1.6; max-width: 480px; margin: 0 auto;">
                Lo sentimos, la página que buscas no existe o ha sido movida.
            </p>
            <a href="<?php echo RUTA; ?>" class="btn btn-primary" style="background-color: #3b82f6; border: none; color: white; padding: 12px 24px; border-radius: 8px; font-weight: 500; text-decoration: none; display: inline-block; transition: background-color 0.2s;">
                Volver al inicio
            </a>
        </div>
    </div>
</div>

