<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        $user = App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'admin' => 1
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20%2831%29.jpg',
            'about' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
    }
}
