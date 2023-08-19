<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Channel;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Khoi tao doi tuong Faker
        $faker = Faker::create();
        // Chạy vòng lặp xác định Số bản ghi và Kiểu dữ liệu từ Faker
        for ($i = 0; $i < 24; $i++) {
            Channel::create([
                'ChannelName' => $faker->name,
                'Description' => $faker->sentence,
                'SubcribersCount' => $faker->randomNumber,
                'URL' => $faker->url
            ]);
        }
    }
}
