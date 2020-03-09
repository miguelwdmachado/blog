<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            [
              'id' => 1,
              'type' => 'admin',
            ],
            [
                'id' => 2,
                'type' => 'autor',
              ],
              [
                'id' => 3,
                'type' => 'usuario',
              ],
            ]);
    }
}
