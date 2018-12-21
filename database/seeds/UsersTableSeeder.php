<?php

use App\Models\User;
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
                'email' => 'admin@ginery.com',
                'password' => bcrypt('secret'),
                'role' => User::ROLE_ADMIN,
            ]
        ];

        foreach ($users as $user) {
            User::query()->firstOrCreate($user);
        }
    }
}
