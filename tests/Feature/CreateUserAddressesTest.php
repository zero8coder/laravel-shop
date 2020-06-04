<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use App\Models\UserAddress;

class CreateUserAddressesTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_user_can_create_new_address()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $userAddress = factory(UserAddress::class)->make(['user_id' => $user->id]);

        $this->post('/user_addresses', $userAddress->toArray());

        $this->get('/user_addresses')
            ->assertSee($userAddress->contact_name)
            ->assertSee($userAddress->full_address)
            ->assertSee($userAddress->zip)
            ->assertSee($userAddress->contact_phone);
    }
}
