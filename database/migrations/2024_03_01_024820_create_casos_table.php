<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('case')->unique();
            $table->string('url');
            $table->string('solicitud');
            $table->boolean('cuenta')->default(0);
            $table->boolean('valor')->default(0);
            $table->boolean('vuelo')->default(0);
            $table->boolean('tipificacion')->default(0);
            $table->boolean('soportes')->default(0);
            $table->boolean('duplicado')->default(0);
            $table->boolean('compensacion')->default(0);
            $table->boolean('contingencia')->default(0);
            $table->string('notas')->nullable();
            $table->string('solucion')->nullable();
            $table->foreignId('status_id')->references('id')->on('status')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->on('users')->constrained()->restrictOnDelete();
            $table->dateTime('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('casos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
