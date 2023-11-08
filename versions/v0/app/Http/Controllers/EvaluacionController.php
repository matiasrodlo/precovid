<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class EvaluacionController extends Controller {

        public function __construct() {
            $this->middleware(['auth']);
        }

        public function create() {
            return view('evaluacion.create');
        }

        public function store(Request $request) {
            $validatedData = $request->validate([
                'falta_aire' => ['required', 'boolean'],
                'fiebre' => ['required', 'boolean'],
                'tos' => ['required', 'boolean'],
                'contacto' => ['required', 'boolean'],
                'mucosidad' => ['required', 'boolean'],
                'dolor_muscular' => ['required', 'boolean'],
                'gastrointestinal' => ['required', 'boolean'],
                'varios_dias' => ['required', 'boolean'],
            ]);

            auth()->user()->evaluaciones()->create([
                'p1' => $validatedData['falta_aire'],
                'p2' => $validatedData['fiebre'],
                'p3' => $validatedData['tos'],
                'p4' => $validatedData['contacto'],
                'p5' => $validatedData['mucosidad'],
                'p6' => $validatedData['dolor_muscular'],
                'p7' => $validatedData['gastrointestinal'],
                'p8' => $validatedData['varios_dias'],
            ]);

            // Calcular probabilidad de estar contagiado
            $probabilidad = 0;

            $probabilidad += ($validatedData['falta_aire'] === "1") ? 60 : 0;
            $probabilidad += ($validatedData['fiebre'] === "1") ? 15 : 0;
            $probabilidad += ($validatedData['tos'] === "1") ? 15 : 0;
            $probabilidad += ($validatedData['contacto'] === "1") ? 29 : 0;
            $probabilidad += ($validatedData['mucosidad'] === "1") ? 0 : 0;
            $probabilidad += ($validatedData['dolor_muscular'] === "1") ? 0 : 0;
            $probabilidad += ($validatedData['gastrointestinal'] === "1") ? 0 : 0;
            $probabilidad += ($validatedData['varios_dias'] === "1") ? -15 : 0;

            if($probabilidad >= 30) {
                return redirect('evaluacion/positivo');
            }

            return redirect('evaluacion/negativo');
        }

        public function positivo() {
            return view('evaluacion.positivo');
        }

        public function negativo() {
            return view('evaluacion.negativo');
        }

    }
