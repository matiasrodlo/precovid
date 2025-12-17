<div class="container" style="max-width: 720px; padding: 0 32px;">
    <!-- Hero Section -->
    <div class="row w-100" style="margin: 0;">
        <div class="col text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 0;">
            <h1 class="hero-title" style="font-size: 3rem; font-weight: 600; color: #0f172a; letter-spacing: -0.04em; line-height: 1.1; text-align: center; margin: 0 0 1.25rem 0; padding: 0;">
                Autoevaluación COVID-19
            </h1>
            <p class="hero-subtitle" style="font-size: 1.125rem; color: #64748b; font-weight: 400; max-width: 540px; margin: 0 auto 2.5rem; line-height: 1.6; letter-spacing: -0.01em; text-align: center; padding: 0;">
                Responde unas preguntas y recibe recomendaciones personalizadas
            </p>
            <a href="<?php echo RUTA; ?>/login" class="btn btn-primary btn-lg hero-cta" style="padding: 16px 48px; font-size: 1.0625rem; font-weight: 500; letter-spacing: 0.01em; border-radius: 14px; box-shadow: 0 6px 20px rgba(59, 130, 246, 0.28); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); margin-bottom: 3rem;">
                Comenzar autoevaluación
            </a>
            <p class="hero-disclaimer" style="font-size: 0.8125rem; color: #94a3b8; line-height: 1.6; max-width: 520px; margin: 0 auto; text-align: center; padding: 0; border-top: 1px solid #e2e8f0; padding-top: 2rem;">
                Esta herramienta no sustituye la atención médica profesional. Si tienes síntomas graves, busca atención médica inmediata.
            </p>
        </div>
    </div>

</div>

<style>
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 28px rgba(59, 130, 246, 0.35) !important;
    }
    
    .hero-title {
        margin-bottom: 1.25rem !important;
    }
    
    .hero-subtitle {
        margin-bottom: 2.5rem !important;
    }
    
    .hero-cta {
        margin-bottom: 3rem !important;
    }
    
    .hero-disclaimer {
        margin-top: 0 !important;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.25rem !important;
            margin-bottom: 1rem !important;
        }
        .hero-subtitle {
            font-size: 1rem !important;
            margin-bottom: 2rem !important;
            max-width: 100% !important;
        }
        .hero-cta {
            margin-bottom: 2.5rem !important;
            padding: 14px 40px !important;
            font-size: 1rem !important;
        }
        .hero-disclaimer {
            padding-top: 1.5rem !important;
            font-size: 0.75rem !important;
        }
    }
    
    @media (max-height: 800px) {
        .hero-title {
            font-size: 2.5rem !important;
            margin-bottom: 1rem !important;
        }
        .hero-subtitle {
            font-size: 1rem !important;
            margin-bottom: 2rem !important;
        }
        .hero-cta {
            margin-bottom: 2.5rem !important;
        }
        .hero-disclaimer {
            padding-top: 1.5rem !important;
        }
    }
    
    @media (max-height: 700px) {
        .hero-title {
            font-size: 2rem !important;
            margin-bottom: 0.75rem !important;
        }
        .hero-subtitle {
            font-size: 0.9375rem !important;
            margin-bottom: 1.5rem !important;
        }
        .hero-cta {
            margin-bottom: 2rem !important;
            padding: 12px 36px !important;
            font-size: 0.9375rem !important;
        }
        .hero-disclaimer {
            padding-top: 1.25rem !important;
            font-size: 0.75rem !important;
        }
    }
</style>