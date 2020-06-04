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
        $user = create(User::class);
        $this->actingAs($user);

        $userAddress = make(UserAddress::class,['user_id' => $user->id]);

        $this->post('/user_addresses', $userAddress->toArray());

        $this->get('/user_addresses')
            ->assertSee($userAddress->contact_name)
            ->assertSee($userAddress->full_address)
            ->assertSee($userAddress->zip)
            ->assertSee($userAddress->contact_phone);
    }

    /** @test */
    public function guests_may_not_create_address()
    {

        $userAddress = make(UserAddress::class);
        $this->post('/user_addresses', $userAddress->toArray())->assertRedirect('/login');

    }
}
