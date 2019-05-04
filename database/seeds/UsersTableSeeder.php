<?php

use Illuminate\Support\Str;
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
                'password' => bcrypt(Str::random(16)),
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
