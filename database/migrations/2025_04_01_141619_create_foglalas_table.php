<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foglalas', function (Blueprint $table) {
            $table->id('foglalas_id');
            $table->unsignedBigInteger('rendezveny_id');
            $table->string('teljes_nev', 50);
            $table->string('email', 50);
            $table->unsignedBigInteger('telefon');
            $table->integer('db')->check('db > 0');
            $table->timestamps();

            $table->foreign('rendezveny_id')->references('rendezveny_id')->on('rendezs')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE foglalas AUTO_INCREMENT = 1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foglalas');
    }
};
