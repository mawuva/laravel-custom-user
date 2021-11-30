<?php

namespace Mawuekom\CustomUser\Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Users
         *
         */
        echo "\e[32mSeeding:\e[0m CustomUser - DefaultUsersTableSeeder\r\n";

        if (config('custom-user.user.model')::where('email', '=', 'admin@admin.com')->first() === null) {
            config('custom-user.user.model')::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('password'),
            ]);

            echo "\e[32mSeeding:\e[0m CustomUser - DefaultUsersTableSeeder - User:admin@admin.com\r\n";
        }

        if (config('custom-user.user.model')::where('email', '=', 'user@user.com')->first() === null) {
            config('custom-user.user.model')::create([
                'name'     => 'User',
                'email'    => 'user@user.com',
                'password' => bcrypt('password'),
            ]);

            echo "\e[32mSeeding:\e[0m CustomUser - DefaultUsersTableSeeder - User:user@user.com.com\r\n";
        }
    }
}