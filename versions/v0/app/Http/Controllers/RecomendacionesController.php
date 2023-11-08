<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class RecomendacionesController extends Controller {
        
        public function positivo() {
            return view('recomendaciones.positivo');
        }

        public function negativo() {
            return view('recomendaciones.negativo');
        }

    }
