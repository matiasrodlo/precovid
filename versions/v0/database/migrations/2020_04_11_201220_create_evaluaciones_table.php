<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEvaluacionesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('evaluaciones', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->foreignId('user_id');
                $table->char('p1', 1);
                $table->char('p2', 1);
                $table->char('p3', 1);
                $table->char('p4', 1);
                $table->char('p5', 1);
                $table->char('p6', 1);
                $table->char('p7', 1);
                $table->char('p8', 1);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('evaluaciones');
        }
        
    }
