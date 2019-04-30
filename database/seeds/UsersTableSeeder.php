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
        $data = [
            [
                'name' => 'Aвтор не известен',
                'email' => 'unknown@unknown',
                'password' => bcrypt(str_random(16)),
            ],
            [
                'name' => 'victor',
                'email' => 'test@test.local',
                'password' => bcrypt(123123),
            ],

        ];

        \DB::table('users')->insert($data);
    }
}
