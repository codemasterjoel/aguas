<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Traits\HasRole;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            ['name' => 'ADMINISTRADOR', 'email' => 'admin@email.com','password' => bcrypt('21246813'), 'nivel_id' =>'1', 'estado_id' => '25', 'is_admin' => true, 'is_active' => true],
            ['name' => 'caracas', 'email' => 'caracas@email.com','password' => bcrypt('caracas'), 'nivel_id' => '2', 'estado_id' => '1', 'is_admin' => false, 'is_active' => true]
        ]);

        // $user = User::Where('email', '=', 'admin@email.com')->get();
        // $user->assignRole('Admin');
    }
}
