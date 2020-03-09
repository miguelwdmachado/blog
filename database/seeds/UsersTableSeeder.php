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
        DB::table('users')->insert([
            [
              'id' => 1,
              'name' => 'Usuário Admin',
              'email' => 'admin@admin.com.br',
              'password' => bcrypt('senha123'),
              'type_id' => '1',
            ],
        ]);
    }
}
