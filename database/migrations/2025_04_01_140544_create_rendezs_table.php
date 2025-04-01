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
        Schema::create('rendezs', function (Blueprint $table) {
            $table->id('rendezveny_id');
            $table->integer('esemeny_id');
            $table->date('datum')->check('datum > CURRENT_DATE');
            $table->boolean('nyitva')->default(false);
            $table->timestamps();
    
            $table->foreign('esemeny_id')->references('esemeny_id')->on('esemenies')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE rendezs AUTO_INCREMENT = 1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezs');
    }
};
