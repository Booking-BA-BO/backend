<?php

namespace Database\Seeders;

use App\Models\Esemeny;
use App\Models\Foglalas;
use App\Models\Rendez;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            'name'=>'test',
            'email'=>'testfelhasznalo@test.hu',
            'password'=>'Password123',
            'vezetek_nev'=>'Test',
            'kereszt_nev'=>'Nev',
            'telefon'=>'06121234567',
        ]);
        User::factory(10)->create();
        Esemeny::factory(10)->create();
        Rendez::factory(10)->create();
        Foglalas::factory(10)->create();


/*         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
