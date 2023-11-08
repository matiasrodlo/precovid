<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Evaluacion extends Model {
        
        protected $table = 'evaluaciones';

        protected $fillable = [
            'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8',
        ];

        public function user() {
            return $this->belongsTo(User::class);
        }

    }
