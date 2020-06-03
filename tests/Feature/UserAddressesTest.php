<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserAddress;


class UserAddressesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_own_addresses()
    {
         // 已登录用户
        $user = factory(User::class)->create();
        $this->actingAs($user);

        // 生成地址
        $userAddresses = factory(UserAddress::class)->create(['user_id' => $user->id]);

         // 另一个用户
        $anthorUser = factory(User::class)->create();
        $anthorUserAddresses = factory(UserAddress::class)->create(['user_id' => $anthorUser->id]);

        $response = $this->get('/user_addresses');

        $response->assertStatus(200)
                 ->assertSee($userAddresses->contact_name)
                 ->assertSee($userAddresses->full_address)
                 ->assertSee($userAddresses->zip)
                 ->assertSee($userAddresses->contact_phone)
                 ->assertDontSee($anthorUserAddresses->contact_name)
                 ->assertDontSee($anthorUserAddresses->full_address)
                 ->assertDontSee($anthorUserAddresses->zip)
                 ->assertDontSee($anthorUserAddresses->contact_phone);
    }
}
