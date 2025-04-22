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
        Schema::create('esemeny', function (Blueprint $table) {
            $table->integer('esemeny_id')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->string('nev', 50);
            $table->longText('leiras');
            $table->string('hely', 50);
            $table->integer('kapacitas')->check('kapacitas > 0');
            $table->integer('ar')->check('ar >= 0');
            $table->integer('foglalastol')->default(90)->check('foglalastol > 0');
            $table->integer('foglalasig')->default(1)->check('foglalasig < foglalastol AND foglalasig > 0');
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary('esemeny_id');
        });

        DB::statement('ALTER TABLE esemeny AUTO_INCREMENT = 1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esemeny');
    }
};
