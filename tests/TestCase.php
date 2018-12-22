<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function iAmAdmin()
    {
        $user = User::query()->find(1);

        if (!$user) {
            $user = factory(User::class)->create([
                'name' => 'test admin',
                'email' => 'test.admin@ginery.com',
                'password' => bcrypt('secret'),
                'role' => User::ROLE_ADMIN,
            ]);
        }

        $this->actingAs($user);
    }
}
