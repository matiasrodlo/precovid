<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class DonacionesController extends Controller {
        
        public function index() {
            return view('donaciones');
        }

    }
