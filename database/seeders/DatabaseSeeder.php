<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Documento;
use App\Models\Institucione;
use App\Models\Organismo;
use App\Models\Tema;
use App\Models\TiposDocumento;
use App\Models\Vigencia;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Institucione::factory(10)->create();
        Organismo::factory(10)->create();
        Tema::factory(10)->create();
        TiposDocumento::factory(10)->create();
        Vigencia::factory(2)->create();
        Documento::factory(70)->create();
        
        $this->call(UserSeeder::class);
    }
}
