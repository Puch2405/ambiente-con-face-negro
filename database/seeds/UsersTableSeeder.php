<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,5)->create();
        App\User::create([
            'name'=>'puch',
            'email'=>'puchmaster97@hotmail.com',
            'password'=>bcrypt('123'),
            'tipo_usuario'=>2
        ]);
    }
}
