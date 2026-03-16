<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea un usuari d'exemple
        DB::table('users')->insert([
            'name' => 'usuari',
            'email' => 'usuari@domini.com',
            'password' => Hash::make('usuari'),
        ]);
    }
}
