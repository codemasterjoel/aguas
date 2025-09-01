<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $this->call([
            EstadoSeeder::class,
            MunicipioSeeder::class,
            ParroquiaSeeder::class,
            ComunaSeeder::class,
            ConsejoComunalSeeder::class,
            CentroSeeder::class,
            Centros2Seeder::class,
            Centros3Seeder::class,
            NivelAcademicoSeeder::class,
            NivelSeeder::class,
            GeneroSeeder::class,
            ProfesionSeeder::class,
            UserSeeder::class
        ]);

    }
}
