<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use App\Models\UserAddress;

class CreateUserAddressesTest extends TestCase
{
    use DatabaseMigrations;

    // 用户添加地址
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
            ->assertSee($userAddress->contact_phone);
    }

    // 游客不能添加地址
    /** @test */
    public function guests_may_not_create_address()
    {

        $userAddress = make(UserAddress::class);
        $this->post('/user_addresses', $userAddress->toArray())->assertRedirect('/login');

    }

    // 游客不能看到添加地址页面
    /** @test */
    public function guests_may_not_see_the_create_address_page()
    {
        $this->get('/user_addresses/create')
        ->assertRedirect('/login');
    }

    // 游客不能看到修改地址页面
    /** @test */
    public function guests_may_not_see_the_update_address_page()
    {
        $this->get('/user_addresses/1')
        ->assertRedirect('/login');
    }

    // 游客不能修改地址
    /** @test */
    public function guests_may_not_update_address()
    {
        $this->put('/user_addresses/1')
        ->assertRedirect('/login');
    }

    // 用户修改地址
    /** @test */
    public function user_can_update_address()
    {
        $user = create(User::class);
        $this->actingAs($user);
        $userAddress = create(UserAddress::class,['user_id' => $user->id]);
        $userAddress->contact_name = '哈哈哈';
        $this->put('/user_addresses/'.$userAddress->id, $userAddress->toArray())
            ->assertRedirect('/user_addresses');
        $this->get('/user_addresses/'.$userAddress->id)->assertSee($userAddress->contact_name);
    }
}
