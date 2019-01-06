<?php

namespace Tests\Unit\Models;

use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var \App\Models\User
     */
    protected $user;

    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    public function testCreated()
    {
        $this->assertDatabaseHas('users', $this->user->toArray());
    }

    public function testCast()
    {
        $this->assertIsInt($this->user->id);
        $this->assertIsString($this->user->name);
        $this->assertIsString($this->user->password);
        $this->assertIsString($this->user->email);
        $this->assertIsString($this->user->role);
        $this->instance(Carbon::class, $this->user->created_at);
        $this->instance(Carbon::class, $this->user->updated_at);
    }

    public function testRelation()
    {
        /** @var \App\Models\Client $client */
        $client = factory(Client::class)->create();
        $this->user->client()->save($client);
        $client->fresh();

        $this->assertEquals($client->user_id,$this->user->id);
    }
}
