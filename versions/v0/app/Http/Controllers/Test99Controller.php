<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class Test99Controller extends Controller {

        public function clear() {
            $e = Artisan::call('optimize');
        }

    }
