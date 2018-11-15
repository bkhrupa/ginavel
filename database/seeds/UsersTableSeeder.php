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
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@ginavel.com',
                'password' => bcrypt('secret'),
            ]
        ];

        foreach ($users as $user) {
            factory(App\User::class)->create($user);
        }
    }
}
