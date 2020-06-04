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
        $user = create(User::class);
        $this->actingAs($user);

        // 生成地址
        $userAddress = create(UserAddress::class, ['user_id' => $user->id]);

         // 另一个用户
        $anthorUser = create(User::class);
        $anthorUserAddress = create(UserAddress::class, ['user_id' => $anthorUser->id]);

        $response = $this->get('/user_addresses');

        $response->assertStatus(200)
                 ->assertSee($userAddress->contact_name)
                 ->assertSee($userAddress->full_address)
                 ->assertSee($userAddress->contact_phone)
                 ->assertDontSee($anthorUserAddress->contact_name)
                 ->assertDontSee($anthorUserAddress->full_address)
                 ->assertDontSee($anthorUserAddress->contact_phone);
    }


}
