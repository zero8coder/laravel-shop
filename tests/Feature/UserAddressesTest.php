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
        $userAddress = factory(UserAddress::class)->create(['user_id' => $user->id]);

         // 另一个用户
        $anthorUser = factory(User::class)->create();
        $anthorUserAddress = factory(UserAddress::class)->create(['user_id' => $anthorUser->id]);

        $response = $this->get('/user_addresses');

        $response->assertStatus(200)
                 ->assertSee($userAddress->contact_name)
                 ->assertSee($userAddress->full_address)
                 ->assertSee($userAddress->zip)
                 ->assertSee($userAddress->contact_phone)
                 ->assertDontSee($anthorUserAddress->contact_name)
                 ->assertDontSee($anthorUserAddress->full_address)
                 ->assertDontSee($anthorUserAddress->zip)
                 ->assertDontSee($anthorUserAddress->contact_phone);
    }
}
