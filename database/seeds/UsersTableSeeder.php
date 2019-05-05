<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'nombre' => 'root',
        'username' => 'root',
        'email' => 'root@root.com',
        'password' => Hash::make('secret'),
        'tipo' => 'admin',
        'created_at' => now(),
        'updated_at' => now(),
      ]);

      User::create([
        'nombre' => 'Haro Orozco',
        'username' => 'HaroOrozco11103',
        'email' => 'haro.yo51@hotmail.com',
        'password' => Hash::make('secret'),
        'equipo_id' => 2,
        'tipo' => 'admin',
      ]);

      User::create([
        'nombre' => 'Sarahí Martínez',
        'username' => 'sarahimro27',
        'email' => 'sarahimro27@hotmail.com',
        'password' => Hash::make('secret'),
        'equipo_id' => 2,
        'tipo' => 'comun',
      ]);

      User::create([
        'nombre' => 'Luis Infante',
        'username' => 'xXxLilLuisSadBoy',
        'email' => 'luis@hotmail.com',
        'password' => Hash::make('secret'),
        'equipo_id' => 16,
        'tipo' => 'comun',
      ]);

      User::create([
        'nombre' => 'Lupita Ayala Outro',
        'username' => 'iamlupita',
        'email' => 'lupita@hotmail.com',
        'password' => Hash::make('secret'),
        'tipo' => 'admin',
      ]);

      User::create([
        'nombre' => 'Alyssa',
        'username' => 'alyssa',
        'email' => 'alyssa@hotmail.com',
        'password' => Hash::make('secret'),
        'equipo_id' => 2,
        'tipo' => 'comun',
      ]);

      User::create([
        'nombre' => 'Cristiano Ronaldo',
        'username' => 'CristianoR7',
        'email' => 'ronaldo@hotmail.com',
        'password' => Hash::make('secret'),
        'equipo_id' => 2,
        'tipo' => 'comun',
      ]);

      User::create([
        'nombre' => 'Lio Messi',
        'username' => 'Messi10',
        'email' => 'messi@hotmail.com',
        'password' => Hash::make('secret'),
        'equipo_id' => 4,
        'tipo' => 'comun',
      ]);

        factory(App\User::class, 15)->create();
    }
}
