<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserAddress;
use Faker\Generator as Faker;

$factory->define(UserAddress::class, function (Faker $faker) {
    $addresses = [
        ['北京市', '市辖区', '东城区'],
        ['河北省', '石家庄市', '长安区'],
        ['广东省', '东莞市', '南城区'],
        ['广东省', '广州市', '天河区'],
        ['广东省', '东莞市', '高埗镇'],
    ];
    $address = $faker->randomElement($addresses);
    return [
        'province' => $address[0],
        'city' => $address[1],
        'district' => $address[2],
        'address' => sprintf('第%d街道第%d号', $faker->randomNumber(2), $faker->randomNumber(3)),
        'zip' => $faker->postcode,
        'contact_name' => $faker->name,
        'contact_phone' =>$faker->phoneNumber,
    ];
});
